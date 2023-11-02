<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('admin.supplier.supplier', compact(['supplier']));
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
                'namaSupplier' => ['required', 'unique:Supplier,namaSupplier'],
            ],
            [
                'namaSupplier.required' => 'Gagal melakukan penambahan, Nama Supplier tidak boleh kosong',
                'namaSupplier.unique' => "<b>$request->namaSupplier</b>" . ' sudah ada didalam daftar supplier',
            ],
        );

        try {
            // add new Supplier
            $Supplier = new Supplier();
            $Supplier->namaSupplier = $request->namaSupplier;
            $Supplier->save();

            return back()->with([
                'message' => "<b>$request->namaSupplier</b>" . ' berhasil ditambahkan',
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
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'namaSupplierUpdate' => ['required', 'unique:supplier,namaSupplier,' . $id],
            ],
            [
                'namaSupplierUpdate.required' => 'Gagal melakukan perubahan, Nama Supplier tidak boleh kosong',
                'namaSupplierUpdate.unique' =>
                    'Gagal melakukan perubahan, ' .
                    "<b>$request->namaSupplierUpdate</b>" .
                    ' sudah ada
        didalam daftar Supplier',
            ],
        );

        try {
            $supplier = Supplier::find($id);
            $namaSupplierOld = $supplier->namaSupplier;
            $supplier->namaSupplier = $request->namaSupplierUpdate;
            $supplier->update();

            return back()->with([
                'message' =>
                    "<b>$namaSupplierOld</b>" .
                    ' berhasil dirubah menjadi
        ' .
                    "<b>$request->namaSupplierUpdate</b>",
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
            $supplier = Supplier::find($id);
            $namaSupplier = $supplier->namaSupplier;
            $supplier->delete();
            return back()->with([
                'message' => "<b>$namaSupplier</b>" . ' berhasil dihapus',
            ]);
        } catch (\Throwable $th) {
            return $this->error();
        }
    }
}
