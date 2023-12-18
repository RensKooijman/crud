<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roster extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'start-time',
        'end-time',
        'subject',
        'klas_id',
    ];
    public function klas()
    {
        return $this->belongsTo(klas::class);
    }
}
