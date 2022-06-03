<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ConfigRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ConfigCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ConfigCrudController extends CrudController
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
        $this->crud->denyAccess(['create', 'delete']);

        CRUD::setModel(\App\Models\Config::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/config');
        CRUD::setEntityNameStrings('config', 'paramètre société');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumn([
            'name' => 'nom',
            'type' => 'text',
            'label' => "Nom"
        ]);

        $this->crud->addColumn([
            'label' => "logo",
            'name' => 'logo',
            'type' => 'image'
        ]);

        $this->crud->addColumn([
            'name' => 'couleur',
            'type' => 'text',
            'label' => "couleur"
        ]);

        $this->crud->addColumn([
            'name' => 'email',
            'type' => 'text',
            'label' => "Email"
        ]);

        $this->crud->addColumn([
            'name' => 'contact',
            'type' => 'text',
            'label' => "Contact"
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
        CRUD::setValidation(ConfigRequest::class);

        $this->crud->addField([
            'label' => "logo",
            'name' => 'logo',
            'filename' => '',
            'type' => 'base64_image',
            
        ]);

        $this->crud->addField([
            'name' => 'couleur',
            'type' => 'color_picker',
            'label' => "couleur",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);

        $this->crud->addField([
            'name' => 'nom',
            'type' => 'text',
            'label' => "Nom",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);

        $this->crud->addField([
            'name' => 'email',
            'type' => 'text',
            'label' => "Email",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
        ]);
        $this->crud->addField([
            'name' => 'contact',
            'type' => 'text',
            'label' => "Contact",
            'wrapperAttributes' => [
                'class' => 'form-group col-md-6'
            ],
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
