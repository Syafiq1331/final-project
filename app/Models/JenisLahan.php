<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLahan extends Model
{
    use HasFactory;

    protected $table = 'jenis_lahan';

    protected $fillable = [
        'id',
        'jenis',
        'desc',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function lahan()
    {
        return $this->hasMany(Lahan::class);
    }
}
