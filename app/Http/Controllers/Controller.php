<?php

namespace App\Http\Controllers;

abstract class Controller
{
    
    public function imageCreate($image, $addmodel, $type)
    {
        if ($image != null) {
            if ($addmodel->image != null) {
                $addmodel->image->delete();
            }

            $imagePath = $image->storePublicly('image', 'public');
            $package_img = $addmodel->images()->create([
                'image_type' => $type,
                'path' => $imagePath,
            ]);

            return $package_img;
        }
    }

}