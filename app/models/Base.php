<?php

namespace App\Models;

class Base
{
    protected $basePath = "C:\\webapp\\digesto\\";
    protected $subCodigo = "";
    protected $anio;
    protected $codigo;
    protected $errorAnio = 'No se encuentra el año';
    public $path;

    public function __construct(int $anio, String $codigo = null)
    {
        $this->anio = $anio;
        $this->codigo = substr($codigo, 0, 1) . '-' . substr($codigo, 1) . '-';
    }

    protected function getAllFilesByYear()
    {
        $this->path = $this->basePath . $this->model . $this->subCodigo . $this->anio;
        $files = [];
        if ($fh = opendir($this->path)) {
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

    public function getBasePath() {
        return $this->basePath;
    }

    
}
