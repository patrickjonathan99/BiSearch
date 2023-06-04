<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'lecturers';

    protected $guarded = ['id'];

    public function post() {
        return $this->hasMany(Post::class);
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

    public function getGuard() {
        return 'lecturer';
    }
}
