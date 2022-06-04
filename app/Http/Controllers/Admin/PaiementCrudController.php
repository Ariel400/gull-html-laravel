<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PaiementRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PaiementCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PaiementCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Paiement::class);
        if(!backpack_user()->hasRole(['admin'])){
        $this->crud->denyAccess(['update','delete']);
        }
        CRUD::setRoute(config('backpack.base.route_prefix') . '/paiement');
        CRUD::setEntityNameStrings('paiement', 'paiements');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        if(backpack_user()->hasRole(['Recouvreur'])){

            $this->crud->addClause('where', 'id_agent', '=',backpack_user()->id);
        }
        // CRUD::setFromDb(); // columns

        $this->crud->addColumn([
            'name' => 'id_demande',
            'type' => 'select',
            'label' => "code demande",
            'entity' => 'contrat',
            'attribute' => 'code',
            'model' => "App\Models\Contrat",
        ]);
        $this->crud->addColumn([
            'name' => 'montant',
            'type' => 'text',
            'label' => "Montant",  
        ]);
        $this->crud->addColumn([
            'name' => 'reste_a_payer',
            'type' => 'text',
            'label' => "Reste à payer",  
        ]);
        $this->crud->addColumn([
            'name' => 'created_at',
            'type' => 'date',
            'label' => "date versement",  
        ]);
        
                /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PaiementRequest::class);
        // $this->crud->addClause('where', 'id_agent', '=',backpack_user()->id);

        // CRUD::setFromDb(); // fields
        $this->crud->addField([
            'name' => 'id_demande',
            'type' => 'select2',
            'label' => "code demande",
            'entity' => 'contrat',
            'attribute' => 'code',
            'model' => "App\Models\Contrat",
            'attributes' => [
            
                'readonly'    => 'readonly',
                // 'disabled'    => 'disabled',
              ], 
              'options'   => (function ($query) {
                $lol=[];$i=0;
                foreach ($query->get() as $key => $value) {
                //    $m=\DB::table('contrat')->where("model_id",$value->id)->first();
                // var_dump($value->id_agent);
                   if($value->id_agent==backpack_user()->id || backpack_user()->hasRole(['admin'])){
                       $lol[$i]=$value;
                        $i++;
                   }
                }
                // dd($lol);
                // return $query->orderBy('name', 'ASC')->where('id', 1)->get();
                return $lol;
            }),
        ]);

        $this->crud->addField([
            'name' => 'id_agent',
            'type' => 'hidden',
            'default' => backpack_user()->id
            // 'label' => "code demande",
        ]);
        
        $this->crud->addField([
            'name' => 'montant',
            'type' => 'number',
            'label' => "montant",
        ]);
        $this->crud->addField([   // select2_from_array
            'name'        => 'note',
            'label'       => "note *",
            'type'        => 'select2_from_array',
            'options'     => ['ajour' => 'à jour', 'retard' => 'retard', 'manquer' => 'non payer', 'moitié' => 'pas en totalité', 'abandon' => 'abandon'],
            'allows_null' => false,
            'default'     => 'ajour',
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
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
