<?php

namespace App\Models;

use App\Models\Base;

class Decreto extends Base
{
    protected $model = "decretos\\";
    protected $subCodigo = "AÑO ";
    protected $anio;
    protected $codigo;
    protected $errorAnio = 'Error no se encuentra el año';

    public function __construct(int $anio, String $codigo = null)
    {
        $this->anio = $anio;
        $this->codigo = substr($codigo, 0, 1) . '-' . substr($codigo, 1) . '-';
    }

    protected function getAllFilesByYear()
    {
        $path = $this->basePath . $this->model . $this->subCodigo . $this->anio;
        $files = [];
        if ($fh = opendir($path)) {
            while (false !== ($fi = readdir($fh))) {
                if ($fh !== '.' || $fh !== '..') array_push($files, $fi);
            }
            unset($files[0]);
            unset($files[1]);
            return $files;
        } else {
            return $this->errorAnio;
        }
    }

    public function getFile()
    {
        $files = $this->getAllFilesByYear();

        if ($files !== $this->errorAnio) {
            $file = array_filter($files, function ($string) {
                $subString = $this->codigo . substr($this->anio, 2);
                return str_contains($string, $subString);
            });

            if (count($file) > 0) {
                return $file;
            }else{
                return 'El archivo no existe';
            }

        } else {
            return $this->errorAnio;
        }
    }
}
