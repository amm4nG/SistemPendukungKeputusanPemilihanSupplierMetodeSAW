<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSupplier extends Model
{
    use HasFactory;
    protected $table = 'nilai_supplier';
    protected $guarded = [];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'idSupplier');
    }

    // public function kriteria()
    // {
    //     return $this->belongsTo(Kriteria::class, 'idKriteria');
    // }
}
