<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';
    protected $guarded = ['id_pasien'];
    public function rm(): HasMany
    {
        return $this->hasMany(RM::class);
    }
    public function resep(): HasMany
    {
        return $this->hasMany(Resep::class);
    }
}
