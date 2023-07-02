<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required',
            'farm_place_id' => 'required|integer',
        ]);

        // Jika validasi berhasil, maka buat user baru
        $validateData['password'] = bcrypt($request->password);
        $validateData['role'] = 'user';

        $user = User::create($validateData);

        // Buat token untuk user yang baru dibuat
        $success['token'] = $user->createToken('authToken')->plainTextToken;

        // Kirim response
        return response()->json([
            'success' => true,
            'message' => 'Berhasil register',
            'data' => $user,
            'access_token' => $success['token']
        ], 201);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            // Jika login berhasil, maka buat token baru untuk user yang login
            $user = Auth::user()->makeHidden(['jenisLahan_id', 'farm_place_id', 'created_at', 'updated_at', 'email_verified_at', 'role']);
            $success['Token'] = $user->createToken('authToken')->plainTextToken;

            // Gabungkan data user dengan token yang baru dibuat
            $data = [$user, ['access_token' => $success['Token']]];

            // Kirim response
            return response()->json([
                'success' => true,
                'message' => 'Berhasil login',
                'data' => $data,
            ], 200);
        } else {
            // Jika login gagal, maka kirim response
            return response()->json([
                'success' => false,
                'message' => 'Gagal login, silahkan cek email dan password anda',
            ], 401);
        }
    }
}
