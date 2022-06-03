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

    public function demande(Request $request)
    {
        $type_pret=$request->type_pret;
        $montant=$request->montant;
        $duree=$request->duree;
        // $situation=$request->situation;
        $nbre_enfant=$request->nbre_enfant;
        $revenu_mensuel=$request->revenu_mensuel;
        $autre_revenu_montant=$request->autre_revenu_montant;
        $secteur=$request->secteur;
        $categorie=$request->categorie;
        $contrat_travail=$request->contrat_travail;
        $type_logement=$request->type_logement;
        $add_postal=$request->add_postal;
        $ville=$request->ville;
        $loyer_mensuel=$request->loyer_mensuel;
        $montant_charge=$request->montant_charge;

        Contrat::insert([
            'code' => $type_pret.''.$contrat_travail.''.$montant,
            'type_pret'=>$type_pret,
            'montant_pret'=>$montant,
            'duree_pret'=>$duree,
            // 'situation'=>$situation,
            'nbr_enfant'=>$nbre_enfant,
            'revenu_mensuel'=>$revenu_mensuel,
            'autre_revenu'=>$autre_revenu_montant,
            'activite'=>$secteur,
            'categorie_socio'=>$categorie,
            'contrat_travail'=>$contrat_travail,
            'type_logement'=>$type_logement,
            'addresse'=>$add_postal,
            'ville'=>$ville,
            'loyer_mensuel'=>$loyer_mensuel,
            'autre_charge_mensuel'=>$montant_charge,

        ]);
        session()->flash('alerte', 'Votre demande a été pris en compte');
        session()->flash('type', 'info');
        return redirect('/contrat');

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
