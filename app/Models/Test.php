<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    public function myTest(){
        return $this->hasMany(MyTest::class, 'test_id', 'id')->with('myTestAnswer');
    }
}
