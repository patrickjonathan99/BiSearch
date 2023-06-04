<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function comment() {
        return $this->hasMany(Comment::class);
    }

    public function lecturer() {
        return $this->belongsTo(Lecturer::class);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
