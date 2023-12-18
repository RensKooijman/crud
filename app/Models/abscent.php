<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class abscent extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'roster_id',
    ];
    public function student()
    {
        return $this->belongsTo(student::class);
    }
    public function roster()
    {
        return $this->belongsTo(roster::class);
    }
}
