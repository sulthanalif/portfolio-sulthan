<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    public static function uploadImage(UploadedFile $image, $directory = 'assets/images')
    {
        $imageData = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $imageFileName = strtotime(now()) . '_' . $imageData . '.webp';

        // Menyimpan file ke direktori yang sesuai menggunakan Laravel Storage
        $simpanImage = $image->storeAs($directory, $imageFileName, 'public');

        return $simpanImage ? $imageFileName : null;
    }

    public static function deleteImage($imagePath)
    {
        // Menghapus file gambar dari direktori menggunakan Laravel Storage
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
            return true;
        }

        return false;
    }
}
