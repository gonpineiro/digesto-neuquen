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

    public function downloadForm($name, $base64)
    {
        return "<form action='../download.php' method='POST'>
                    <div class='mb-3' style='width: 100%'>
                        <button class='btn btn-primary' style='width: 100%'>
                            Descargar $name</button>
                        <input type='text' value='$base64' hidden name='base64'>
                        <input type='text' value='$name' hidden name='name'>
                    </div>
                </form>";
    }
}
