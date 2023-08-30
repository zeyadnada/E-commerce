<?php

namespace App\Http\traits;

use App\Models\Product;
use Illuminate\Http\Request;

trait media
{

    public function uploadImage($image)
    {
        $imageExtenstion = $image->extension();
        $newImage = time() . "." . $imageExtenstion;
        $image->move(public_path('/images'), $newImage);
        return $newImage;
    }

    public function deletePhoto($photoPath)
    {
        if (file_exists($photoPath)) {
            unlink($photoPath);
            return true;
        }
        return false;
    }
}
