<?php

namespace App\utils;

class RenderHtml
{
    public function simpleCard($nombre, $descipcion)
    {
        $slug = $this->slug($nombre) . '.php';
        return "<a href=public/views/normas/$slug>
                    <div class='card'>
                        <div class='card-body'>
                            <h5 class='card-title'>$nombre</h5>
                            <p class='card-text'>$descipcion</p>
                        </div>
                    </div>
                </a>";
    }

    public function slug($str, $delimiter = '-')
    {
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }
}
