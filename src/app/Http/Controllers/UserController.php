<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
// use Illuminate\Http\Request;


class UserController extends Controller
{

   public function index() {

    print_r(route('users'));

    // users.index would mean have a "views/users/index.blade.php"
    return view('user.index');

   }


    /**
     * Show the profile for a given user.
     */
    public function show(string $id): View
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }
}
