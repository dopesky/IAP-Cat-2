<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Fees;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class FeesController extends Controller
{
    public function index(){
    	$students = Student::all()->toArray();
    	if($students){
    		return view('kevin mwenda/fees', compact('students'));
    	}else{
    		Session::flash('error', 'You Must Register A Student First Before Paying Fees.');
    		return redirect('/student');
    	}
    }

    public function insert(Request $request){
    	$validatedData = $request->validate([
    		'student_id' => ['required', 'numeric'],
    		'amount' => ['required', 'numeric']
    	]);

    	$fees = new Fees();
    	$fees->student_id = $request->input('student_id');
    	$fees->amount = $request->input('amount');
    	$fees->save();

    	return redirect()->back()->with('message', 'Successfully Paid Fees.');
    }

    public function allFees(){
    	$students = Student::all()->toArray();
    	if($students){
    		$fees = DB::table('fees')->join('students', 'fees.student_id', '=', 'students.id')->select('*','fees.created_at')->get()->toArray();
    		if($fees){
    			return view('kevin mwenda/all_fees', compact('fees'));
    		}
    		Session::flash('error', 'You Must Pay Atleast 1 Fee to View That Page.');
    		return redirect('/fees');
    	}
		Session::flash('error', 'You Must Register A Student First Before Paying Fees.');
		return redirect('/student');
    }

    public function specificFees(Request $request){
    	$validatedData = $request->validate([
    		'student_id' => ['required', 'numeric']
    	]);
    	$fees = Student::find($validatedData['student_id']);
    	if($fees){
    		return view('kevin mwenda/specific_fees', compact('fees'));
    	}
		Session::flash('error', 'That Admission Number is Not Registered on the System.');
		return redirect('/');
    }
}
