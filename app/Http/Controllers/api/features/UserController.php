<?php

namespace App\Http\Controllers\api\features;

use App\Http\Controllers\Controller;
use App\Http\Resources\MetaResource;
use App\Models\FarmPlace;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  public function index()
  {
    $user = User::with('farmPlace')->get();

    $turu = collect($user->toArray());

    return new MetaResource(true, 'Berhasil menampilkan data user', $turu);
  }

  public function show($id)
  {
    $user = User::with('farmPlace')->find($id);
    if ($user) {
      return new MetaResource(true, 'Berhasil menampilkan data user', $user);
    } else {
      return new MetaResource(false, 'Data user tidak ditemukan', null);
    }
  }

  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'string|required',
      'email' => 'string|required',
      'password' => 'string|required',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'farm_place_id' => 'required|integer',
      'role' => 'required|string',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 422);
    }

    $image = $request->file('image');
    $image->storeAs('public/userImages', $image->hashName());

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => $request->password,
      'image' => $image->hashName(),
      'farm_place_id' => $request->farm_place_id,
      'role' => $request->role,
    ]);

    return new MetaResource(true, 'Berhasil menambahkan data user', $user);
  }

  public function update(Request $request, $id)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'string|required',
      'email' => 'string|required',
      'password' => 'string|required',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'farm_place_id' => 'required|integer',
      'role' => 'required|string',
    ]);

    if ($validator->fails()) {
      return response()->json($validator->errors(), 422);
    }

    $user = User::find($id);

    if ($user->image) {
      Storage::delete('public/userImages/' . $user->image);
    }

    $image = $request->file('image');
    $image->storeAs('public/userImages', $image->hashName());

    $user->update([
      'name' => $request->name,
      'email' => $request->email,
      'password' => $request->password,
      'image' => $image->hashName(),
      'farm_place_id' => $request->farm_place_id,
      'role' => $request->role,
    ]);

    return new MetaResource(true, 'Berhasil mengubah data user', $user);
  }

  public function destroy($id)
  {
    $user = User::find($id);

    if ($user->image) {
      Storage::delete('public/userImages/' . $user->image);
    }

    $user->delete();

    return new MetaResource(true, 'Berhasil menghapus data user', null);
  }
}
