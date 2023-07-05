<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lahan extends Model
{
    use HasFactory;

    protected $table = 'lahan';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
        'desc',
        'image',
        'plantTime',
        'harvestTime',
        'jenisLahan_id',
        'farm_place_id',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'jenisLahan_id',
        'farm_place_id',
        'created_at',
        'updated_at',
    ];

    protected $dateFormat = 'Y-m-d H:i:s';

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
