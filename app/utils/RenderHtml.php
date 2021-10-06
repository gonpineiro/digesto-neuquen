<?php

namespace App\utils;

class RenderHtml
{
    public function simpleCard($nombre, $descipcion)
    {
        return "<div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>$nombre</h5>
                        <p class='card-text'>$descipcion</p>
                        <a href='#' class='btn btn-primary'>Ir a $nombre</a>
                    </div>
                </div>";
    }
}
