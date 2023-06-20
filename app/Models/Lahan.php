<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lahan extends Model
{
    use HasFactory;

    protected $table = 'lahan';

    protected $fillable = [
        'id',
        'nama',
        'luas',
        'alamat',
        'deskripsi',
        'foto',
        'farmPlace_id',
    ];

    public function farmPlace()
    {
        return $this->belongsTo(FarmPlace::class);
    }

    public function jenisLahan()
    {
        return $this->belongsTo(JenisLahan::class);
    }

    public function macroAutomation()
    {
        return $this->hasMany(MacroAutomation::class);
    }
}
