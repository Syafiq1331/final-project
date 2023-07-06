<?php

namespace App\Http\Controllers\api\features;

use App\Http\Controllers\Controller;
use App\Http\Resources\MetaResource;
use App\Models\JenisLahan;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::all();
        $field = JenisLahan::all();
        $resutl = [
            'user' => $user->count(),
            'field' => $field->count(),
        ];
        return new MetaResource(true, 'Berhasil menampilkan data lahan', $resutl);
    }
}
