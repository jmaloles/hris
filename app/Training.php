<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    //
    protected $table = 'employee_training';
    protected $fillable = ['employee_id', 'title', 'lesson', 'status'];

    public function employee()
    {
    	return $this->belongsTo(Employee::class);
    }

    public function employee_topic_trainings()
    {
    	return $this->hasMany(EmployeeTopicTraining::class, 'employee_training_id');
    }

    public static function storeTrainingToEmployee($request, $employee)
    {
    	$employeeTraining = $employee->employee_training()->save(new Training([
    		'title' => str_slug($request->get('title'), '-'),
    		'lesson' => $request->get('lesson'),
    		'status' => 'ON-PROGRESS'
		]));

    	return redirect()->to('/user/employee/'.$employee->id.'/training/'.$employeeTraining->id);
    }
}
