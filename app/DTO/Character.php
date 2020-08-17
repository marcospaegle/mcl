<?php

namespace App\DTO;

class Character
{
    public $id;
    public $name;
    public $description;
    public $modified;
    public $thumbnail;

    function __construct(array $attr)
    {
        try {
            $this->id = $attr['id'];
            $this->name = $attr['name'];
            $this->description = $attr['description'];
            $this->modified = $attr['modified'];
            $this->thumbnail = $attr['thumbnail'];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
