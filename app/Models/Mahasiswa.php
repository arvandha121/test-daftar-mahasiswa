<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = "mahasiswa";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nis', 
        'nama', 
        'tanggal_lahir', 
        'jenis_kelamin', 
        'alamat', 
        'kota'
    ];
    public function getCountAttribute()
    {
        return self::where('kota', $this->kota)->count();
    }
}
