<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model
{
    use SoftDeletes;
    //

    public function getAge($dob)
    {
        if(!empty($dob)){
            $birthdate = new \DateTime($dob);
            $today   = new \DateTime('today');
            $age = $birthdate->diff($today)->y;
            return $age;
        }else{
            return 0;
        }
    }

    public function initialInterviewStatus()
    {
        if($this->initial_interview == 0) {
            return "FAILED";
        } else if($this->initial_interview == 1) {
            return "PENDING";
        } else if ($this->initial_interview == 2) {
            return "PASSED";
        }
    }

    public function examInterviewStatus()
    {
        if($this->initial_interview == 0) {
            return "FAILED";
        } else if($this->initial_interview == 1) {
            return "PENDING";
        } else if ($this->initial_interview == 2) {
            return "PASSED";
        }
    }

    public function finalInterviewStatus()
    {
        if($this->initial_interview == 0) {
            return "FAILED";
        } else if($this->initial_interview == 1) {
            return "PENDING";
        } else if ($this->initial_interview == 2) {
            return "PASSED";
        }
    }

    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public static function storeApplicant($createApplicantRequest)
    {
        $applicant = new Applicant();
        $applicant->first_name = strtoupper($createApplicantRequest->get('first_name'));
        $applicant->address = strtoupper($createApplicantRequest->get('address'));
        $applicant->last_name = strtoupper($createApplicantRequest->get('last_name'));
        $applicant->email = $createApplicantRequest->get('email');
        $applicant->gender = $createApplicantRequest->get('gender');
        $applicant->date_of_birth = $createApplicantRequest->get('date_of_birth');
        $applicant->address = strtoupper($createApplicantRequest->get('address'));
        $applicant->mobile_number = $createApplicantRequest->get('mobile_number');
        $applicant->home_number = $createApplicantRequest->get('home_number');
        $applicant->age = $applicant->getAge($createApplicantRequest->get('date_of_birth'));
        $applicant->initial_interview = 0;
        $applicant->exam_interview = 0;
        $applicant->final_interview = 0;

        $applicant->save();

        return redirect()->back()->with('msg', 'Applicant ' . $applicant->fullName() . ' was successfully saved to Applicant List.');
    }
}
