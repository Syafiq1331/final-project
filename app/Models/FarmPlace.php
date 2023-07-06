<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmPlace extends Model
{
    use HasFactory;

    protected $table = 'farm_place';

    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'deskripsi',
        'foto',
        'user_id',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
