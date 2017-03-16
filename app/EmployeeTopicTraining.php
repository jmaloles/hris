<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeTopicTraining extends Model
{
    //
	protected $fillable = ['topic', 'status'];

    public function employee_training()
    {
    	return $this->belongsTo(Training::class);
    }

    public static function store($request, $training)
    {
    	$employee_topic_training = $training->employee_topic_trainings()->save(new EmployeeTopicTraining([
    		'topic' => $request->get('topic'),
    		'status' => 'ON-PROGRESS'
		]));

		return redirect()->back()->with('msg', "Topic was successfully Added.");
    }

    public static function updateStatus($employeeTopicTraining)
    {
    	$employeeTopicTraining->update(['status' => 'COMPLETED']);

    	return redirect()->back()->with('msg', 'Topic is already Completed');
    }
}
