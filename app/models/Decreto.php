<?php

namespace App\Models;

use App\Models\Base;

class Decreto extends Base
{
    protected $model = "decretos\\";
    protected $subCodigo = "AÑO ";

    public function getFile()
    {
        $files = $this->getAllFilesByYear();

        if ($files !== $this->errorAnio) {
            $file = array_filter($files, function ($string) {
                $subString = $this->codigo . substr($this->anio, 2);
                return str_contains($string, $subString);
            });

            if (count($file) > 0) {
                $file = array_values($file);
                $file = [
                    'name' => $file[0],
                    'path' => $this->path . '\\'.$file[0],
                    'base64' => convertirABase64($this->path . '\\'.$file[0])
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
