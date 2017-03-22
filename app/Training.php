<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use File;

class Training extends Model
{
   //
   use SoftDeletes;

   protected $table = 'training';

   protected $fillable = ['name'];


   public function employees()
   {
      return $this->belongsToMany(Employee::class)->withPivot('status');
   }

   public function topics()
   {
      return $this->hasMany(Topic::class);
   }

   public function training_modules()
   {
      return $this->hasMany(TrainingModule::class);
   }

   public function trainingSlugName()
   {
      $tSlug = str_replace(" ", '-', $this->name);

      return $tSlug;
   }

   public function pathDir()
   {
      $trainingDirectory = storage_path('training_modules/') . $this->trainingSlugName();

      return $trainingDirectory;
   }

   public function getFileCountInsideDir()
   {
      $fileDir = File::files($this->pathDir());

      return count($fileDir);
   }

   public static function storeTrainingToEmployee($request)
   {
      $path = storage_path('training_modules/') . str_replace(" ", "-", ucwords(strtolower($request->get('name')), " "));
      // $file = $request->file('file_path');

      $training = new Training();
      $training->name = $request->get('name');

      if($training->save()) {
         $training->training_modules()->save(new TrainingModule([
            'path' => $path
         ]));

         File::makeDirectory($path);

         return redirect()->back()->with('msg', 'Training "'. ucwords($training->name, " ") .'" [Directory - ' . str_replace(" ", "-", ucwords(strtolower($request->get('name')), " ")) . '] Module was successfully created');
      }
   }

   public static function enrollEmployee($request, $training)
   {
      $employeeIds = $request->get('employee');

      $training->employees()->attach($employeeIds, ['status' => 'ON-PROGRESS']);

      return redirect()->back()->with('msg', 'Employees are successfully enrolled.');
   }
}
