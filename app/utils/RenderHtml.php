<?php

namespace App\utils;

class RenderHtml
{
    public function simpleCard($nombre, $descipcion, $link = null)
    {
        $slug = $this->slug($nombre) . '.php';

        if ($link) {
            $href = $link;
            $target = '_blank';
        } else {
            $target = '';
            $href = "public/views/normas/$slug";
        }

        return "<a href=$href target=$target>
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

    public function downloadForm($name, $path)
    {
        return "<form action='../download.php' method='POST'>
                    <button class='btn btn-primary btn-download' style='width: 100%'>
                    ↓</button>
                    <input type='text' value='$path' hidden name='path'>
                    <input type='text' value='$name' hidden name='name'>
                </form>";
    }
}
