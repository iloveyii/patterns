<?php

namespace Adapt;

class Book implements BookInterface {

    public function open()
    {
        var_dump('Openning paper book');
    }

    public function turnPage()
    {
        var_dump('Turn page of the paper book');
    }
}