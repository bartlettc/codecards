<?php
/**
 * Created by PhpStorm.
 * User: bartl
 * Date: 27/03/2017
 * Time: 19:44
 */

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class ImageService
{

    /**
     * Creates an image using base64 encoded data
     *
     * @param $base64Data
     * @return string
     */
    public function create($base64Data): string
    {
        //TODO: Add exception handling;
        $imageData = base64_decode($base64Data, 1);

        if (!$imageData) {
            return false;
        }

        $fileId = Uuid::uuid4()->toString();
        Storage::put($fileId . '.png', $imageData);
        return $fileId;

    }
}