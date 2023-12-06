<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyTestAnswer extends Model
{
    use HasFactory;

    public function myTest(){
        return $this->belongsTo(MyTest::class, 'my_test_id', 'id')->with('test');
    }
}
