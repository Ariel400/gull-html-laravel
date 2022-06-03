<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticlesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ArticlesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ArticlesCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Articles::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/articles');
        CRUD::setEntityNameStrings('articles', 'articles');
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
        $this->crud->addColumn(
            [   // Browse
                'label' => "image",
                'name' => "cover",
                'type' => 'image'
            ]
        );


        CRUD::column('titre')->type('text');

        $this->crud->addColumn(
            [
                'label' => "tags",
                'type' => 'relationship',
                'name' => 'tags',
                'entity' => 'tags', // the method that defines the relationship in your Model
                'attribute' => 'nom', // foreign key attribute that is shown to user
                'model' => "App\Models\Tags",
                'pivot' => true
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
        CRUD::setValidation(ArticlesRequest::class);

        $this->crud->addField(
            [   // Browse
                'label' => "image",
                'name' => "cover",
                'type' => 'image',
                'upload' => true,
                'crop' => true,
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );
        $this->crud->addField(
            [   // Browse
                'label' => "Titre",
                'name' => "titre",
                'type' => 'text',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-12'
                ],
            ]
        );
        // $this->crud->addField(
        //     [   // Browse
        //         'label' => "slug",
        //         'name' => "slug",
        //         'type'  => 'text',
        //         'wrapperAttributes' => [
        //             'class' => 'form-group col-md-12'
        //         ],
        //     ]
        // );
        $this->crud->addField(
            [
                'label' => 'Tag',
                'type' => 'select2_multiple',
                'name' => 'tags',
                // optional
                'entity' => 'tags',
                'model' => "App\Models\Tags", // foreign key model
                'attribute' => 'nom',
                'pivot' => true,
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-6'
                ],
            ]
        );
        $this->crud->addField(
            [   // Browse
                'label' => "Contenu",
                'name' => "contenu",
                'type' => 'wysiwyg',
                'wrapperAttributes' => [
                    'class' => 'form-group col-md-12'
                ],
            ]
        );
        // CRUD::setFromDb(); // fields

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
