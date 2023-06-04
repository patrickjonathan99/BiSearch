<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'students';

    protected $guarded = ['id'];

    public function comment() {
        return $this->hasMany(Comment::class);
    }

    public function getAuthIdentifier() {
        return $this->getKey();
    }

    public function getAuthPassword() {
        return $this->password;
    }

    public function getAuthIdentifierName() {
        return 'id';
    }

    public function getRememberToken() {
        return null;
    }

    public function setRememberToken($value) {

    }

    public function getRememberTokenName() {
        return 'remember_token';
    }
}
