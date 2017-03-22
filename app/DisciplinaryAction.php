<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DisciplinaryAction extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function disciplinaryActionTemplate()
    {
    	return $this->hasOne(DisciplinaryActionTemplate::class);
    }

    public static function storeDisciplinaryAction($request)
    {
    	$disciplinaryAction = new DisciplinaryAction();
    	$disciplinaryAction->name = strtolower(str_slug($request->get('description'), '-'));
    	$disciplinaryAction->description = strtoupper($request->get('description'));
    	$disciplinaryAction->days_before_refresh = $request->get('days_before_refresh') == '' ? 60 : $request->get('days_before_refresh');
    	$disciplinaryAction->save();

    	$disciplinaryAction->disciplinaryActionTemplate()->save(new DisciplinaryActionTemplate([
    		'sender' => $request->get('sender') == '' ? Auth::user()->name : $request->get('sender'),
    		'topic' => $request->get('topic') == '' ? $disciplinaryAction->description : $request->get('topic'),
    		'content' => $request->get('content')
		]));

		return redirect()->back()->with('msg', 'You have successfully created "' . $disciplinaryAction->description.'"');
    }
}
