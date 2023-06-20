<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MacroAutomation extends Model
{
    use HasFactory;

    protected $table = 'macro_automation';

    protected $fillable = [
        'id',
        'name',
        'desc',
        'img',
        'farmPlace_id',
    ];

    public function farmPlace()
    {
        return $this->belongsTo(Lahan::class);
    }
}
