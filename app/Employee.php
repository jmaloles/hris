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
        $employee->update([
            'sss' => $request->get('sss'),
            'philhealth' => $request->get('philhealth'),
            'pag_ibig' => $request->get('pag_ibig'),
            'salary' => $request->get('salary'),
            'email' => $request->get('email'),
            'department' => $request->get('department'),
            'tin' => $request->get('tin'),
            'nbi_clearance' => $request->get('nbi_clearance')
        ]);

        return redirect()->back()->with('msg', 'Employee "' . $employee->applicant->fullName(). '" Company Profile was successfully updated.');
    }
}
