<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Operasi extends Model
{
    use HasFactory;
    protected $table = 'operasi';
    protected $primaryKey = 'id_operasi';
    protected $guarded = ['id_operasi'];
    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }
    public function konsultasi(): BelongsTo
    {
        return $this->belongsTo(Konsultasi::class, 'id_pasien', 'id_pasien');
    }
}
