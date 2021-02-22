<?php

namespace App\Http\Controllers\API;

use App\Models\Prodi;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    //
    public function all(Request $request)
    {
        $limit = $request->input('limit', 6);
        $id = $request->input('id');
        if ($id) {
            $kategori = Kategori::find($id);

            if ($kategori)
                return ResponseFormatter::success(
                    $kategori,
                    'Data kategori berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data kategori tidak ada',
                    404
                );
        }
        $kategori = Kategori::query();
        return ResponseFormatter::success(
            $kategori->paginate($limit),
            'Data list kategori berhasil diambil'
        );
    }
}