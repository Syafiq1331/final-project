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

    public function lahan()
    {
        return $this->hasMany(Lahan::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => asset("storage/lahanImage/'. $image"),
        );
    }
}
