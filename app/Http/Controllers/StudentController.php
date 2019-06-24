<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function insert(Request $request){
    	$validatedData = $request->validate([
    		'first_name' => ['required', 'string'],
    		'last_name' => ['required', 'string'],
    		'address' => ['required', 'string'],
    		'dob' => ['required', 'string', 'date']
    	]);

    	$new_student = new Student();
    	$new_student->first_name = $request->input('first_name');
    	$new_student->last_name = $request->input('last_name');
    	$new_student->address = $request->input('address');
    	$new_student->dob = $request->input('dob');
    	$new_student->save();

    	return redirect()->back()->with('message', "Successfully Registered Student. Student's Admission Number is $new_student->id");
    }
}
