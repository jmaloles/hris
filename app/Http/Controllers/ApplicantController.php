<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Applicant;
use App\Http\Requests\CreateApplicantRequest;
use App\Exam;

class ApplicantController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicant::all();

        return view('admin.applicant.index', compact('applicants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applicant.registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CreateApplicantRequest $createApplicantRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CreateApplicantRequest $createApplicantRequest)
    {
        $storeApplicant = Applicant::storeApplicant($createApplicantRequest);

        return $storeApplicant;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function verifyApplicant(Request $request)
    {
        $examTaker = Exam::where('applicant_id', $request->get('applicant_id'))->where('status', 'ON-GOING')->first();

        if(count($examTaker) == 0) {
            return redirect()->back()->with('msg', 'Invalid Applicant ID');
        }

        return redirect()->route('exam_taker', $examTaker->id);
    }
}
