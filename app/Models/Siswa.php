<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{

     use HasFactory;
    protected $table = 'siswas';

    protected $fillable = ['nama', 'nis', 'kelas', 'jenis_kelamin', 'alamat', 'image', 'created_at'];
}
