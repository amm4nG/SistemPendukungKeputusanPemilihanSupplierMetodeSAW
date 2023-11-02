<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function error()
    {
        return back()->withErrors([
            'message' => 'Terjadi kesalahan',
        ]);
    }

    public function errorJson()
    {
        return response()->json([
            'message' => 'Terjadi kesalahan',
        ]);
    }
}
