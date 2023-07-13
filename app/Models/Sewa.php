<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_mulai',
        'tanggal_selesai',
        'mobil_id',
    ];
    
    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }
}
