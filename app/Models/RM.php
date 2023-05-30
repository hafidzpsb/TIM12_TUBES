<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RM extends Model
{
    use HasFactory;
    protected $fillable = ['id_pasien', 'nama_pasien', 'tinggi_badan', 'berat_badan', 'tekanan_darah', 'detak_jantung', 'frekuensi_pernapasan', 'suhu', 'keluhan'];
    protected $primaryKey = 'id_rm';
    protected $table = 'rm';
    public function pasien_nama(): BelongsTo
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }
    public function konsultasi(): HasOne
    {
        return $this->belongsTo(Konsultasi::class, 'id_pasien', 'id_pasien');
    }
}
