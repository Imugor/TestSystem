<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'position',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function tests() {
        return $this->hasMany(Test::class, 'user_id', 'id');
    }

    public function getAllowCategoriesIds() {
        $tests = Test::where('user_id', $this->id)
                        ->whereDoesntHave('myTest', function ($query) {
                            $query->where('date_end', '<', now());
                        })
                        ->has('myTest')
                        ->with('myTest')
                        ->get();
        $categories_array = [];
        foreach ($tests as $item) {
            $categories_array[] = $item->category_id;
        }
        $categories_array = array_unique($categories_array);
        return $categories_array;
    }
}
