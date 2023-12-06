<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\MyTest;
use App\Models\MyTestAnswer;
use App\Models\Test;
use App\Models\TestCategory;
use App\Models\User;
use DateTime;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Иванов Игорь Сергеевич';
        $user->email = 'admin@mail.ru';
        $user->position = 'admin';
        $user->password = bcrypt('12345678');
        $user->save();

        $category1 = new TestCategory();
        $category1->name = 'Выпечка';
        $category1->save();

        $category2 = new TestCategory();
        $category2->name = 'Программирование';
        $category2->save();

        $category3 = new TestCategory();
        $category3->name = 'Фронтэнд';
        $category3->save();

        $category4 = new TestCategory();
        $category4->name = 'Бэкэнд';
        $category4->save();

        $category5 = new TestCategory();
        $category5->name = 'ООП';
        $category5->save();

        $test1 = new Test();
        $test1->user_id = $user->id;
        $test1->category_id = $category5->id;
        $test1->name = 'Принципы ООП';
        $test1->type = 'Тест';
        $test1->attempt_count = 2;
        $test1->time = random_int(1, 4)*5;
        $test1->description = 'Описание теста';
        $test1->save();

        $test2 = new Test();
        $test2->user_id = $user->id;
        $test2->category_id = $category1->id;
        $test2->name = 'Как приготовить панкейки';
        $test2->type = 'Тест';
        $test2->attempt_count = random_int(2, 3);
        $test2->time = random_int(1, 4)*5;
        $test2->description = 'Описание теста';
        $test2->save();

        $test3 = new Test();
        $test3->user_id = $user->id;
        $test3->category_id = $category1->id;
        $test3->name = 'Как приготовить печеньки';
        $test3->type = 'Тест';
        $test3->attempt_count = random_int(2, 3);
        $test3->time = random_int(1, 4)*5;
        $test3->description = 'Описание теста';
        $test3->save();

        $test4 = new Test();
        $test4->user_id = $user->id;
        $test4->category_id = $category1->id;
        $test4->name = 'Как приготовить пирог';
        $test4->type = 'Тест';
        $test4->attempt_count = random_int(2, 3);
        $test4->time = random_int(1, 4)*5;
        $test4->description = 'Описание теста';
        $test4->save();

        $test5 = new Test();
        $test5->user_id = $user->id;
        $test5->category_id = $category2->id;
        $test5->name = 'Как найти переменную';
        $test5->type = 'Тест';
        $test5->attempt_count = random_int(2, 3);
        $test5->time = random_int(1, 4)*5;
        $test5->description = 'Описание теста';
        $test5->save();

        $test6 = new Test();
        $test6->user_id = $user->id;
        $test6->category_id = $category2->id;
        $test6->name = 'Как найти логином';
        $test6->type = 'Тест';
        $test6->attempt_count = random_int(2, 3);
        $test6->time = random_int(1, 4)*5;
        $test6->description = 'Описание теста';
        $test6->save();

        $test7 = new Test();
        $test7->user_id = $user->id;
        $test7->category_id = $category3->id;
        $test7->name = 'Как сделать верстку';
        $test7->type = 'Тест';
        $test7->attempt_count = random_int(2, 3);
        $test7->time = random_int(1, 4)*5;
        $test7->description = 'Описание теста';
        $test7->save();

        $test8 = new Test();
        $test8->user_id = $user->id;
        $test8->category_id = $category3->id;
        $test8->name = 'Как подключить стили';
        $test8->type = 'Тест';
        $test8->attempt_count = random_int(2, 3);
        $test8->time = random_int(1, 4)*5;
        $test8->description = 'Описание теста';
        $test8->save();

        $test9 = new Test();
        $test9->user_id = $user->id;
        $test9->category_id = $category4->id;
        $test9->name = 'Как предотвратить sql инъекции';
        $test9->type = 'Тест';
        $test9->attempt_count = random_int(2, 3);
        $test9->time = random_int(1, 4)*5;
        $test9->description = 'Описание теста';
        $test9->save();

        $test10 = new Test();
        $test10->user_id = $user->id;
        $test10->category_id = $category4->id;
        $test10->name = 'Безопасность кода';
        $test10->type = 'Тест';
        $test10->attempt_count = random_int(2, 3);
        $test10->time = random_int(1, 4)*5;
        $test10->description = 'Описание теста';
        $test10->save();

        $myTest1 = new MyTest();
        $myTest1->test_id = $test1->id;
        $myTest1->user_id = $user->id;
        $myTest1->date_start = date('Y-m-d H:i:s');
        $myTest1->date_end = date('24-m-d H:i:s');
        $myTest1->save();

        $myTest2 = new MyTest();
        $myTest2->test_id = $test3->id;
        $myTest2->user_id = $user->id;
        $myTest2->date_start = date('Y-m-d H:i:s');
        $myTest2->date_end = date('24-m-d H:i:s');
        $myTest2->save();

        $myTest3 = new MyTest();
        $myTest3->test_id = $test4->id;
        $myTest3->user_id = $user->id;
        $myTest3->date_start = date('Y-m-d H:i:s');
        $myTest3->date_end = date('24-m-d H:i:s');
        $myTest3->save();

        $myTest4 = new MyTest();
        $myTest4->test_id = $test5->id;
        $myTest4->user_id = $user->id;
        $myTest4->date_start = date('Y-m-d H:i:s');
        $myTest4->date_end = date('24-m-d H:i:s');
        $myTest4->save();

        $myTest5 = new MyTest();
        $myTest5->test_id = $test6->id;
        $myTest5->user_id = $user->id;
        $myTest5->date_start = date('Y-m-d H:i:s');
        $myTest5->date_end = date('24-m-d H:i:s');
        $myTest5->save();

        $myTest6 = new MyTest();
        $myTest6->test_id = $test7->id;
        $myTest6->user_id = $user->id;
        $myTest6->date_start = date('Y-m-d H:i:s');
        $myTest6->date_end = date('24-m-d H:i:s');
        $myTest6->save();

        $myTest7 = new MyTest();
        $myTest7->test_id = $test8->id;
        $myTest7->user_id = $user->id;
        $myTest7->date_start = date('Y-m-d H:i:s');
        $myTest7->date_end = date('Y-m-d H:i:s');
        $myTest7->save();

        $myTest8 = new MyTest();
        $myTest8->test_id = $test9->id;
        $myTest8->user_id = $user->id;
        $myTest8->date_start = date('Y-m-d H:i:s');
        $myTest8->date_end = date('Y-m-d H:i:s');
        $myTest8->save();

        $myTest9 = new MyTest();
        $myTest9->test_id = $test10->id;
        $myTest9->user_id = $user->id;
        $myTest9->date_start = date('Y-m-d H:i:s');
        $myTest9->date_end = date('24-m-d H:i:s');
        $myTest9->save();

        $myTestAnswer = new MyTestAnswer();
        $myTestAnswer->my_test_id = $myTest1->id;
        $myTestAnswer->user_id = $user->id;
        $myTestAnswer->status = 'passed';
        $myTestAnswer->save();

        $myTestAnswer = new MyTestAnswer();
        $myTestAnswer->my_test_id = $myTest1->id;
        $myTestAnswer->user_id = $user->id;
        $myTestAnswer->status = 'failed';
        $myTestAnswer->save();

        $myTestAnswer = new MyTestAnswer();
        $myTestAnswer->my_test_id = $myTest2->id;
        $myTestAnswer->user_id = $user->id;
        $myTestAnswer->status = 'new';
        $myTestAnswer->save();

        $myTestAnswer = new MyTestAnswer();
        $myTestAnswer->my_test_id = $myTest3->id;
        $myTestAnswer->user_id = $user->id;
        $myTestAnswer->status = 'new';
        $myTestAnswer->save();

        $myTestAnswer = new MyTestAnswer();
        $myTestAnswer->my_test_id = $myTest4->id;
        $myTestAnswer->user_id = $user->id;
        $myTestAnswer->status = 'passed';
        $myTestAnswer->save();

        $myTestAnswer = new MyTestAnswer();
        $myTestAnswer->my_test_id = $myTest5->id;
        $myTestAnswer->user_id = $user->id;
        $myTestAnswer->status = 'new';
        $myTestAnswer->save();

        $myTestAnswer = new MyTestAnswer();
        $myTestAnswer->my_test_id = $myTest6->id;
        $myTestAnswer->user_id = $user->id;
        $myTestAnswer->status = 'new';
        $myTestAnswer->save();

        $myTestAnswer = new MyTestAnswer();
        $myTestAnswer->my_test_id = $myTest7->id;
        $myTestAnswer->user_id = $user->id;
        $myTestAnswer->status = 'failed';
        $myTestAnswer->save();

        $myTestAnswer = new MyTestAnswer();
        $myTestAnswer->my_test_id = $myTest7->id;
        $myTestAnswer->user_id = $user->id;
        $myTestAnswer->status = 'new';
        $myTestAnswer->save();

        $myTestAnswer = new MyTestAnswer();
        $myTestAnswer->my_test_id = $myTest8->id;
        $myTestAnswer->user_id = $user->id;
        $myTestAnswer->status = 'new';
        $myTestAnswer->save();


    }
}
