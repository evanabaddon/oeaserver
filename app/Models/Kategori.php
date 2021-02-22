<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Prodi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    /**
     * Get all of the prodi for the Kategori
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prodi()
    {
        return $this->hasMany(Prodi::class, 'id_kategori');
    }


    protected $fillable = [
        'name', 'gambar',
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