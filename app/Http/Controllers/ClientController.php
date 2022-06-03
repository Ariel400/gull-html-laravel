<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Http\Controllers\Controller;
use App\Models\Commande;
use App\Models\Contrat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $client = Auth::user();
        return view('client.index', [
            "client" => $client
        ]);

    }

    /***
     * aller sur la page modifier mot de passe
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function password()
    {
        return view('client.password');
    }

    /**
     * aller sur la page des commandes du client
     */
    public function commande()
    {
        $id = Auth::User()->id;
        $commandes = DB::table('contrat')->where('id_client', $id)
            // ->join('detailcommandes', 'commandes.id', '=', 'detailcommandes.id_commande')
            // ->join('produits','produits.code','=','detailcommandes.code_prod')
            ->where('id_client', '=', $id)
            ->simplePaginate(15);

        return view('client.order')->with([
            'commandes' => $commandes
        ]);
    }

    public function detail_commande(Contrat $commande)
    {
        // dd($commande);
        // $articles = DB::table('detailcommandes')->where('id_commande', $commande->id)->get();
        // $nbre_article = count($articles);

        return view(
            'client.orderdetail',
            compact('commande')
        );

    }


    /***
     * aller sur la page info
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function info()
    {
        return view('client.info');
    }

    /***
     * aller sur la page info
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function historique()
    {
        return view('client.info');
    }

    /***
     * aller sur la page info
     * @return string
     */
    public function updatepassword(Request $request)
    {
        if (Auth::Check()) {
            $request_data = $request->All();
            $current_password = Auth::User()->password;
            if (Hash::check($request_data['motdepasse'], $current_password)) {
                $user_id = Auth::User()->id;
                $obj_user = Clients::find($user_id);
                $obj_user->password = Hash::make($request_data['nouveau_motdepasse']);
                $obj_user->save();
                session()->flash('alerte', 'mot de passe modifié avec succès .');
                session()->flash('type', 'success');
                return back()->withInput()->with([
                    'success' => 'mot de passe modifié avec succès .',
                ]);
            }
            session()->flash('alerte', 'l\'ancien mot de passe est incorrect');
            session()->flash('type', 'error');
            return back()->withInput()->withErrors([
                'message' => 'l\'ancien mot de passe est incorrect ',
            ]);
        }
        session()->flash('alerte', 'veillez vous connectez ');
        session()->flash('type', 'info');
        return back()->withInput()->withErrors([
            'message' => 'veillez vous connectez  ',
        ]);
    }

    /***
     * mise à jour des infos
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateinfo(Request $request)
    {
        if (Auth::Check()) {
            $request_data = $request->All();
            $user_id = Auth::User()->id;
            $obj_user = Clients::find($user_id);
            $obj_user->nom = trim($request_data['nom']);
            $obj_user->prenom = trim($request_data['prenom']);
            $obj_user->telephone = trim($request_data['telephone']);
            $obj_user->save();

            session()->flash('alerte', 'mise à jour effectuée .');
            session()->flash('type', 'success');
            return back()->withInput()->with([
                'success' => 'mise à jour effectuée .',
            ]);

        }
        session()->flash('alerte', 'veillez vous connectez ');
        session()->flash('type', 'info');
        return back()->withInput()->withErrors([
            'message' => 'veuillez vous connectez  ',
        ]);
    }

    /**
     * deconnexion
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deconnexion()
    {
        Auth::logout();
        return redirect('/');
    }

}
