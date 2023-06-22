<?php

namespace App\Http\Controllers;

use App\Models\JenisLahan;
use Illuminate\Http\Request;

class ManageFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fields = JenisLahan::all();
        return view('pages.ManageField.index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.ManageField.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis' => 'required|unique:jenis_lahan,jenis',
            'desc' => 'required',
        ]);

        JenisLahan::create([
            'jenis' => $request->jenis,
            'desc' => $request->desc,
        ]);

        return redirect()->route('field.index')->with('success', 'Berhasil menambahkan jenis lahan');
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
        $field = JenisLahan::findOrFail($id);
        return view('pages.ManageField.update', compact('field'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'jenis' => 'required|unique:jenis_lahan,jenis,' . $id,
            'desc' => 'required',
        ]);

        $fields = JenisLahan::findOrFail($id);
        $fields->update([
            'jenis' => $request->jenis,
            'desc' => $request->desc,
        ]);

        return redirect()->route('field.index')->with('success', 'Berhasil mengubah jenis lahan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fields = JenisLahan::findOrFail($id);
        $fields->delete();

        return redirect()->route('field.index')->with('success', 'Berhasil menghapus jenis lahan');
    }
}
