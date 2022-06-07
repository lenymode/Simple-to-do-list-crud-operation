<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use DB;


class DataController extends Controller
{
 
    public function home()
   {
        $search = request()->data;

        if
        ($search !== "" || $search !== null){
            $data=Data::orderBy('is_confirmed')->where('data', 'LIKE', "%{$search}%") ->get();
        }

        else{
            $data=Data::orderBy('is_confirmed')->get();
        }
   
      
       return view('welcome',compact('data'));
   }
   


   public function store (Request $request)
   {
       $request->validate([

           'data'=>'required',
       ]);

       Data::create([

           'data'=>$request->data
       ]);

       return redirect()->route('home')
       ->with('success','Task has been added');
    }

    // boolean
    public function confirm (Data $data)
    {
    $data->update([
        'is_confirmed' => '1',
    ]);

    return redirect()->back()->with('msg','Task has been completed');
    }
  

// deletion
    public function cut (Data $data)
    {
    $data->delete();
    return redirect()->back()->with('msg','Task has been deleted');
    }


// update
    public function edit(Data $data)
    {  
        return view('edit',compact('data'));
    }


    public function update (Request $request,Data $data)
    {
        $request->validate([
            'data' => 'required',
            
        ]);

        $data->update($request->all());

        return redirect()->route('home')
            ->with('success','To-do updated successfully');
    }


    // searchbar-------------
    public function search(Request $request)
    {
      
       Data::query()
        ->where('data', 'LIKE', "%{$search}%") 
        ->get();
    }

}
