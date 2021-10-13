<?php

namespace App\Models;

use App\Models\Base;

class Decreto extends Base
{
    protected $model = "decretos\\";
    protected $subCodigo = "AÑO ";
    protected $letra = "D";


    public function getListYear()
    {
        $tmp = array();
        $years = $this->getAllFolderRoot();

        foreach ($years as $key => $year) {
            $tmp[$key] = substr($year, 5);
        }

        return $tmp;
    }
}
