<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Requests\ProdiRequest;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $prodi = Prodi::with(['kategori'])->paginate(10);
        return view('prodi.index', [
            'prodi' => $prodi,

        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $kategori = Kategori::all();
        return view('prodi.create', [
            'kategori' => $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdiRequest $request)
    {
        //
        $data = $request->all();

        $data['gambar'] = $request->file('gambar')->store('assets/prodi', 'public');

        Prodi::create($data);

        return redirect()->route('prodi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Prodi $prodi)
    {
        //
        return view('prodi.detail', [
            'item' => $prodi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Prodi $prodi)
    {
        //
        $kategori = Kategori::all();
        return view('prodi.edit', [
            'item' => $prodi,
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prodi $prodi)
    {
        //
        $data = $request->all();
        if ($request->file('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('assets/prodi', 'public');
        }

        $prodi->update($data);

        return redirect()->route('prodi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prodi $prodi)
    {
        //
        $prodi->delete();
        return redirect()->route('prodi.index');
    }
}