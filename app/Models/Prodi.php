<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prodi extends Model
{
    use HasFactory, SoftDeletes;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    protected $fillable = [
        'nama', 'desc', 'kampus', 'id_kategori', 'jenjang', 'sibel', 'rate', 'dis', 'types', 'gambar', 'biaya',
    ];


    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['gambar'] = $this->gambar;
        return $toArray;
    }

    public function getGambarAttribute()
    {
        return url('') . Storage::url($this->attributes['gambar']);
    }
}