<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;

class ExamController extends Controller
{
   /**
   * Create a new controller instance.
   *
   * @return void
   */
   // public function __construct()
   // {
   //    $this->middleware('auth');
   // }

   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
      $exams = Exam::all();

      return view('admin.exam.index', compact('exams'));
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      //
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(Request $request)
   {
      //
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

   public function examGuard()
   {
      return view('admin.exam.guard');
   }

   public function applicantTakeExam(Exam $exam)
   {
      if($exam->category == "WEB-DEVELOPER") {
         return view('admin.exam.it', compact('exam'));
      } else if ($exam->category == "RECEPTIONIST") {
         return view('admin.exam.receptionist', compact('exam'));
      }
   }

   public function submitExam(Request $request, Exam $exam)
   {
      $submitExam = Exam::submitExam($request, $exam);

      return $submitExam;
   }

   public function submitReceptionistExam(Request $request, Exam $exam)
   {
      $submitReceptionistExam = Exam::submitReceptionistExam($request, $exam);

      return $submitReceptionistExam;
   }
}
