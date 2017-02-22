<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacationLeave extends Model
{
    //
    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public static function adminFileVacationLeave($request, $employee)
    {
        $vacationLeaveRemaining = $employee->vl_remaining;
        $startDate = date('Y-m-d', strtotime($request->get('start_date')));
        $endDate = date('Y-m-d', strtotime($request->get('end_date')));

        $numberOfdaysLeave = date_diff(date_create($startDate), date_create($endDate));

        // dd($numberOfdaysLeave->days);

        if($numberOfdaysLeave->days <= $vacationLeaveRemaining) {
            $numberOfDaysTook = $vacationLeaveRemaining - $numberOfdaysLeave->days;

            $employee->update(['vl_remaining' => $numberOfDaysTook]);

            $vacationLeave = new VacationLeave();
            $vacationLeave->employee_id = $employee->id;
            $vacationLeave->reason = $request->get('reason');
            $vacationLeave->description = $request->get('description');
            $vacationLeave->start_date = $request->get('start_date');
            $vacationLeave->end_date = $request->get('end_date');
            $vacationLeave->status = 'ON-LEAVE';
            $vacationLeave->save();

            return redirect()->back()->with('msg', 'You have successfully file a Vacation Leave for Employee "' . $employee->applicant->fullName() . '"');
        }

        return redirect()->back()->with('msg', 'Not enough Leave Remaining for Vacation Leave');
    }
}
