<?php

namespace App\Http\Controllers\Admin;

use App\Models\Header;


// use Nette\Utils\Image;
use Intervention\Image\Image;
// use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHeaderRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateHeaderRequest;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $headers = Header::paginate(10);

        return view('admin.header.index', compact('headers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.header.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHeaderRequest $request)
    {
        $validator = Validator::make($request->all(), $request->rules());

        if ($validator->fails()) {
            return redirect()->route('header.index')->with('error', 'Validasi Gagal');
        }

        try {
            DB::transaction(function () use ($request, &$headers) {
                $file = $request->file('image');
                 // Manipulasi gambar menggunakan Intervention Image
                 $image = Image::make($file);
                 $image->resize(800, null, function ($constraint) {
                     $constraint->aspectRatio();
                 });
                 // Extract the filename without the extension
                $imageData = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $imageFileName = strtotime(date('Y-m-d H:i:s')) . '.' . $imageData . '.webp';

                // Simpan file dengan nama yang sudah dikodekan ke direktori yang sesuai
                $image->save(base_path() . '/' . env('UPLOADS_DIRECTORY') . '/' . $imageFileName, 90, 'webp');

                $headers = Header::create([
                    'name' => $request->input('name'),
                    'as' => $request->input('as'),
                    'email' => $request->input('email'),
                    'image' => $request->input('image'),
                ]);
                });
                if ($headers) {
                    return redirect()->route('header.index')->with('success', 'Data Berhasil Disimpan');
                } else {
                    return redirect()->route('header.index')->with('error', 'Data Gagal Disimpan');
                }
        } catch (\Exception $e) {
            return redirect()->route('header.index')->with('error', 'Terjadi Kesalahan Pada Sistem');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Header $header)
    {
        return view('admin.header.edit', compact('header'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHeaderRequest $request, Header $header)
    {
        UploadController::deleteSingleImage($header);

        $image = UploadController::uploadSingleImage('assets/image');
        $request->merge(['image' => $image]);

        $header->update($request->all());

        return redirect()->route('header.index')->with('success', 'Data berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Header $header)
    {
        UploadController::deleteSingleImage($header);

        $header->delete();

        return redirect()->route('header.index')->with('success', 'Data berhasil dihapus');
    }


}
