<?php

namespace App\Http\Controllers;

use App\Models\Star;
use Illuminate\Http\Request;

class StarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stars = Star::all();
        $json_stars = json_encode($stars);
        return view('stars.index',compact('stars','json_stars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'image' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png',
            'description' => 'required',
        ]);
        
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $fileName = uniqid().".".$extension;
        $file->storeAs('public/images',$fileName);

        $star = new Star([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'image' => $fileName,
            'description' => $request->description,
        ]);

        $star->save();
         
        return redirect()->route('stars.index')
                        ->with('success','Star created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Star $star)
    {
        return view('stars.show',compact('star'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Star $star)
    {
        return view('stars.edit',compact('star'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Star $star)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
            'description' => 'required',
        ]);
        
        if(!$request->has('images')){

            $star->update($request->only([
             'firstname',
             'lastname',
             'description'   
            ]));
        }
        else{

            $star->update($request->all());
        }
        
        return redirect()->route('stars.index')
                        ->with('success','Star updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Star $star)
    {
        $star->delete();
         
        return redirect()->route('stars.index')
                        ->with('success','Star deleted successfully');
    }
}
