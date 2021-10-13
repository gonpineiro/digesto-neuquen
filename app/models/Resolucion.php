<?php

namespace App\Models;

class Resolucion extends Base
{
    protected $model = "resoluciones\\";    
    protected $letra = "R";

    public function getListYear()
    {
        $tmp = array();
        $years = $this->getAllFolderRoot();

        return $years;
    }
}
