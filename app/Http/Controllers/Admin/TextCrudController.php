<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\TextRequest as StoreRequest;
use App\Http\Requests\TextRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class TextCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TextCrudController extends CrudController {
    public function setup() {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Text');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/texts');
        $this->crud->setEntityNameStrings('text', 'texts');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->addColumns([
            [
                "name" => "id",
                "label" => trans("dashboard.text.columns.id"),
            ],
            [
                "name" => "text",
                "label" => trans("dashboard.text.columns.text"),
            ],
            [
                "name" => "upvotes",
                "label" => trans("dashboard.text.columns.upvotes"),
            ],
            [
                "name" => "downvotes",
                "label" => trans("dashboard.text.columns.downvotes"),
            ],
        ]);

        $this->crud->addFields([
            [
                "name" => "text",
                "label" => trans("dashboard.text.columns.text"),
                "type" => "text",
            ],
            [
                "name" => "upvotes",
                "label" => trans("dashboard.text.columns.upvotes"),
                "type" => "number",
                "default" => "0",
                "attributes" => [
                    "min" => "0",
                    "step" => "1",
                ],
            ],
            [
                "name" => "downvotes",
                "label" => trans("dashboard.text.columns.downvotes"),
                "type" => "number",
                "default" => "0",
                "attributes" => [
                    "min" => "0",
                    "step" => "1",
                ],
            ],
        ]);

        // add asterisk for fields that are required in TextRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request) {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request) {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
