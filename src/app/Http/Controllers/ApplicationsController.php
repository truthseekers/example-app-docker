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

    $applications = DB::select('select * from applications');

    return view('applications.index', [ "applications" => $applications]);
    // return view('applications.index', [ $applications]);

   }

   public function submitapplication(Request $request)
   {
    

    $currentApps = DB::select('select * from applications');

    // figure out model->save()
    DB::insert('insert into applications (id, name, email, creditscore) values (?, ?, ?, ?)', [count($currentApps) + 1, $request->name, $request->email, $request->creditscore]);


    Mail::to($request->email)->send(new TestEmail($request->name, $request->creditscore));

    return redirect('apply')->with('status', 'Your application has been submitted! Please check your email for results');
   }

}
