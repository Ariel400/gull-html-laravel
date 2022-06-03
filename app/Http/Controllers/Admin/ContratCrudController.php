<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ContratRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ContratCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ContratCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\ReviseOperation\ReviseOperation;
    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        $this->crud->denyAccess(['create']);
        CRUD::setModel(\App\Models\Contrat::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/contrat');
        CRUD::setEntityNameStrings('contrt', 'Demandes');
        $this->crud->enableExportButtons();
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // dd();
        if(backpack_user()->hasRole(['Gestionnaire Demande'])){

            $this->crud->addClause('where', 'id_agent', '=',backpack_user()->id);
        }
        // $this->crud->addClause('where',backpack_user()->id , '=',8);
        $this->crud->addColumn([
            'name' => 'id_agent',
            'type' => 'select',
            'label' => "Agent",
            'entity' => 'agent',
            'attribute' => 'name',
            'model' => "App\User",
        ]);
        $this->crud->addColumn([
            'name' => 'id_client',
            'type' => 'select',
            'label' => "nom client",
            'entity' => 'client',
            'attribute' => 'nom',
            'model' => "App\Models\Clients",
        ]);

        $this->crud->addColumn([
            'name' => 'created_at',
            'type' => 'text',
            'label' => "Date de demande du prêt",  
        ]);

        $this->crud->addColumn([
            'name' => 'montant_pret',
            'type' => 'text',
            'label' => "Montant du prêt",  
        ]);
        $this->crud->addColumn([
            'name' => 'reste_payer',
            'type' => 'text',
            'label' => "Reste à Payer",  
        ]);
        // $this->crud->addColumn([
        //     'name' => 'id_fournisseur',
        //     'type' => 'select',
        //     'label' => "nom fournisseur",
        //     'entity' => 'partenaire',
        //     'attribute' => 'nom',
        //     'model' => "App\Models\Partenaires",
        // ]);

        // $this->crud->addColumn([
        //     'name' => 'date_debut',
        //     'type' => 'date',
        //     'label' => "date de debut",

        // ]);
        // $this->crud->addColumn([
        //     'name' => 'date_fin',
        //     'type' => 'date',
        //     'label' => "date de fin ",

        // ]);
        $this->crud->addColumn([
            'name' => 'actif',
            'type' => 'boolean',
            'label' => "valide ",

        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ContratRequest::class);

        $this->crud->addField([
            'name' => 'code',
            'type' => 'text',
            'label' => " code contrat ",
        ]);

        $this->crud->addField([
            'name' => 'id_agent',
            'type' => 'select2',
            'label' => "Agent",
            'entity' => 'agent',
            'attribute' => 'name',
            'model' => "App\User",
            'options'   => (function ($query) {
                $lol=[];$i=0;
                foreach ($query->get() as $key => $value) {
                   $m=\DB::table('model_has_roles')->where("model_id",$value->id)->first();
                   if($m->role_id==6){
                       $lol[$i]=$value;
                        $i++;
                   }
                }
                // dd($lol);
                // return $query->orderBy('name', 'ASC')->where('id', 1)->get();
                return $lol;
            }), 
        ]);

        // CRUD::setFromDb(); // fields
        $this->crud->addField([
            'name' => 'id_client',
            'type' => 'select',
            'label' => "nom client",
            'entity' => 'client',
            'attribute' => 'nom',
            'model' => "App\Models\Clients",
        ]);

        $this->crud->addField([
            'name' => 'code_materiel',
            'type' => 'select2',
            'label' => "nom materiel",
            'entity' => 'materiel',
            'attribute' => 'nom',
            'model' => "App\Models\Produits",
        ]);

        $this->crud->addField([
            'name' => 'id_fournisseur',
            'type' => 'select2',
            'label' => "nom fournisseur",
            'entity' => 'partenaire',
            'attribute' => 'nom',
            'model' => "App\Models\Partenaires",
        ]);
        $this->crud->addField([
            'name' => 'date_debut',
            'type' => 'date',
            'label' => "date de debut",

        ]);
        $this->crud->addField([
            'name' => 'date_fin',
            'type' => 'date',
            'label' => "date de fin ",

        ]);
        $this->crud->addField([
            'name' => 'actif',
            'type' => 'boolean',
            'label' => "valider ? ",

        ]);
        


        if(request()->input('actif')){
             /* envoie du mail */
            //  $pwd = ;
            // dd(request()->input('id_agent'));
            $old= \DB::table('contrat')->where('code',request()->input('code'))->first();
            if($old->actif==0){

                $password ="passe123";
                \DB::table('clients')->where('id',request()->input('id_client'))->update(["password"=>'$2y$10$joOPkbDGnedVWRUrsopYnOBgHgAZrwUOAM.W1seG7UKe2cfK3cNqS']);
                $client = \DB::table('clients')->where('id',request()->input('id_client'))->first();
                $data = [
                   'subject' => 'Confirmation de demande de credit bail',
                   'from' => 'virtus225one@gmail.com',
                   'from_name' => 'Creditos.com',
                   'template' => 'mail.newclient',
                   'info' => [
                       'fullname' => $client->nom . ' ' . $client->prenom,
                       'email' => $client->email,
                       'date' => now(),
                       'password' => $password,
                       // 'montant' => $mtn_total,
                       // 'lien' => 'http://www.martheetmarie.com/',
                       // 'nom_lien' => 'se connecter'
                   ]
               ];
               // dd($data);
               $details['type_email'] = 'confirmation';
               $details['email'] = $client->email;
               $details['data'] = $data;

               $agent = \DB::table('users')->where('id',request()->input('id_agent'))->first();
               $data2 = [
                'subject' => 'Confirmation de demande de credit bail',
                'from' => 'virtus225one@gmail.com',
                'from_name' => 'Creditos.com',
                'template' => 'mail.demande',
                'info' => [
                    'fullname' => $agent->name,
                    'nom_clt' => $client->nom . ' ' . $client->prenom,
                    'email' => $agent->email,
                    'date' => now(),
                    // 'montant' => $mtn_total,
                    // 'lien' => 'http://www.martheetmarie.com/',
                    // 'nom_lien' => 'se connecter'
                ]
            ];
            // dd($data);
            $details2['type_email'] = 'confirmation';
            $details2['email'] = "virtus225one@gmail.com";
            $details2['data'] = $data2;
               dispatch(new \App\Jobs\SendEmailJob($details));
               dispatch(new \App\Jobs\SendEmailJob($details2));
            }
            // dd(request()->input('actif'));
            
        }
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
