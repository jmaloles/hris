<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Training;
use File;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
   /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct()
   {
      $this->middleware('auth');
   }

   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
      $training = Training::all();

      return view('admin.training.index', compact('training'));
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      // return view('admin.training.create');
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(Request $request)
   {
      $storeTraining = Training::storeTrainingToEmployee($request);

      return $storeTraining;
   }

   /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show($training)
   {

      $dir = $training->pathDir();
      $trainingModules = File::files($dir);
      $employees = Employee::all();

      //dd($trainingModules);

      return view('admin.training.show', compact('training', 'trainingModules', 'employees'));
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

   /**
   * Enroll Employee.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function enrollEmployee(Request $request, Training $training)
   {
      $enrollEmployee = Training::enrollEmployee($request, $training);

      return $enrollEmployee;
   }
}
