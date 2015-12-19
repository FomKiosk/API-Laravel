<?php
namespace Calie\Admin;

class Test
{
    public $number;

    public function __construct()
    {
        $this->number = 0;
    }

    public function add()
    {
        $this->number ++;
    }
}