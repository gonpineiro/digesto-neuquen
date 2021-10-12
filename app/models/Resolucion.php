<?php

namespace App\Models;

class Resolucion extends Base
{
    protected $model = "resoluciones\\";
    protected $anio;
    protected $codigo;
    protected $errorAnio = 'No se encuentra el año';

    public function __construct(int $anio, String $codigo = null)
    {
        $this->anio = $anio;
        $this->codigo = substr($codigo, 0, 1) . '-' . substr($codigo, 1) . '-';
    }

    public function getHabilitacion()
    {
        return $this->habilitacion;
    }

    private function formatDate()
    {
        $timestamp = strtotime($this->habilitacion["habFechaAlta"]);
        $this->habilitacion["habFechaAlta"] = date('d/m/Y', $timestamp);

        $timestamp = strtotime($this->habilitacion["habFechaVencimiento"]);
        $this->habilitacion["habFechaVencimiento"] = date('d/m/Y', $timestamp);

        $timestamp = strtotime($this->habilitacion["rtoFechaVencimiento"]);
        $this->habilitacion["rtoFechaVencimiento"] = date('d/m/Y', $timestamp);

        $timestamp = strtotime($this->habilitacion["polizaFechaVencimiento"]);
        $this->habilitacion["polizaFechaVencimiento"] = date('d/m/Y', $timestamp);
    }

    private function limpiarHabilitacion()
    {

        /* Controlamos que solamente traiga un arreglo con con esa patente */
        $this->habilitacion = array_filter($this->habilitacion, function ($habilitacion) {
            if ($habilitacion['patente'] == $this->patente) {
                return $habilitacion;
            }
        });

        /* Del arreglo obtenido anteriormente devolvemos el unico valor valido */
        if (count($this->habilitacion) > 1) {
            return array_filter($this->habilitacion, function ($habilitacion) {
                if ($this->existeTipoEnString($habilitacion['titularEmpresa'])) {
                    return $habilitacion;
                }
            });
        } else {
            return $this->habilitacion;
        }
    }

    private function existeTipoEnString($string)
    {
        $documentoTipos = array('CUIT:', 'CUIL:', 'PQCNT:', 'LE:', 'DNI:', 'SC:');
        foreach ($documentoTipos as $token) {
            if (stristr($string, $token) !== false) {
                return true;
            }
        }
        return false;
    }
}
