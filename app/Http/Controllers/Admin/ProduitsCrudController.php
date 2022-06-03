<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProduitsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProduitsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProduitsCrudController extends CrudController
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

        CRUD::setModel(\App\Models\Produits::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/produits');
        CRUD::setEntityNameStrings('materiels', 'materiel');
        /* si il a le role partenaire */
        $user = backpack_user()->hasRole('partenaire');
        if ($user) {
            $id = backpack_user()->id;
            $this->crud->addClause('where', 'owner_id', '=', $id);
        }
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn(
            [
                'name' => 'code',
                'type' => 'text',
                'label' => 'code',
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'nom',
                'type' => 'text',
                'label' => 'nom',
            ]
        );

        $this->crud->addColumn([
            'name' => 'code_categorie',
            'type' => 'select',
            'label' => "Marque",
            'entity' => 'categories',
            'attribute' => 'nom',
            'model' => "App\Models\Categories",
        ]);

        $this->crud->addColumn(
            [
                'name' => 'prix_vente',
                'type' => 'number',
                'label' => 'prix'
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'quantite',
                'type' => 'number',
                'label' => 'quantité'
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'enabled',
                'type' => 'boolean',
                'label' => 'activer'
            ]
        );
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProduitsRequest::class);
        $this->crud->addField(
            [
                'name' => 'code_categorie',
                'type' => 'select2',
                'label' => "Marque de l'article",
                'entity' => 'categories',
                'attribute' => 'nom',
                'model' => "App\Models\Categories", // foreign key model
                //'pivot' => true,
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ]
            ]
        );


        $this->crud->addField(
            [
                'name' => 'nom',
                'type' => 'text',
                'label' => 'nom',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );
        $this->crud->addField(
            [   // Browse
                'label' => "image",
                'name' => "image",
                'type' => 'upload_multiple',
                'upload' => true,
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );
        $this->crud->addField(
            [
                'name' => 'quantite',
                'type' => 'number',
                'label' => 'quantité disponible',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );

        $this->crud->addField(
            [
                'name' => 'owner_id',
                'type' => 'hidden',
                'value' => backpack_user()->id
            ]
        );


        $this->crud->addField(
            [
                'name' => 'prix_vente',
                'type' => 'text',
                'label' => 'prix',
                'default' => '2000',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6 '
                ],
            ]
        );

        $this->crud->addField(
            [
                'name' => 'prix_achat',
                'type' => 'hidden',
                'label' => 'prix d\'achat',
                'default' => '2000',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );

        $this->crud->addField(
            [
                'name' => 'enabled',
                'type' => 'boolean',
                'label' => 'Activer',
                'default' => true,
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );
        $this->crud->addField([
            'name' => 'description',
            'type' => 'wysiwyg',
            'label' => 'description du produit',
        ]);

       
        // $mtn = request()->input('prix_vente');
        // $prix_achat = intval($mtn) * 0.2 + $mtn;
        // $prix_vente = intval($mtn) + 1500;

        // \DB::table('produits')->where('code', request()->input('code'))->first() ? "" : request()->merge(array('prix_vente' => $prix_vente));
        // request()->merge(array('prix_achat' => $prix_achat));
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

    protected function setupShowOperation()
    {

        $this->crud->addColumn(
            [
                'name' => 'code',
                'type' => 'text',
                'label' => 'code',
            ]
        );

        $this->crud->addColumn(
            [
                'name' => 'nom',
                'type' => 'text',
                'label' => 'nom',
            ]
        );

        $this->crud->addColumn([
            'name' => 'code_categorie',
            'type' => 'select',
            'label' => "Marque",
            'entity' => 'categories',
            'attribute' => 'nom',
            'model' => "App\Models\Categories",
        ]);

        $this->crud->addColumn(
            [   // Browse
                'label' => "image",
                'name' => "image",
                'type' => 'upload_multiple',
                'prefix' => 'storage/',
            ]
        );

        $this->crud->addColumn(
            [
                'name' => 'prix_vente',
                'type' => 'number',
                'label' => 'prix'
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'quantite',
                'type' => 'number',
                'label' => 'quantité'
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'enabled',
                'type' => 'boolean',
                'label' => 'activer'
            ]
        );
    }


}