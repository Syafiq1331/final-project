<?php

namespace App\Http\Controllers\api\features;

use App\Http\Controllers\Controller;
use App\Http\Resources\LahanResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return response()->json([
            'success' => true,
            'message' => 'Berhasil menampilkan data profile',
            'data' => $user
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required',
            'email' => 'string|required|unique:users,email',
            'password' => 'string|required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'farm_place_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $image = $request->file('image');
        $image->storeAs('public/profileImages', $image->hashName());

        // convert string to int
        $farmPlaceId = intval($request->farm_place_id);

        $profile = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $image->hashName(),
            'role' => 'user',
            'farm_place_id' => $farmPlaceId,
            'password' => bcrypt($request->password),
        ]);

        return new LahanResource(true, 'Berhasil menambahkan data lahan', $profile);
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required',
            'email' => 'string|required|unique:users,email,' . $id,
            'password' => 'string|required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'farm_place_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $profile = User::find($id);

        if ($profile) {
            // Delete image
            Storage::delete('public/profileImages/' . basename($profile->image));

            $image = $request->file('image');
            $image->storeAs('public/profileImages', $image->hashName());

            // convert string to int
            $farmPlaceId = intval($request->farm_place_id);

            $profile->update([
                'name' => $request->name,
                'email' => $request->email,
                'image' => $image->hashName(),
                'role' => 'user',
                'farm_place_id' => $farmPlaceId,
                'password' => bcrypt($request->password),
            ]);
        } else {
            $profile->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => 'user',
                'farm_place_id' => $request->farm_place_id,
                'password' => bcrypt($request->password),
            ]);
        }

        return new LahanResource(true, 'Berhasil mengubah data profile', $profile);
    }

    public function destroy(string $id)
    {
        $profile = User::find($id);
        if ($profile) {
            // Delete image
            Storage::delete('public/profileImages/' . basename($profile->image));

            $profile->delete();
            return new LahanResource(true, 'Berhasil menghapus data profile', null);
        } else {
            return new LahanResource(false, 'Data profile tidak ditemukan', null);
        }
    }
}
