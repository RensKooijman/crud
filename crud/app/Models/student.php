<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first-name',
        'last-name',
        'dob',
        'klas_id',
    ];
    public function klas()
    {
        return $this->belongsTo(klas::class);
    }
}
