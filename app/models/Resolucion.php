<?php

namespace App\Models;

class Resolucion extends Base
{
    protected $model = "resoluciones\\";    
    protected $letra = "R";
    protected $digitos = 4;

    public function getListYear()
    {
        return $this->getAllFolderRoot();
    }
}
