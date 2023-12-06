<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\TestCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function account_profile() {
        $user = auth()->user();
        return view('profile', [
            'user' => $user,
        ]);
    }

    public function account_tests() {
        $user = User::where('id', auth()->user()->id)->first();
        $categories_ids = $user->getAllowCategoriesIds();
        if (count($categories_ids) == 0) {
            return view('tests', ['tests' => []]);
        }
        if (!($_GET['category'] ?? null) || !in_array($_GET['category'] ?? null, $categories_ids)) {
            return redirect()->route('account_tests', ['category' => current($categories_ids)]);
        }
        $choose_category = TestCategory::where('id', $_GET['category'])->first();
        $categories_ids = array_diff($categories_ids, [$choose_category->id]);
        
        $categories = TestCategory::whereIn('id', $categories_ids)->take(3)->get();
        $categories_hiden = TestCategory::whereIn('id', $categories_ids)->get()->skip(3);

        $tests = Test::where('category_id', $choose_category->id)
                        ->where('user_id', $user->id)
                        ->whereDoesntHave('myTest', function ($query) {
                            $query->where('date_end', '<', now());
                        })
                        ->has('myTest')
                        ->with('myTest')
                        ->get();
        // dd($tests);
                
        return view('tests', [
            'user' => $user,
            'choose_category' => $choose_category,
            'categories' => $categories,
            'categories_hidden' => $categories_hiden,
            'tests' => $tests,
        ]);
    }

    public function account_archive() {
        $user = auth()->user();        
        $tests = Test::where('user_id', $user->id)
            ->whereDoesntHave('myTest', function ($query) {
                $query->where('date_end', '>=', now());
            })
            ->has('myTest')
            ->with('myTest')
            ->get();
        return view('archive', [
            'user' => $user,
            'tests' => $tests,
        ]);
    }

    public function reset_password(Request $req) {
        // dd($req);
        if(mb_strlen($req->password) < 8) {
            return back()->withErrors([
                'password' => 'Пароль должен быть более 8 символов',
            ]);
        }
        if ($req->password != $req->password_repeat) {
            return back()->withErrors([
                'password' => 'Пароли не совпадают',
            ]);
        }

        $user = User::where('id', Auth::user()->id)->first();
        $user->password = bcrypt($req->password);
        $user->save();

        return back()->with('password_success_reset', 'Пароль успешно изменен!');
    }
}
