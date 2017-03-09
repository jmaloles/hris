<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Memorandum extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function memorandum_template()
    {
    	return $this->hasOne(MemorandumTemplate::class);
    }

    public static function storeMemorandum($request)
    {
    	$memorandum = new Memorandum();
    	$memorandum->name = strtolower($request->get('description'));
    	$memorandum->description = $request->get('description');
    	$memorandum->days_before_refresh = $request->get('days_before_refresh');
    	$memorandum->save();

    	$memorandum->memorandum_template()->save(new MemorandumTemplate([
    		'sender' => $request->get('sender'),
    		'topic' => $request->get('topic'),
    		'content' => $request->get('content')
		]));

		return redirect()->back()->with('msg', 'You have successfully created "' . $memorandum->name . '" Memorandum');
    }
}
