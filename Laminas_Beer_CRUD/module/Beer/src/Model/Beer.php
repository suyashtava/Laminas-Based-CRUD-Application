<?php
namespace Beer\Model;

use Laminas\Filter\StringTrim;
use Laminas\Filter\StripTags;
use Laminas\Filter\ToInt;
use Laminas\InputFilter\InputFilter;
use Laminas\InputFilter\InputFilterAwareInterface;
use Laminas\InputFilter\InputFilterInterface;
use Laminas\Validator\StringLength;
use Laminas\Validator\EmailAddress;
use Laminas\Filter\StripNewlines;
use Laminas\Filter\ToNull;
use Laminas\Validator\Digits;

class Beer implements InputFilterAwareInterface
{
    public $id;
    public $brewery_id;
    public $name;
    public $cat_id;
    public $email;
    public $phone_number;
    private $inputFilter;



  //  public $artist;
   // public $title;
  //  private $inputFilter;
    public function exchangeArray(array $data)
    {
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->brewery_id = !empty($data['brewery_id']) ? $data['brewery_id'] : null;
        $this->name = !empty($data['name']) ? $data['name'] : null;
        $this->cat_id = !empty($data['cat_id']) ? $data['cat_id'] : null;
        $this->email = !empty($data['email']) ? $data['email'] : null;
        $this->phone_number = !empty($data['phone_number']) ? $data['phone_number'] : null;
   //     $this->artist = !empty($data['artist']) ? $data['artist'] : null;
   //     $this->title = !empty($data['title']) ? $data['title'] : null;
    }
    // Add the following method:
    public function getArrayCopy()
    {
        return [
            'id'     => $this->id,
            'brewery_id' => $this->brewery_id,
            'name' => $this->name,
            'cat_id' => $this->cat_id,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
       //     'artist' => $this->artist,
        //    'title'  => $this->title,
        ];
    }
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
        ));
    }

    public function getInputFilter()
    {
        if ($this->inputFilter) {
            return $this->inputFilter;
        }

        $inputFilter = new InputFilter();

        $inputFilter->add([
            'name' => 'phone_number',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StripNewlines::class],
                ['name' => StringTrim::class],
                ['name' => ToNull::class]
            ],
            'validators' => [
                ['name' => Digits::class,],
                [
                    'name' => StringLength::class,
                    'break_chain_on_failure' => true,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 10,
                        'max' => 10
                    ]
                ],

            ]
        ]);


        $inputFilter->add([
            'name' => 'id',
            'required' => true,
            'filters' => [
                ['name' => ToInt::class],
            ],
        ]);

        $inputFilter->add([
                    'name' => 'email',
                    'required' => true,
                    'filters' => [
                        ['name' => StripTags::class],
                        ['name' => StripNewlines::class],
                        ['name' => StringTrim::class],
                        ['name' => ToNull::class]
                    ],
                    'validators' => [
                        [
                            'name' => EmailAddress::class,
                            'break_chain_on_failure' => true,
                        ],
                        [
                            'name' => StringLength::class,
                            'break_chain_on_failure' => true,
                            'options' => [
                                'encoding' => 'UTF-8',
                                'min' => 3,
                                'max' => 255
                            ]
                        ]
                    ]
                ]);

        $inputFilter->add([
                    'name' => 'brewery_id',
                    'required' => true,
                    'filters' => [
                        ['name' => ToInt::class],
                    ],
                ]);

        $inputFilter->add([
                    'name' => 'cat_id',
                    'required' => true,
                    'filters' => [
                        ['name' => ToInt::class],
                    ],
                ]);

        $inputFilter->add([
                    'name' => 'name',
                    'required' => true,
                    'filters' => [
                        ['name' => StripTags::class],
                        ['name' => StringTrim::class],
                    ],
                    'validators' => [
                        [
                            'name' => StringLength::class,
                            'options' => [
                                'encoding' => 'UTF-8',
                                'min' => 1,
                                'max' => 100,
                            ],
                        ],
                    ],
                ]);

        /*
        $inputFilter->add([
                    'name' => 'artist',
                    'required' => true,
                    'filters' => [
                        ['name' => StripTags::class],
                        ['name' => StringTrim::class],
                    ],
                    'validators' => [
                        [
                            'name' => StringLength::class,
                            'options' => [
                                'encoding' => 'UTF-8',
                                'min' => 1,
                                'max' => 100,
                            ],
                        ],
                    ],
                ]);


        $inputFilter->add([
                    'name' => 'artist',
                    'required' => true,
                    'filters' => [
                        ['name' => StripTags::class],
                        ['name' => StringTrim::class],
                    ],
                    'validators' => [
                        [
                            'name' => StringLength::class,
                            'options' => [
                                'encoding' => 'UTF-8',
                                'min' => 1,
                                'max' => 100,
                            ],
                        ],
                    ],
                ]);


        $inputFilter->add([
                    'name' => 'artist',
                    'required' => true,
                    'filters' => [
                        ['name' => StripTags::class],
                        ['name' => StringTrim::class],
                    ],
                    'validators' => [
                        [
                            'name' => StringLength::class,
                            'options' => [
                                'encoding' => 'UTF-8',
                                'min' => 1,
                                'max' => 100,
                            ],
                        ],
                    ],
                ]);
        $inputFilter->add([
                    'name' => 'artist',
                    'required' => true,
                    'filters' => [
                        ['name' => StripTags::class],
                        ['name' => StringTrim::class],
                    ],
                    'validators' => [
                        [
                            'name' => StringLength::class,
                            'options' => [
                                'encoding' => 'UTF-8',
                                'min' => 1,
                                'max' => 100,
                            ],
                        ],
                    ],
                ]);

        */


    /*    $inputFilter->add([
            'name' => 'artist',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name' => 'title',
            'required' => true,
            'filters' => [
                ['name' => StripTags::class],
                ['name' => StringTrim::class],
            ],
            'validators' => [
                [
                    'name' => StringLength::class,
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
            ],
        ]);
        */

        $this->inputFilter = $inputFilter;
        return $this->inputFilter;
    }
}
