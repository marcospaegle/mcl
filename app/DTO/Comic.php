<?php

namespace App\DTO;

class Comic
{
    public $id;
    public $digitalId;
    public $title;
    public $issueNumber;
    public $variantDescription;
    public $description;
    public $modified;
    public $isbn;
    public $upc;
    public $diamondCode;
    public $ean;
    public $issn;
    public $format;
    public $pageCount;
    public $textObjects;
    public $resourceURI;

    function __construct(array $attr)
    {
        $this->id = $attr['id'];
        $this->digitalId = $attr['digitalId'];
        $this->title = $attr['title'];
        $this->issueNumber = $attr['issueNumber'];
        $this->variantDescription = $attr['variantDescription'];
        $this->description = $attr['description'];
        $this->modified = new \DateTime($attr['modified']);
        $this->isbn = $attr['isbn'];
        $this->upc = $attr['upc'];
        $this->diamondCode = $attr['diamondCode'];
        $this->ean = $attr['ean'];
        $this->issn = $attr['issn'];
        $this->format = $attr['format'];
        $this->pageCount = $attr['pageCount'];
        $this->resourceURI = $attr['resourceURI'];
    }
}
