<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;

use App\Models\School;

class SchoolController extends Controller {
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $oSchools = School::query()->orderBy('name', 'ASC')->paginate(3);
		
		return View::make('schools.index')->with('schools', $oSchools);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return View::make('schools.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $oRequest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $oRequest) {
		
        $oRules = array(
            'name'       => 'required|min:10|max:40',
			'address'    => 'required|min:10|max:60',
            'email'      => 'nullable|email|max:40',
			'phone'      => 'nullable|min:9|max:15',
            'web'        => 'nullable|min:10|max:40',
			'logo'       => 'nullable|image|dimensions:min_width=200,min_height=200|max:2048',
        );
		
        $oValidator = Validator::make($oRequest->all(), $oRules);

        if ($oValidator->fails()) {
            return Redirect::to('schools/create')->withErrors($oValidator)->withInput();
        } else {
            try {
			    $oSchool = new School;
                $oSchool->name = $oRequest->get('name');
			    $oSchool->address = $oRequest->get('address');
			    $oSchool->email = $oRequest->get('email');
			    $oSchool->phone = $oRequest->get('phone');
			    $oSchool->web = $oRequest->get('web');
			
                if ($oRequest->hasFile('logo')) {
                    $oImage = $oRequest->file('logo');
                    $sImageName = time() . '.' . $oImage->getClientOriginalExtension();
                    $oImage->move(public_path('/images/schools/'), $sImageName);
					
					$oSchool->logo = $sImageName;
				}
				
                $oSchool->save();

                Session::flash('message', 'School created successfully!');
			} catch(QueryException $oException) {
				return Redirect::to('schools/create')->withErrors('Duplicate entry fields Name and/or Address')->withInput();
			}
			
            return Redirect::to('schools');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $nId
     * @return \Illuminate\Http\Response
     */
    public function show($nId) {
        $oSchool = School::find($nId);
	    
		if (!is_null($oSchool)) {
           return View::make('schools.show')->with('school', $oSchool);		
		}
		else return Redirect::to('schools');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $nId
     * @return \Illuminate\Http\Response
     */
    public function edit($nId) {
        $oSchool = School::find($nId);
	    
		if (!is_null($oSchool)) {
           return View::make('schools.edit')->with('school', $oSchool);		
		}
		else return Redirect::to('schools');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $oRequest
     * @param  int  $nId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $oRequest, $nId) {
		
        $oRules = array(
            'name'       => 'required|min:10|max:40',
			'address'    => 'required|min:10|max:60',
            'email'      => 'nullable|email|max:40',
			'phone'      => 'nullable|min:9|max:15',
            'web'        => 'nullable|min:10|max:40',
			'logo'       => 'nullable|image|dimensions:min_width=200,min_height=200|max:2048',
        );
		
        $oValidator = Validator::make($oRequest->all(), $oRules);

        if ($oValidator->fails()) {
            return Redirect::to('schools/' . $nId . '/edit')->withErrors($oValidator)->withInput();
        } else {
            try {
			    $oSchool = School::find($nId);
				
				if (!is_null($oSchool)) {
                    $oSchool->name = $oRequest->get('name');
			        $oSchool->address = $oRequest->get('address');
			        $oSchool->email = $oRequest->get('email');
			        $oSchool->phone = $oRequest->get('phone');
		 	        $oSchool->web = $oRequest->get('web');
			
                    if ($oRequest->hasFile('logo')) {
                        $oImage = $oRequest->file('logo');
                        $sImageName = time() . '.' . $oImage->getClientOriginalExtension();
                        $oImage->move(public_path('/images/schools/'), $sImageName);
					
					    $oSchool->logo = $sImageName;
				    }
				
                    $oSchool->save();

                    Session::flash('message', 'School updated successfully!');
		        }
		        else return Redirect::to('schools');
			} catch(QueryException $oException) {
				return Redirect::to('schools/' . $id . '/edit')->withErrors('Duplicate entry fields Name and/or Address')->withInput();
			}
			
            return Redirect::to('schools');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nId
     * @return \Illuminate\Http\Response
     */
    public function destroy($nId) {
        $oSchool = School::find($nId);
	    
		if (!is_null($oSchool)) {
		   $oSchool->delete();
           
           Session::flash('message', 'School deleted successfully!');		   
		}
		
		return Redirect::to('schools');
    }
}