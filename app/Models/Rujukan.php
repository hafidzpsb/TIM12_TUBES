<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rujukan extends Model
{
    use HasFactory;
    protected $fillable = ['id_pasien', 'id_konsul', 'no_surat_rujukan', 'tgl_masuk'];
    protected $primaryKey = 'id_rujuk';
    protected $table = 'rujukan';
    public function pasien_nama(): BelongsTo
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }
    public function konsultasi(): BelongsTo
    {
        return $this->belongsTo(Konsultasi::class, 'id_konsul', 'id_konsul');
    }
}
