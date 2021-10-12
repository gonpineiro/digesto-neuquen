<?php

namespace App\Models;

class Base
{
    protected $basePath = '../../../../../digesto';
    protected $subCodigo = "";
    protected $anio;
    protected $codigo;
    protected $errorAnio = 'No se encuentra el año';
    public $path;

    public function __construct(int $anio, String $codigo = null)
    {
        $this->anio = $anio;
        $this->codigo = $this->letra . '-' . $codigo . '-';
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

    public function getBasePath()
    {
        return $this->basePath;
    }

    public function getFile()
    {
        $files = $this->getAllFilesByYear();

        if ($files !== $this->errorAnio) {
            $file = array_filter($files, function ($string) {
                $subString = $this->codigo . substr($this->anio, 2);
                $subString = strtolower($subString);
                $string = strtolower($string);
                return str_contains($string, $subString);
            });

            if (count($file) > 0) {
                $file = array_values($file);
                $file = [
                    'name' => $file[0],
                    'path' => $this->path . '\\' . $file[0],
                    'base64' => convertirABase64($this->path . '\\' . $file[0])
                ];
                return $file;
            } else {
                return 'El archivo no existe';
            }
        } else {
            return $this->errorAnio;
        }
    }
}
