<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RevisionsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class RevisionsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RevisionsCrudController extends CrudController
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
        $this->crud->denyAccess(['create','delete']);

        CRUD::setModel(\App\Models\Revisions::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/revisions');
        CRUD::setEntityNameStrings('revisions', 'revisions');
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
            'name' => 'user_id',
            'type' => 'select',
            'label' => "Agent",
            'entity' => 'client',
            'attribute' => 'name',
            'model' => "App\Models\Clients",
        ]);
        $this->crud->addColumn([
            'name' => 'revisionable_type',
            'type' => 'text',
            'label' => "Operation sur",

        ]);
        $this->crud->addColumn([
            'name' => 'revisionable_id',
            'type' => 'text',
            'label' => "Identifiant",

        ]);
        $this->crud->addColumn([
            'name' => 'key',
            'type' => 'text',
            'label' => "column",

        ]);
        $this->crud->addColumn([
            'name' => 'old_value',
            'type' => 'text',
            'label' => "ancienne valeur",

        ]);
        $this->crud->addColumn([
            'name' => 'new_value',
            'type' => 'text',
            'label' => "nouvelle valeur",

        ]);
        $this->crud->addColumn([
            'name' => 'created_at',
            'type' => 'text',
            'label' => "Date",

        ]);
        /**
         * Columns can be defined using the fluent syntax or array syntax:
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
        CRUD::setValidation(RevisionsRequest::class);

        CRUD::setFromDb(); // fields

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
