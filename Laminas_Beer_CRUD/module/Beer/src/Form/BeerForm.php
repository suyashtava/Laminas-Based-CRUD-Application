<?php
namespace Beer\Form;

use Laminas\Form\Form;

class BeerForm extends Form
{
    public function __construct($name = null)
    {
        // We will ignore the name provided to the constructor
        parent::__construct('Beers');
        
        $this->add([
            'name' => 'id',
            'type' => 'hidden',
        ]);
        
        $this->add([
            'name' => 'brewery_id',
            'type' => 'text',
            'options' => [
                'label' => 'Brewery_Id',
            ],
        ]);
        $this->add([
            'name' => 'name',
            'type' => 'text',
            'options' => [
                'label' => 'Name',
            ],
        ]);
        $this->add([
            'name' => 'cat_id',
            'type' => 'text',
            'options' => [
                'label' => 'CAT_ID',
            ],
        ]);
        $this->add([
            'name' => 'email',
            'type' => 'text',
            'options' => [
                'label' => 'EMAIL',
            ],
        ]);
        $this->add([
            'name' => 'phone_number',
            'type' => 'text',
            'options' => [
                'label' => 'PHONE_NUMBER',
            ],
        ]);


/*
        $this->add([
            'name' => 'title',
            'type' => 'text',
            'options' => [
                'label' => 'Title',
            ],
        ]);
        $this->add([
            'name' => 'artist',
            'type' => 'text',
            'options' => [
                'label' => 'Artist',
            ],
        ]);*/

        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Submit',
                'id'    => 'submitbutton',
            ],
        ]);

    }
}
