<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Mail\TestEmail;
use Mail;

class ApplicationsController extends Controller
{
    
   public function index() {


    // $test_array = [
    //     'productOne' => 'iPhone',
    //     'productTwo' => 'Samsung'
    // ];

    // print_r($test_array);

    // DB::insert('insert into users (id, name, email) values (?, ?, ?)', [1, 'Marc', "Marc@hotmail.com"]);
    // DB::insert('insert into applications (id, name, email, creditscore) values (?, ?, ?, ?)', [2, 'Joe', "Joe@gmail.com", 682]);

    // $users = DB::select('select * from users');

    // print_r($users);


    $applications = DB::select('select * from applications');

    // print_r($applications);

    // print_r(route('applications'));
    
    // return view('products.index', [
    //     'data' => $data
    // ]);
    // print_r(count($applications));

    // users.index would mean have a "views/users/index.blade.php"
    return view('applications.index', [ "applications" => $applications]);
    // return view('applications.index', [ $applications]);

   }

   public function submitapplication(Request $request)
   {
    // die("did it work?");
    // $application = new Application;
    // $application->name = $request->name;
    // $application->email = $request->email;
    // $application->save();
    
    // was trying to use the count from sql but I forgot how. hacky solution just to prove I can do php for now.lol
    // $currentAppCount = DB::select('select Count(*) from applications');

    // print_r($currentAppCount[0]);
    // I know there's a way to get just the count
    $currentApps = DB::select('select * from applications');

    print_r($currentApps);
    print_r(count($currentApps));


    // I know I should probably be doing the model->save(); format but there's an error, and I don't know if I'm even going to get the opportunity to do the actual code challenge. so I'll figure that out later if I get to that point
    DB::insert('insert into applications (id, name, email, creditscore) values (?, ?, ?, ?)', [count($currentApps) + 1, $request->name, $request->email, $request->creditscore]);


    Mail::to($request->email)->send(new TestEmail($request->name, $request->creditscore));

    // Mail::send('apply',
    // [
    //     'name' => 'test name',
    //     'email' => 'email thing',
    //     'comment' => 'comment'
    // ],
    //     function ($message) {
    //         $message->from('john@truthseekers.io');
    //         $message->to('fastpenguin91@gmail.com', 'John test to')->subject("The subject thing");
    //     }
    // );



    // return "Done?";

    // return redirect('add-blog-post-form')->with('status', 'Blog Post Form Data Has Been inserted');
    return redirect('apply')->with('status', 'Your application has been submitted! Please check your email for results');
   }

}
