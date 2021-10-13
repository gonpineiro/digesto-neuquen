<?php

namespace App\Models;

class Base
{
    protected $basePath = BASE_FILE_PATH;
    protected $subCodigo = "";
    protected $anio;
    protected $codigo;
    protected $errorAnio = 'No se encuentra el año';
    protected $digitos;

    public function setAnio(int $anio)
    {
        $this->anio = $anio;
    }

    public function setCodigo(String $codigo)
    {
        $this->codigo = $codigo;
    }

    protected function getAllFolderRoot()
    {
        $this->path = $this->basePath . $this->model;

        $files = [];
        if ($fh = opendir($this->path)) {
            while (false !== ($fi = readdir($fh))) {
                if ($fi != 'index.asp') array_push($files, $fi);
            };
            unset($files[0]);
            unset($files[1]);
            return array_values($files);
        }
    }

    protected function getAllFilesByYear()
    {
        $this->path = $this->basePath . $this->model . $this->subCodigo . $this->anio;

        $files = [];
        if ($fh = opendir($this->path)) {
            while (false !== ($fi = readdir($fh))) {
                if ($fh !== '.' || $fh !== '..') array_push($files, $fi);
            }
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

        $files = array_filter($files, function ($string) {
            $subString = strtolower($this->codigo);
            $string = strtolower($string);
            return str_contains($string, $subString);
        });

        if (count($files) > 0) {
            $formatFiles = [];
            $files = array_values($files);
            foreach ($files as $file) {
                array_push($formatFiles, [
                    'name' => $file,
                    'path' => $this->path . '\\' . $file,
                    'base64' => convertirABase64($this->path . '\\' . $file)
                ]);
            }
            return $formatFiles;
        } else {
            return 'El archivo no existe';
        }
    }
}
