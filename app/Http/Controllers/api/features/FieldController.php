<?php

namespace App\Http\Controllers\api\features;

use App\Http\Controllers\Controller;
use App\Http\Resources\MetaResource;
use App\Models\JenisLahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FieldController extends Controller
{
    public function index()
    {
        $field = JenisLahan::latest()->paginate(5)->dot()->toArray();
        return new MetaResource(true, 'Berhasil menampilkan data jenis lahan', $field);
    }

    public function show($id)
    {
        $field = JenisLahan::find($id);
        if ($field) {
            return new MetaResource(true, 'Berhasil menampilkan data jenis lahan', $field);
        } else {
            return new MetaResource(false, 'Data jenis lahan tidak ditemukan', null);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis' => 'string|required',
            'desc' => 'string|required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $field = JenisLahan::create([
            'jenis' => $request->jenis,
            'desc' => $request->desc,
        ]);

        return new MetaResource(true, 'Berhasil menambahkan data jenis lahan', $field);
    }

    public function update(Request $request, $id)
    {
        $field = JenisLahan::find($id);
        if ($field) {
            $validator = Validator::make($request->all(), [
                'jenis' => 'string|required',
                'desc' => 'string|required',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $field->update([
                'jenis' => $request->jenis,
                'desc' => $request->desc,
            ]);

            return new MetaResource(true, 'Berhasil mengubah data jenis lahan', $field);
        } else {
            return new MetaResource(false, 'Data jenis lahan tidak ditemukan', null);
        }
    }

    public function destroy($id)
    {
        $field = JenisLahan::find($id);
        if ($field) {
            $field->delete();
            return new MetaResource(true, 'Berhasil menghapus data jenis lahan', null);
        } else {
            return new MetaResource(false, 'Data jenis lahan tidak ditemukan', null);
        }
    }
}
