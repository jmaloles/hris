<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'sss', 'pag_ibig', 'philhealth', 'health_status', 'salary', 'email',
        'vl_remaining', 'sl_remaining', 'nbi_clearance', 'tin', 'department',
        'el_remaining', 'status'
    ];
    //
    public function vacation_leaves()
    {
        return $this->hasMany();
    }

    public function applicant()
    {
        return $this->hasOne(Applicant::class);
    }

    public function employee_trainings()
    {
        return $this->hasMany(Training::class);
    }

    public static function adminUpdateEmployeeLeave($request, $employee)
    {
        if((is_numeric($request->get('vl_remaining')) || (is_numeric($request->get('el_remaining'))) || (is_numeric($request->get('sl_remaining'))))) {
            $vlRemaining = $request->get('vl_remaining') != '' ?  $request->get('vl_remaining') : $employee->vl_remaining;
            $slRemaining = $request->get('sl_remaining') != '' ? $request->get('sl_remaining') : $employee->sl_remaining;
            $elRemaining = $request->get('el_remaining') != '' ? $request->get('el_remaining') : $employee->el_remaining;

            $employee->update([
                'vl_remaining' => $vlRemaining,
                'sl_remaining' => $slRemaining,
                'el_remaining' => $elRemaining
            ]);

            return redirect()->back()->with('msg', 'Leave Remaining was successfully updated.');
        }

        return redirect()->back()->with('msg', 'Provided leave settings is invalid. Must be numeric.');
    }

    public static function adminUpdateEmployeeInformation($request, $employee)
    {
        $applicant = Applicant::whereEmployeeId($employee->id)->first();

        if(!$request->hasFile('fileToUpload')) {
            $employeePhotoLocation = $applicant->photo_dir;
        } else {
            $employeePhotoLocation = $request->file('fileToUpload');
            $employeePhotoLocation->move(public_path() . '/applicants_picture/', $employeePhotoLocation->getClientOriginalName());
            $employeePhotoLocation = 'applicants_picture/'.$employeePhotoLocation->getClientOriginalName();
        }

        $applicant->photo_dir       = $employeePhotoLocation;
        $applicant->first_name      = $request->get('first_name');
        $applicant->middle_initial  = $request->get('middle_initial');
        $applicant->last_name       = $request->get('last_name');
        $applicant->date_of_birth   = $request->get('date_of_birth');
        $applicant->mobile_number   = $request->get('mobile_number');
        $applicant->home_number     = $request->get('home_number');
        $applicant->save();

        $employee->update([
            'sss'           => $request->get('sss'),
            'philhealth'    => $request->get('philhealth'),
            'pag_ibig'      => $request->get('pag_ibig'),
            'salary'        => $request->get('salary'),
            'email'         => $request->get('company_email'),
            'department'    => $request->get('department'),
            'tin'           => $request->get('tin'),
            'nbi_clearance' => $request->get('nbi_clearance')
        ]);

        return redirect()->back()->with('msg', 'Employee "' . $employee->applicant->fullName(). '" was successfully updated.');
    }
}
