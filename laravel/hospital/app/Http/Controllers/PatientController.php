<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {			
		$patients=Patient::all();
        return view('patient.list')->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$data=$request->validate([
            'title' => '',
            'patient_name' => '',
            'patient_email' => '',
            'patient_phone' => '',
        ]);
    
        Patient::create($data);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return view('patient.list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(patient $patient)
    {
		return response()->json($patient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        /*$data=$request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
    
        $doctor->update($data);
    
        return redirect()->route('doctor.index')
                        ->with('success','doctor updated successfully');*/
		
		$data = Patient::update(
            ['id'=>$request->id],
            ['title'=>$request->title],
            ['patient_name'=>$request->patient_name],
            ['patient_email'=>$request->patient_email],
            ['patient_phone'=>$request->patient_phone],
        );

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(patient $patient)
    {
        $patient->delete();
        return response()->json('success');
    }
}
