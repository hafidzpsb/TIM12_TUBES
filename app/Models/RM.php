<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RM extends Model
{
    use HasFactory;
    protected $fillable = ['tinggi_badan', 'berat_badan', 'tekanan_darah', 'detak_jantung', 'frekuensi_pernapasan', 'suhu', 'keluhan'];
    protected $primaryKey = 'id_rm';
    protected $table = 'rm';
}
