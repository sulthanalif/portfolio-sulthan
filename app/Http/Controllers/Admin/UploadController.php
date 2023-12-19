<?php

namespace App\Http\Controllers\Admin;

use App\Models\Header;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    public static function uploadSingleImage($storagePath)
    {
        if (request()->hasFile('file')) {
            $filename = request()->file->getClientOriginalName();
            request()->file->storeAs('public/assets/image/'.$storagePath,$filename);

            return $filename;
        }
    }

    public static function deleteSingleImage(Header $header)
    {
        $filePath = storage_path(public_path('assets/') . $header->image);

        if (file_exists($filePath)) {
            File::delete($filePath);
        }
    }
}
