<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //
    protected $fillable = ['score', 'category', 'name', 'status'];

    public function applicant()
    {
    	return $this->belongsTo(Applicant::class);
    }

    public static function submitExam($request, $exam)
    {
    	$examinerScore = 0;

    	if($request->get('answer_1') == "b") {
    		$examinerScore += 1;
    	}

    	if($request->get('answer_2') == "d") {
			$examinerScore += 1;
    	}

    	if($request->get('answer_3') == "d") {
    		$examinerScore += 1;
    	}

    	if($request->get('answer_4') == "b") {
			$examinerScore += 1;
    	}

    	if($request->get('answer_5') == "b") {
    		$examinerScore += 1;
    	}

    	if($request->get('answer_6') == "b") {
    		$examinerScore += 1;
    	}

    	if($request->get('answer_7') == "a") {
    		$examinerScore += 1;
    	}

    	if($request->get('answer_8') == "b") {
    		$examinerScore += 1;
    	}

    	if($request->get('answer_9') == "c") {
    		$examinerScore += 1;
    	}

    	if($request->get('answer_10') == "a") {
    		$examinerScore += 1;
    	}

    	$exam->score = $examinerScore;
    	$exam->save();

    	return redirect()->route('welcome')->with('msg', 'You have successfully finished the exams. Thank you.');

    }

    public static function submitReceptionistExam($request, $exam)
    {
        $examinerScore = 0;

        if($request->get('answer_1') == "c") {
            $examinerScore += 1;
        }

        if($request->get('answer_2') == "b") {
            $examinerScore += 1;
        }

        if($request->get('answer_3') == "a") {
            $examinerScore += 1;
        }

        if($request->get('answer_4') == "d") {
            $examinerScore += 1;
        }

        if($request->get('answer_5') == "d") {
            $examinerScore += 1;
        }

        $exam->score = $examinerScore;
        $exam->save();

        return redirect()->route('welcome')->with('msg', 'You have successfully finished the exams. Thank you.');
    }
}
