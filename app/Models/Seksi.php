<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seksi extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bagian(){
        return $this->belongsTo(Bagian::class);
    }
}
