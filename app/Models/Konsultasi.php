<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Konsultasi extends Model
{
    use HasFactory;
    protected $table = 'konsultasi';
    protected $primaryKey = 'id_konsul';
    protected $guarded = ['id_konsul'];
    public function rm(): BelongsTo
    {
        return $this->belongsTo(RM::class, 'id_pasien', 'id_pasien');
    }
    public function resep(): HasOne
    {
        return $this->hasOne(Resep::class);
    }
    public function rujukan(): HasOne
    {
        return $this->hasOne(Rujukan::class);
    }
    public function operasi(): HasOne
    {
        return $this->hasOne(Operasi::class);
    }
}
