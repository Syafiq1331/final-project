<?php

namespace App\Http\Controllers\api\features;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\MetaResource;
use App\Models\Lahan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class LahanController extends Controller
{
    public function index()
    {
        $lahan = Lahan::latest()->paginate(5);
        return new MetaResource(true, 'Berhasil menampilkan data lahan', $lahan);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required',
            'desc' => 'string|required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'plantTime' => 'required|date',
            'harvestTime' => 'required|date',
            'jenisLahan_id' => 'required|integer',
            'farm_place_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $image = $request->file('image');
        $image->storeAs('public/lahanImages', $image->hashName());

        $lahan = Lahan::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'image' => $image->hashName(),
            'plantTime' => $request->plantTime,
            'harvestTime' => $request->harvestTime,
            'jenisLahan_id' => $request->jenisLahan_id,
            'farm_place_id' => $request->farm_place_id,
        ]);

        return new MetaResource(true, 'Berhasil menambahkan data lahan', $lahan);
    }

    public function show($id)
    {
        $lahan = Lahan::find($id);
        if ($lahan) {
            return new MetaResource(true, 'Berhasil menampilkan data lahan', $lahan);
        } else {
            return new MetaResource(false, 'Data lahan tidak ditemukan', null);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|required',
            'desc' => 'string|required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'plantTime' => 'required|date',
            'harvestTime' => 'required|date',
            'jenisLahan_id' => 'required|integer',
            'farm_place_id' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $lahan = Lahan::find($id);

        if ($lahan) {
            $image = $request->file('image');
            $image->storeAs('public/lahanImages', $image->hashName());

            // Delete old image
            Storage::delete('public/lahanImages/' . basename($lahan->image));

            $lahan->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'image' => $image->hashName(),
                'plantTime' => $request->plantTime,
                'harvestTime' => $request->harvestTime,
                'jenisLahan_id' => $request->jenisLahan_id,
                'farm_place_id' => $request->farm_place_id,
            ]);
        } else {

            $lahan->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'plantTime' => $request->plantTime,
                'harvestTime' => $request->harvestTime,
                'jenisLahan_id' => $request->jenisLahan_id,
                'farm_place_id' => $request->farm_place_id,
            ]);
        }

        return new MetaResource(true, 'Berhasil mengubah data lahan', $lahan);
    }

    public function destroy($id)
    {
        $lahan = Lahan::find($id);
        if ($lahan) {
            // Delete image
            Storage::delete('public/lahanImages/' . basename($lahan->image));

            $lahan->delete();
            return new MetaResource(true, 'Berhasil menghapus data lahan', null);
        } else {
            return new MetaResource(false, 'Data lahan tidak ditemukan', null);
        }
    }
}
