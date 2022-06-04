<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Gallery;
use App\Models\Images;
use App\Models\Partenaires;
use App\Models\Produits;
use App\Models\Sliders;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        // $Produits = Produits::where('quantite', '>', 0)->where('enabled', 1)->take(4)->get();
        // $Sliders = Sliders::all();
        // $images = Images::whereHas('tags', function ($query) {
        //     return $query->where('code', '=', 'actions-caritatives');
        // })->limit(4)->get();

        // $articles = Articles::whereHas('tags', function ($query) {
        //     return $query->where('code', '=', 'padev');
        // })->limit(3)->get();

        // $partenaires = Partenaires::all();

        return view('acc')->with([
            // 'produits' => $Produits,
            // 'sliders' => $Sliders,
            // 'galleries' => $images,
            // 'articles' => $articles,
            // 'partenaires' => $partenaires
        ]);
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

    public function demande(){
        return view('dmd');
    }

    public function nvdemande(){
        return view('nvdmd');
    }

    public function connexion(){
        return view('signin');
    }

    public function store(Request $request){

        $nom = trim($request->nom);
        $prenom = trim($request->prenom);
        $email = trim($request->email);
        $adresse = trim($request->adresse);
        $date_naissance = trim($request->date_naissance);
        $nom_employeur = trim($request->nom_employeur);
        $numero_compte = trim($request->numero_compte);
        $piece = trim($request->piece);
        $profession = trim($request->profession);
        $salaire = trim($request->salaire);
        $sexe = trim($request->sexe);
        $telephone = trim($request->telephone);
        $situation_matrimonial = trim($request->situation_matrimonial);
        $nom_fournisseur = trim($request->fnom);
        $contact_fournisseur = trim($request->fcontact);
        $adresse_fournisseur = trim($request->fadresse);
        $nom_materiel = trim($request->nom_materiel);
        $prix = trim($request->prix);

        // dd();

        $client = new Client();
        $client->nom = $nom;
        $client->prenom = $prenom;
        $client->email = $email;
        $client->adresse = $adresse;
        $client->date_naissance = $date_naissance;
        $client->nom_employeur = $nom_employeur;
        $client->numero_compte = $numero_compte;
        $client->piece = $piece;
        $client->profession = $profession;
        $client->salaire = $salaire;
        $client->sexe = $sexe;
        $client->telephone = $telephone;
        $client->situation_matrimonial = $situation_matrimonial;
        $client->save();

        $p=\DB::table('partenaires')->insertGetId([
            "nom" => $nom_fournisseur,
            "numero" =>  $contact_fournisseur,
            "adresse" => $adresse_fournisseur,
        ]);
        // dd();
        $pr=$nom_materiel."_".substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(5/strlen($x)) )),1,5);
        $m=\DB::table('produits')->insertGetId([
            "nom" => $nom_materiel,
            "code" => $pr,
            "prix_vente" =>  $prix?intval($prix):15000
        ]);
       

        $c=\DB::table('contrat')->insertGetId([
            "code" => $client->nom."_".substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(5/strlen($x)) )),1,5),
            "id_client" => $client->id,
            "code_materiel" =>  $pr,
            "id_fournisseur" => $p,
        ]);
        
        
        // dd($c);
        $nom =  $client->nom . ' ' . $client->prenom;
        $data = [
            'subject' => 'Confirmation de demande de credit ',
            'from' => 'virtus225one@gmail.com',
            'from_name' => 'Credit Access.com',
            'template' => 'mail.info',
            'info' => [
                'fullname' => $client->nom . ' ' . $client->prenom,
                'email' => $client->email,
                'date' => now(),
                'password' => "lol",
               
            ]
        ];
        // dd($data);
        $details['type_email'] = 'nouvelle demande';
        $details['email'] = "virtus225one@gmail.com";
        $details['data'] = $data;
        dispatch(new \App\Jobs\SendEmailJob($details));
        return redirect()->route('cfm',[$nom]);
    }

    public function nvstore(Request $request){

        $nom_fournisseur = trim($request->fnom);
        $contact_fournisseur = trim($request->fcontact);
        $adresse_fournisseur = trim($request->fadresse);
        $nom_materiel = trim($request->nom_materiel);
        $prix = trim($request->prix);
        $id_client = trim($request->id_client);

        $client = Client::where('id',$id_client)->first();
        
        $p=\DB::table('partenaires')->insertGetId([
            "nom" => $nom_fournisseur,
            "numero" =>  $contact_fournisseur,
            "adresse" => $adresse_fournisseur,
        ]);
        $pr=$nom_materiel."_".substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(5/strlen($x)) )),1,5);
        $m=\DB::table('produits')->insertGetId([
            "nom" => $nom_materiel,
            "code" => $pr,
            "prix_vente" =>  150000
        ]);
      
        $c=\DB::table('contrat')->insertGetId([
            "code" => $client->nom."_".substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(5/strlen($x)) )),1,5),
            "id_client" => $client->id,
            "code_materiel" =>  $pr,
            "id_fournisseur" => $p,
        ]);
        
        // dd($c);
        $nom =  $client->nom . ' ' . $client->prenom;
        $data = [
            'subject' => 'Confirmation de demande de credit ',
            'from' => 'virtus225one@gmail.com',
            'from_name' => 'Credit Access.com',
            'template' => 'mail.info',
            'info' => [
                'fullname' => $client->nom . ' ' . $client->prenom,
                'email' => $client->email,
                'date' => now(),
                'password' => "lol",
               
            ]
        ];
        // dd($data);
        $details['type_email'] = 'nouvelle demande';
        $details['email'] = "virtus225one@gmail.com";
        $details['data'] = $data;
        dispatch(new \App\Jobs\SendEmailJob($details));
        return redirect()->route('cfm',[$nom]);
    }
    public function test(){
        $client = \DB::table('clients')->where('id',2)->first();
             
            dd("ok");
    }
}
