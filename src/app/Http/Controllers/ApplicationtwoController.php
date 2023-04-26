<?php

namespace App\Http\Controllers;
use App\Models\Applicationtwo;
use Illuminate\Http\Request;
use App\Mail\TestEmail;
use Mail;

class ApplicationtwoController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $applicationtwos = Applicationtwo::orderBy('id','desc')->paginate(5);
        return view('applicationtwos.index', compact('applicationtwos'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('applicationtwos.create');
    }

    public function createtwo()
    {
        return view('applicationtwos.createtwo');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'creditscore' => 'required',
        ]);
        
        Applicationtwo::create($request->post());

        Mail::to($request->email)->send(new TestEmail($request->name, $request->creditscore));

        return redirect()->route('applicationtwos.index')->with('success','Application has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\applicationtwo  $applicationtwo
    * @return \Illuminate\Http\Response
    */
    public function show(Applicationtwo $applicationtwo)
    {
        return view('applicationtwos.show',compact('applicationtwo'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Applicationtwo  $applicationtwo
    * @return \Illuminate\Http\Response
    */
    public function edit(Applicationtwo $applicationtwo)
    {
        return view('applicationtwos.edit',compact('applicationtwo'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\applicationtwo  $applicationtwo
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Applicationtwo $applicationtwo)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'creditscore' => 'required',
        ]);
        
        $applicationtwo->fill($request->post())->save();

        return redirect()->route('applicationtwos.index')->with('success','Application Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Applicationtwo  $applicationtwo
    * @return \Illuminate\Http\Response
    */
    public function destroy(Applicationtwo $applicationtwo)
    {
        $applicationtwo->delete();
        return redirect()->route('applicationtwos.index')->with('success','Application has been deleted successfully');
    }
}
