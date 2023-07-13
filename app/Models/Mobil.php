<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'merek',
        'model',
        'nomor_plat',
        'tarif_sewa',
        'disewa'
    ];

    public function sewas()
    {
        return $this->hasMany(Sewa::class);
    }

    public function sedangDisewa()
    {
        return $this->sewas()->whereDate('tanggal_mulai', '<=', now())->whereDate('tanggal_selesai', '>=', now())->exists();
    }
}
