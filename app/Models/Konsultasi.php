<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Konsultasi extends Model
{
    use HasFactory;
    protected $table = 'konsultasi';
    protected $primaryKey = 'id_konsul';
    protected $guarded = ['id_konsul'];
    public function pasien_nama(): BelongsTo
    {
        return $this->belongsTo(RM::class, 'id_pasien', 'id_pasien');
    }
}
