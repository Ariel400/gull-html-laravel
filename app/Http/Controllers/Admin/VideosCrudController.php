<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VideosRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class VideosCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class VideosCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Videos::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/videos');
        CRUD::setEntityNameStrings('videos', 'videos');
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
            [   // Browse
                'label' => "Legende",
                'name' => "legende",
                'type' => 'text'
            ]
        );

        $this->crud->addColumn(
            [   // Browse
                'label' => "fichier",
                'name' => "image",
                'type' => 'file'
            ]
        );

        $this->crud->addColumn(
            [
                'label' => "tags",
                'type' => 'select',
                'name' => 'tag_id',
                'entity' => 'tags', // the method that defines the relationship in your Model
                'model' => "App\Models\Tags",
                'attribute' => 'nom', // foreign key attribute that is shown to user
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
        CRUD::setValidation(VideosRequest::class);

        $this->crud->addField(
            [   // Browse
                'label' => "Legende",
                'name' => "legende",
                'type' => 'text'
            ]
        );

        $this->crud->addField(

            [   // Browse
                'label' => "Fichier",
                'name' => "fichier",
                'type' => 'upload',
                'upload' => true,
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );

        $this->crud->addField(
            [
                'label' => "tags",
                'type' => 'select',
                'name' => 'tag_id',
                'entity' => 'tags', // the method that defines the relationship in your Model
                'model' => "App\Models\Tags",
                'attribute' => 'nom', // foreign key attribute that is shown to user
            ]
        );
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
