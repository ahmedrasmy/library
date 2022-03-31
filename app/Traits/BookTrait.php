<?php
namespace App\Traits;

trait BookTrait
{
    function saveImage($photo,$folder)
    {
        $img=$photo;
        $ext=$img->getClientOriginalExtension();
        $name="book- ". uniqid() .".$ext";
        $img->move(public_path($folder),$name);
        return $name;
    }
}  