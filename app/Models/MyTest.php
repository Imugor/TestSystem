<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyTest extends Model
{
    use HasFactory;

    public function myTestAnswer(){
        return $this->hasMany(MyTestAnswer::class, "my_test_id", 'id');
    }

    public function test(){
        return $this->belongsTo(Test::class, 'test_id', 'id');
    }
}
