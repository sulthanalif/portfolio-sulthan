<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;
use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portos = Portfolio::all();

        return view('admin.portfolio.index', ['portos' => $portos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePortfolioRequest $request)
    {
        $validator = Validator::make($request->all(), $request->rules());

        if ($validator->fails()) {
            return redirect()->route('portfolio.index')->with('error', 'Validasi Gagal');
        }

        try{
            DB::transaction(function () use ($request) {
                // Menggunakan storage untuk menyimpan file, dan menghasilkan nama file unik
                $image = $request->file('image');

                // Menyimpan file ke direktori yang sesuai menggunakan Laravel Storage
                $imageFileName = ImageHelper::uploadImage($image);

                if (!$imageFileName) {
                    return redirect()->route('portfolio.index')->with('error', 'Gagal Simpan Gambar');
                } else {
                    // Membuat dan menyimpan instance portfolio ke dalam database
                    $simpanData = Portfolio::create([
                        'title' => $request->input('title'),
                        'description' => $request->input('description'),
                        // 'email' => $request->input('email'),
                        'image' => $imageFileName,
                    ]);

                    if (!$simpanData) {
                        return redirect()->route('portfolio.index')->with('error', 'Terjadi Kesalahan Pada Sistem');
                    }
                }
            });
            // Menggunakan redirect tanpa menyimpan variabel portfolios
            return redirect()->route('portfolio.index')->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $e) {
            // Menangani kesalahan sistem
            return redirect()->route('portfolio.index')->with('error', 'Terjadi Kesalahan Pada Sistem');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        //
    }
}
