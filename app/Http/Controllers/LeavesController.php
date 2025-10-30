<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveInformation;
use App\Models\LeavesAdmin;
use App\Models\Leave;
use DateTime;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LeavesController extends Controller
{
    public function leavesAdmin()
    {
        $userList = DB::table('users')->get();
        $leaveInformation = LeaveInformation::all();
        $getLeave = Leave::all();
        return view('employees.leaves_manage.leavesadmin',compact('leaveInformation','userList','getLeave'));
    }

    public function getInformationLeave(Request $request)
    {
        try {

            $numberOfDay = $request->number_of_day;
            $leaveType   = $request->leave_type;
            $leaveDay = LeaveInformation::where('leave_type', $leaveType)->first();
            
            if ($leaveDay) {
                $days = $leaveDay->leave_days - ($numberOfDay ?? 0);
            } else {
                $days = 0; 
            }

            $data = [
                'response_code' => 200,
                'status'        => 'success',
                'message'       => 'Get success',
                'leave_type'    => $days,
                'number_of_day' => $numberOfDay,
            ];
            
            return response()->json($data);

        } catch (\Exception $e) {
            
            \Log::error($e->getMessage());
            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }

    public function saveRecordLeave(Request $request)
    {
      
        $leave = new Leave();
        return $leave->applyLeave($request);
    }

    public function deleteLeave(Request $request)
    {
        $leave = Leave::find($request->id);

        if (!$leave) {
            return back()->with('error', 'Leave record not found.');
        }

        $leave->delete();

        return back()->with('success', 'Leave record deleted successfully.');
    }

    public function leaveSettings()
    {
        return view('employees.leaves_manage.leavesettings');
    }

    public function attendanceIndex()
    {
        return view('employees.attendance');
    }

    public function AttendanceEmployee()
    {
        return view('employees.attendanceemployee');
    }

    public function leavesEmployee()
    {
        $leaveInformation = LeaveInformation::all();
        $getLeave = Leave::where('staff_id', Session::get('user_id'))->get();

        return view('employees.leaves_manage.leavesemployee',compact('leaveInformation', 'getLeave'));
    }

    public function shiftScheduLing()
    {
        return view('employees.shiftscheduling');
    }

    public function shiftList()
    {
        return view('employees.shiftlist');
    }

    public function approveleave(Request $request)
    {
        $leave = Leave::find($request->id);

        if (!$leave) {
            return response()->json(['success' => false, 'message' => 'Leave not found.'], 404);
        }

        $leave->status = 'Approved';
        $leave->save();

        return response()->json(['success' => true, 'message' => 'Leave approved successfully.']);
    }


    public function update(Request $request)
    {
        $leave = Leave::find($request->id);

        if ($leave) {
            $leave->update([
                'date_from' => $request->date_from,
                'date_to' => $request->date_to,
                'number_of_day' => $request->number_of_day,
                'leave_day' => $request->leave_day,
                'reason' => $request->reason,
            ]);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
