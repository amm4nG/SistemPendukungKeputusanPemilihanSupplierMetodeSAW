<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Error;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return view('admin.barang.barang', compact(['barang']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'namaBarang' => ['required', 'unique:barang,namaBarang'],
            ],
            [
                'namaBarang.required' => 'Gagal melakukan penambahan, Nama barang tidak boleh kosong',
                'namaBarang.unique' => "<b>$request->namaBarang</b>" . ' sudah ada didalam daftar barang',
            ],
        );

        try {
            // add new barang
            $barang = new Barang();
            $barang->namaBarang = $request->namaBarang;
            $barang->save();

            return back()->with([
                'message' => "<b>$request->namaBarang</b>" . ' berhasil ditambahkan',
            ]);
        } catch (\Throwable $th) {
            return $this->error();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'namaBarangUpdate' => ['required', 'unique:barang,namaBarang,' . $id],
            ],
            [
                'namaBarangUpdate.required' => 'Gagal melakukan perubahan, Nama barang tidak boleh kosong',
                'namaBarangUpdate.unique' =>
                    'Gagal melakukan perubahan, ' .
                    "<b>$request->namaBarangUpdate</b>" .
                    ' sudah ada
                didalam daftar barang',
            ],
        );

        try {
            $barang = Barang::find($id);
            $namaBarangOld = $barang->namaBarang;
            $barang->namaBarang = $request->namaBarangUpdate;
            $barang->update();

            return back()->with([
                'message' =>
                    "<b>$namaBarangOld</b>" .
                    ' berhasil dirubah menjadi
                ' .
                    "<b>$request->namaBarangUpdate</b>",
            ]);
        } catch (\Throwable $th) {
            return $this->error();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $barang = Barang::find($id);
            $namaBarang = $barang->namaBarang;
            $barang->delete();
            return back()->with([
                'message' => "<b>$namaBarang</b>" . ' berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            return $this->error();
        }
    }
}
