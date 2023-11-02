<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $guarded = [];

    public function getTimeAgoAttribute()
    {
        $now = Carbon::now();
        $postTime = $this->updated_at;

        return $postTime->diffForHumans($now);
    }
}
