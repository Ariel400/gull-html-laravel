<?php

namespace App\Http\Controllers;

use App\Clients;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function index()
    {

        if (auth()->check()) {
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function traitement()
    {
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $resultat = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);
        if ($resultat) {
            // dd(request('password'));
            session()->flash('alerte', 'bienvenue ' . \Auth::user()->nom);
            session()->flash('type', 'success');
            /* si il y a un achat en cours */
            if (session()->get('achat-encours')) {
                session()->forget('achat-encours');
                return redirect('/panier');
            }
            return redirect('/dashboard');
        }
        session()->flash('alerte', 'identifiants incorrects');
        session()->flash('type', 'error');
        // dd(request('password'));
        return back()->withInput()->withErrors([
            'invalid' => 'Vos identifiants sont incorrects.',
        ]);

    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return \Socialite::driver('google')->redirect();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleGoogleCallback()
    {
        try {

            $user = \Socialite::driver('google')->user();

            $mail = $user->email;
            $finduser = Clients::where('google_id', $user->id)->first();

            if ($finduser) {

                \Auth::login($finduser);
                session()->flash('alerte', 'bienvenue ' . \Auth::user()->nom);
                session()->flash('type', 'success');
                return redirect('/dashboard');

            } else {

                if (Clients::where('email', $mail)->first()) {
                    session()->flash('alerte', 'impossible de creer votre compte, un utilisateur existe deja avec le mail ' . $mail);
                    session()->flash('type', 'error');
                    return redirect('/login');
                }
                $newUser = Clients::create([
                    'nom' => $user->user['family_name'],
                    'prenom' => $user->user['given_name'],
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456')
                ]);

                \Auth::login($newUser);
                session()->flash('alerte', 'bienvenue ' . \Auth::user()->nom);
                session()->flash('type', 'success');
                return redirect('/dashboard');
            }

        } catch (\Exception $e) {

            dd($e->getMessage());
        }
    }

    public function redirectToFacebook()
    {
        return \Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = \Socialite::driver('facebook')->user();
            $finduser = Clients::where('facebook_id', $user->id)->first();
            if ($finduser) {
                \Auth::login($finduser);
                return redirect('/dashboard');
            } else {
                $newUser = Clients::create(['nom' => $user->name, 'prenom' => $user->nickname ?? '', 'email' => $user->email ?? '', 'facebook_id' => $user->id, 'password' => encrypt('123456')]);
                \Auth::login($newUser);
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
