<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'first_name', 'middle_initial', 'last_name', 'date_of_birth', 'address', 'mobile_number',
        'home_number', 'email', 'gender', 'initial_interview', 'exam_interview', 'final_interview', 'photo_dir'
    ];
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
        $imageType = $createApplicantRequest->get('gender') == 0 ? "applicants_picture/null/female-null.jpg" : "applicants_picture/null/male-null.jpg";

        $applicant = new Applicant();
        $applicant->title = strtoupper($createApplicantRequest->get('title'));
        $applicant->first_name = strtoupper($createApplicantRequest->get('first_name'));
        $applicant->middle_initial = strtoupper($createApplicantRequest->get('middle_initial'));
        $applicant->last_name = strtoupper($createApplicantRequest->get('last_name'));
        $applicant->address = strtoupper($createApplicantRequest->get('address'));
        $applicant->email = $createApplicantRequest->get('email');
        $applicant->gender = $createApplicantRequest->get('gender');
        $applicant->date_of_birth = $createApplicantRequest->get('date_of_birth');
        $applicant->address = strtoupper($createApplicantRequest->get('address'));
        $applicant->mobile_number = $createApplicantRequest->get('mobile_number');
        $applicant->home_number = $createApplicantRequest->get('home_number');
        $applicant->age = $applicant->getAge($createApplicantRequest->get('date_of_birth'));
        $applicant->initial_interview = 1;
        $applicant->exam_interview = 1;
        $applicant->final_interview = 1;
        $applicant->job_position = strtoupper($createApplicantRequest->get('job_position'));
        $applicant->expected_salary = strtoupper($createApplicantRequest->get('expected_salary'));
        $applicant->photo_dir = $imageType;
        $applicant->type_of_employment = strtoupper($createApplicantRequest->get('type_of_employment'));

        $applicant->save();

        return redirect()->back()->with('msg', 'Applicant ' . $applicant->fullName() . ' was successfully saved to Applicant List.');
    }

    public static function updateApplicant($updateApplicantRequest, $applicant)
    {
        if(!$updateApplicantRequest->hasFile('fileToUpload')) {
            $applicantPhotoLocation = $applicant->photo_dir;
        } else {
            $applicantPhoto = $updateApplicantRequest->file('fileToUpload');
            $applicantPhoto->move(public_path() . 'applicants_picture/', $applicantPhoto->getClientOriginalName());
            $applicantPhotoLocation = 'applicants_picture/'.$applicantPhoto->getClientOriginalName();
        }

        $app = new Applicant();
        Applicant::find($applicant->id)->update([
            'first_name' => strtoupper($updateApplicantRequest->get('first_name')),
            'middle_initial' => strtoupper($updateApplicantRequest->get('middle_initial')),
            'last_name' => strtoupper($updateApplicantRequest->get('last_name')),
            'address' => strtoupper($updateApplicantRequest->get('address')),
            'date_of_birth' => strtoupper($updateApplicantRequest->get('date_of_birth')),
            'age' => $app->getAge($updateApplicantRequest->get('date_of_birth')),
            'email' => $updateApplicantRequest->get('email'),
            'mobile_number' => $updateApplicantRequest->get('mobile_number'),
            'home_number' => $updateApplicantRequest->get('home_number'),
            'gender' => $updateApplicantRequest->get('gender'),
            // 'expected_salary' => str_replace(',', '', $updateApplicantRequest->get('expected_salary')),
            'title' => strtoupper($updateApplicantRequest->get('title')),
            // 'job_position' => strtoupper($updateApplicantRequest->get('job_position'))
            'photo_dir' => $applicantPhotoLocation
        ]);

        return redirect()->back()->with('msg', 'You have successfully updated "' . $applicant->fullName() . '" Information');
    }
}
