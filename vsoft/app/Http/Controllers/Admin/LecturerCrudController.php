<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LecturerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class LecturerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LecturerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    private function getFieldsData($show = FALSE) {
        return [
            [
                'name'=> 'FirstName',
                'label' => 'FirstName',
                'type'=> 'text'
            ],
            [
                'name' => 'LastName',
                'label' => 'LastName',
                'type' => 'text'
            ],
            [
                'name' => 'Age',
                'label' => 'Age',
                'type' => 'text'
            ],
            [
                'name' => 'Organization',
                'label' => 'Organization',
                'type' => 'text'
            ],
            [
                'name' => 'WorkPlace',
                'label' => 'WorkPlace',
                'type' => 'text'
            ],
            [
                'name' => 'Email',
                'label' => 'Email',
                'type' => 'text'
            ],
            [
                'name' => 'PhoneNumber',
                'label' => 'PhoneNumber',
                'type' => 'text'
            ],
            [
                'label' => "ProfilePic",
                'name' => "image",
                'type' => 'image',
                'crop' => true, // set to true to allow cropping, false to disable
                'aspect_ratio' => 1, // omit or set to 0 to allow any aspect ratio
            ]
        ];
    }
    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Lecturer::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/lecturer');
        CRUD::setEntityNameStrings('lecturer', 'lecturers');
        $this->crud->addFields($this->getFieldsData());
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->set('show.setFromDb', false);
        $this->crud->addColumns($this->getFieldsData(TRUE));
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(LecturerRequest::class);

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
    protected function setupShowOperation()
    {
    // by default the Show operation will try to show all columns in the db table,
    // but we can easily take over, and have full control of what columns are shown,
    // by changing this config for the Show operation
    $this->crud->set('show.setFromDb', false);
    $this->crud->addColumns($this->getFieldsData(TRUE));
    }
}
