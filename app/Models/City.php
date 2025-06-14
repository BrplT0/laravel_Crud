<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
