<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PadevAdminRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PadevAdminCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PadevAdminCrudController extends CrudController
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
        CRUD::setModel(\App\Models\PadevAdmin::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/padev-admin');
        CRUD::setEntityNameStrings('un événemment', 'Gestion padev');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // columns

        $this->crud->addColumn([
            'name' => 'couverture',
            'type' => 'image',
            'label' => "photo de couverture"
        ]);

        $this->crud->addColumn(
            [
                'name' => 'titre',
                'type' => 'text',
                'label' => 'Libelle',
            ]
        );

        $this->crud->addColumn([
            'name' => 'lieu',
            'type' => 'text',
            'label' => "Lieu de l'événement",
        ]);

        $this->crud->addColumn(
            [
                'name' => 'debut',
                'type' => 'date',
                'label' => "Debut de l'événement",
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'fin',
                'type' => 'date',
                'label' => 'Fin de l\événement',
            ]
        );

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
        CRUD::setValidation(PadevAdminRequest::class);

        $this->crud->addField([
            'label' => "photo de couverture",
            'name' => 'couverture',
            'filename' => '',
            'type' => 'base64_image'
        ]);

        // CRUD::setFromDb(); // fields
        $this->crud->addField([
            'name' => 'titre',
            'type' => 'text',
            'label' => "Libellé de l'événement",
        ]);

        $this->crud->addField([
            'name' => 'lieu',
            'type' => 'text',
            'label' => "Lieu de l'événement",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);


        $this->crud->addField([
            'name' => 'debut',
            'type' => 'date',
            'label' => "debut de l'événement",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);


        $this->crud->addField([
            'name' => 'fin',
            'type' => 'date',
            'label' => "debut de l'événement",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
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

        $this->crud->addColumn([
            'name' => 'couverture',
            'type' => 'image',
            'label' => "photo de couverture"
        ]);

        $this->crud->addColumn(
            [
                'name' => 'titre',
                'type' => 'text',
                'label' => 'Libelle',
            ]
        );

        $this->crud->addColumn([
            'name' => 'lieu',
            'type' => 'text',
            'label' => "Lieu de l'événement",
        ]);

        $this->crud->addColumn(
            [
                'name' => 'debut',
                'type' => 'date',
                'label' => "Debut de l'événement",
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'fin',
                'type' => 'date',
                'label' => 'Fin de l\'événement',
            ]
        );
    }
}
