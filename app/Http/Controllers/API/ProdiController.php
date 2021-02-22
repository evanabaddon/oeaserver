<?php

namespace App\Http\Controllers\API;

use App\Models\Prodi;

use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class ProdiController extends Controller
{
    public function all(Request $request)
    {


        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $kategori = $request->input('kategori');
        $types = $request->input('types');


        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        $rate_from = $request->input('rate_from');
        $rate_to = $request->input('rate_to');

        if ($id) {
            $prodi = Prodi::with('kategori')->find($id);

            if ($prodi)
                return ResponseFormatter::success(
                    $prodi,
                    'Data prodi berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data prodi tidak ada',
                    404
                );
        }
        $prodi = Prodi::with('kategori',);

        if ($name)
            $prodi->where('nama', 'like', '%' . $name . '%');

        if ($kategori)
            $prodi->where('id_kategori', '=', $kategori);

        if ($types)
            $prodi->where('types', 'like', '%' . $types . '%');

        if ($price_from)
            $prodi->where('harga', '>=', $price_from);

        if ($price_to)
            $prodi->where('harga', '<=', $price_to);

        if ($rate_from)
            $prodi->where('harga', '>=', $rate_from);

        if ($rate_to)
            $prodi->where('harga', '<=', $rate_to);

        return ResponseFormatter::success(
            $prodi->paginate($limit),
            'Data list prodi berhasil diambil'
        );
    }
}