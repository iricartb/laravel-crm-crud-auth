<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;

use App\Models\Student;

class StudentController extends Controller {
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
		$oStudents = Student::query()->orderBy('name', 'ASC')->orderBy('surnames', 'ASC')->paginate(3);
		
		return View::make('students.index')->with('students', $oStudents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return View::make('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $oRequest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $oRequest) {
        $oRules = array(
            'name'       => 'required|min:3|max:20',
			'surnames'   => 'required|min:6|max:40',
            'birthdate'  => 'required|date',
			'city'       => 'nullable|min:3|max:40',
			'school_id'  => 'nullable|numeric',
        );
		
        $oValidator = Validator::make($oRequest->all(), $oRules);

        if ($oValidator->fails()) {
            return Redirect::to('students/create')->withErrors($oValidator)->withInput();
        } else {
			$oStudent = new Student;
            $oStudent->name = $oRequest->get('name');
			$oStudent->surnames = $oRequest->get('surnames');
			$oStudent->birthdate = $oRequest->get('birthdate');
			$oStudent->city = $oRequest->get('city');
            $oStudent->school_id = $oRequest->get('school_id');
			
            $oStudent->save();

            Session::flash('message', 'Student created successfully!');
			
            return Redirect::to('students');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $nId
     * @return \Illuminate\Http\Response
     */
    public function show($nId) {
        $oStudent = Student::find($nId);
	    
		if (!is_null($oStudent)) {
           return View::make('students.show')->with('student', $oStudent);		
		}
		else return Redirect::to('students');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $nId
     * @return \Illuminate\Http\Response
     */
    public function edit($nId) {
        $oStudent = Student::find($nId);
	    
		if (!is_null($oStudent)) {
           return View::make('students.edit')->with('student', $oStudent);		
		}
		else return Redirect::to('students');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $oRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $oRequest, $nId) {
		
        $oRules = array(
            'name'       => 'required|min:3|max:20',
			'surnames'   => 'required|min:6|max:40',
            'birthdate'  => 'required|date',
			'city'       => 'nullable|min:3|max:40',
			'school_id'  => 'nullable|numeric',
        );
		
        $oValidator = Validator::make($oRequest->all(), $oRules);

        if ($oValidator->fails()) {
            return Redirect::to('students/' . $nId . '/edit')->withErrors($oValidator)->withInput();
        } else {
			$oStudent = Student::find($nId);
				
		    if (!is_null($oStudent)) {
                $oStudent->name = $oRequest->get('name');
			    $oStudent->surnames = $oRequest->get('surnames');
			    $oStudent->birthdate = $oRequest->get('birthdate');
			    $oStudent->city = $oRequest->get('city');
			    $oStudent->school_id = $oRequest->get('school_id');
				
                $oStudent->save();

                Session::flash('message', 'Student updated successfully!');
		    }
		    
			return Redirect::to('students');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nId
     * @return \Illuminate\Http\Response
     */
    public function destroy($nId) {
        $oStudent = Student::find($nId);
	    
		if (!is_null($oStudent)) {
		   $oStudent->delete();
           
           Session::flash('message', 'Student deleted successfully!');		   
		}
		
		return Redirect::to('students');
    }
}