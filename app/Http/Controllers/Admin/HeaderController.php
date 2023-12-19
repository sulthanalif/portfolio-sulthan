<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Models\Header;


// use Nette\Utils\Image;
use Intervention\Image\Image;
use Illuminate\Support\Facades\Storage;
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
         // Menggunakan validator yang sudah didefinisikan dalam StoreHeaderRequest
    $validator = Validator::make($request->all(), $request->rules());

    if ($validator->fails()) {
        return redirect()->route('header.index')->with('error', 'Validasi Gagal');
    }

    try {
        DB::transaction(function () use ($request) {
            // Menggunakan storage untuk menyimpan file, dan menghasilkan nama file unik
            $image = $request->file('image');

            // Menyimpan file ke direktori yang sesuai menggunakan Laravel Storage
            $imageFileName = ImageHelper::uploadImage($image);

            if (!$imageFileName) {
                return redirect()->route('header.index')->with('error', 'Gagal Simpan Gambar');
            } else {
                // Membuat dan menyimpan instance Header ke dalam database
                $simpanData = Header::create([
                    'name' => $request->input('name'),
                    'as' => $request->input('as'),
                    'email' => $request->input('email'),
                    'image' => $imageFileName,
                ]);

                if (!$simpanData) {
                    return redirect()->route('header.index')->with('error', 'Terjadi Kesalahan Pada Sistem');
                }
            }


        });
        // Menggunakan redirect tanpa menyimpan variabel headers
        return redirect()->route('header.index')->with('success', 'Data Berhasil Disimpan');
    } catch (\Exception $e) {
        // Menangani kesalahan sistem
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
        // Validasi input
        $validator = Validator::make($request->all(), $request->rules());

        if ($validator->fails()) {
            return redirect()->route('header.edit', $header->id)->withErrors($validator)->withInput();
        }

        try {
            DB::transaction(function () use ($request, $header) {
                $image = $request->file('image');

                // Menghapus gambar lama jika ada gambar baru
                if ($image) {
                    ImageHelper::deleteImage('assets/images/' . $header->image);
                }

                // Menggunakan helper untuk mengunggah gambar
                $imageFileName = $image ? ImageHelper::uploadImage($image) : $header->image;

                // Memperbarui data Header
                $header->update([
                    'name' => $request->input('name'),
                    'as' => $request->input('as'),
                    'email' => $request->input('email'),
                    'image' => $imageFileName,
                    'is_active' => $request->input('is_active', 0),
                ]);
            });

            return redirect()->route('header.index')->with('success', 'Data Berhasil Diperbarui');
        } catch (\Exception $e) {
            return redirect()->route('header.edit', $header->id)->with('error', 'Terjadi Kesalahan Pada Sistem');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Header $header)
    {
        $deleteImage = ImageHelper::deleteImage('assets/images/' . $header->image);

        if ($deleteImage) {
            $header->delete();

            return redirect()->route('header.index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('header.index')->with('error', 'Data gagal dihapus');
        }

    }


    public function test()
    {
        return response()->json([

        ]);
    }


}
