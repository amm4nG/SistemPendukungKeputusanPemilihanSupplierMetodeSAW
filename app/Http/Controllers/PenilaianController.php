<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\NilaiKriteria;
use App\Models\NilaiSupplier;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::all();
        $kriteria = Kriteria::with('nilaiKriteria')->get();

        $nilaiSupplier = Supplier::with('nilaiSupplier')
            ->get()
            ->toArray();

        $dataSupplier = [];
        $dataPenilaian = [];
        for ($i = 0; $i < count($nilaiSupplier); $i++) {
            // echo '<br>' . $nilaiSupplier[$i]['namaSupplier'] . '<br>';
            // array_push($dataSupplier, [
            //     'namaSupplier' => $nilaiSupplier[$i]['namaSupplier'],
            // ]);
            for ($j = 0; $j < count($nilaiSupplier[$i]['nilai_supplier']); $j++) {
                $namaKriteria = Kriteria::find($nilaiSupplier[$i]['nilai_supplier'][$j]['idKriteria']);
                // echo $namaKriteria->namaKriteria . '<br>';
                $nilaiKriteria = NilaiKriteria::find($nilaiSupplier[$i]['nilai_supplier'][$j]['idNilaiKriteria']);
                // echo $nilaiKriteria->keterangan . '<br>';
                // echo $nilaiSupplier[$i]['nilai_supplier'][$j]['idKriteria'];
                array_push($dataSupplier, [
                    'idSupplier' => $nilaiSupplier[$i]['id'],
                    'namaSupplier' => $nilaiSupplier[$i]['namaSupplier'],
                ]);
                array_push($dataPenilaian, [
                    'idSupplier' => $nilaiSupplier[$i]['id'],
                    'namaKriteria' => $namaKriteria->namaKriteria,
                    'keterangan' => $nilaiKriteria->keterangan,
                ]);
            }
        }
        $dataSupplier = array_map('unserialize', array_unique(array_map('serialize', $dataSupplier)));
        
        // Mengembalikan array hasil
        $dataSupplier = array_values($dataSupplier);
        // dd($dataSupplier);
        return view('admin.penilaian.penilaian', compact(['dataSupplier', 'supplier', 'kriteria', 'dataPenilaian']));
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
        try {
            $count = NilaiSupplier::where('idSupplier', $request['idSupplier'])->first();
            $supplier = Supplier::find($request['idSupplier']);

            if (optional($count)->count() > 0) {
                return back()->with([
                    'message' => "<b>$supplier->namaSupplier</b>" . ' sebelumnya sudah diberikan penilaian',
                ]);
            } else {
                for ($i = 0; $i <= count($request->all()); $i++) {
                    $nilaiSupplier = new NilaiSupplier();
                    $nilaiSupplier->idSupplier = $request['idSupplier'];
                    $nilaiSupplier->idKriteria = $request['idKriteria'][$i];
                    $nilaiSupplier->idNilaiKriteria = $request['idNilaiKriteria'][$i];
                    $nilaiSupplier->save();
                }
                return back()->with([
                    'message' => "<b>$supplier->namaSupplier</b>" . ' berhasil diberikan penilaian',
                ]);
            }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
