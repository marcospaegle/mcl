<?php

namespace App\DTO;

class Creator
{
    public $id;
    public $firstName;
    public $middleName;
    public $lastName;
    public $suffix;
    public $fullName;
    public $modified;
    public $thumbnail;

    function __construct(array $attr)
    {
        $this->id = $attr['id'];
        $this->firstName = $attr['firstName'];
        $this->middleName = $attr['middleName'];
        $this->lastName = $attr['lastName'];
        $this->suffix = $attr['suffix'];
        $this->fullName = $attr['fullName'];
        $this->modified = new \DateTime($attr['modified']);
        $this->thumbnail = $attr['thumbnail'];      
    }
}
