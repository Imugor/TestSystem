<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {     
        $user = new User();
        $user->name = 'Админ';
        $user->email = 'admin@mail.ru';
        $user->position = 'admin';
        $user->password = bcrypt('24132002');
        $user->save();
    }
}
