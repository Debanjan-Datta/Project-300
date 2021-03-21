<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reader;
use App\Models\Member;


class Readercontroller extends Controller
{
    public function index(){
        if (!(session()->has('Logged')))
        {
            return redirect('login')->with('fail', 'log in first');
        }
    	$Readers = Reader::latest()->paginate(5);
        
    	return view('readers.index', compact('Readers'));
    }

    public function create(){

    	return view('readers.create');
    }

    public function store(Request $request){
    	$request->validate([
    		'reader_id'=>'required',
    		'book_name' => 'required',
    		'writer_name'=>'required',
    		'issued_date'=>'required'
    	]);

    	Reader::create($request->all());

    	return redirect()->route('readers.index')->with('success', 'Entry Created Successfully!');
    }

    public function edit(Reader $reader){
        return view('readers.edit', compact('reader'));
    }


    public function update(Request $request, Reader $reader){
        $request->validate([
            'reader_id'=>'required',
            'book_name' => 'required',
            'writer_name'=>'required',
            'issued_date'=>'required'
        ]);

        
        $reader->update($request->all());

        return redirect()->route('readers.index')->with('success', 'Entry Updated Successflly!');
    }

    public function destroy(Reader $reader){

        $reader->delete();
        return redirect()->route('readers.index')->with('success', 'Entry Deleted Successflly!');
    }


    public function check(Request $request)
    {
        
        // Validate request
        $request->validate([
            'email' => 'required|email|max:69',
            'password' => 'required|min:4|max:25'
        ]);

        // If form validated successfully, then process login
        $member = Member::where('email', '=', $request->email)->first();
        if ($member)
        {
            if ($request->password == $member->password) 
            {
                $request->session()->put([
                        'Logged' => $member->id
                    ]);
                return redirect('/');
            } 
            else {
                return back()->with('fail', 'wrong password');
            }
        }
        else {
            return back()->with('fail', 'invalid email');
        }
    }

     function logView(){
        if ((session()->has('Logged')))
        {
            return redirect('/');
        }
        return view('login');
     }

     function logout()
    {
        if (session()->has('Logged')) {

            session()->pull('Logged');

            return redirect('login');
        }
    }

}
