<?php

namespace App\Models;

use App\Models\Base;

class Ordenanza extends Base
{
    protected $model = "ordenanzas\\";
    protected $letra = "D";

    public function __construct(String $codigo = null)
    {
        $this->codigo = $codigo;
    }

    public function getFile()
    {
        $files = $this->getAllFiles();

        $files = array_filter($files, function ($string) {
            return str_contains($string, $this->codigo);
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
