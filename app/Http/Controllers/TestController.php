<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\MyTest;
use App\Models\MyTestAnswer;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function newMyTestWithTimer($id) {
        $user_id = Auth::user()->id;
        $myTest = MyTest::where('id', $id)->first();

        $myTestAnswer = new MyTestAnswer();
        $myTestAnswer->user_id = $user_id;
        $myTestAnswer->my_test_id = $myTest->id;
        $myTestAnswer->status = 'new';
        $myTestAnswer->save();

        return redirect()->route('testWithTimer', ['id' => $myTestAnswer->id]);

    }

    public function newMyTestWithoutTimer($id) {
        $user_id = Auth::user()->id;
        $myTest = MyTest::where('id', $id)->first();

        $myTestAnswer = new MyTestAnswer();
        $myTestAnswer->user_id = $user_id;
        $myTestAnswer->my_test_id = $myTest->id;
        $myTestAnswer->status = 'new';
        $myTestAnswer->save();

        return redirect()->route('testWithoutTimer', ['id' => $myTestAnswer->id]);

    }

    public function myTestWithTimer($id) {
        $test = MyTestAnswer::where('id', $id)->with('myTest')->first();

        if (($test->user_id ?? null) != Auth::user()->id || //Проверка что тест является активного пользователя
            new DateTime($test->myTest->date_end) < new DateTime(date('Y-m-d H:i:s')) || //Проверка на окончание даты
            $test->status != 'new') { //Проверка что тест не был решен
            return redirect()->route('account_profile');
        }

        return view('test', [
            'test' => $test,
            'withTimer' => true,
        ]);
    }

    public function myTestWithoutTimer($id) {
        $test = MyTestAnswer::where('id', $id)->with('myTest')->first();
        if (($test->user_id ?? null) != Auth::user()->id || //Проверка что тест является активного пользователя
            new DateTime($test->myTest->date_end) < new DateTime(date('Y-m-d H:i:s')) || //Проверка на окончание даты
            $test->status != 'new') { //Проверка что тест не был решен
            return redirect()->route('account_profile');
        }

        return view('test', [
            'test' => $test,
            'withTimer' => false,
        ]);
    }

    public function completeTest($id) {
        $random_status = [
            0 => 'passed',
            1 => 'failed',
        ];
        $test = MyTestAnswer::where('id', $id)->with('myTest')->first();
        $test->status = $random_status[random_int(0, 1)];
        $test->save();

        return redirect()->route('account_tests', ['category' => $test->myTest->test->category_id]);
    }

    public function result($id) {
        $test = MyTestAnswer::where('id', $id)->with('myTest')->first();

        return view('result', [
            'test' => $test,
        ]);
    }
}
