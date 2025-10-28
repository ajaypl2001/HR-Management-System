<?php

namespace App\Http\Controllers;

use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserFamilyInfo;
use Toastr;

class PersonalInformationController extends Controller
{
    /** Save Record */
    public function saveRecord(Request $request)
    {
        $request->validate([
            'passport_no'          => 'required|string|max:255',
            'passport_expiry_date' => 'required|string|max:255',
            'tel'                  => 'required|string|max:255',
            'nationality'          => 'required|string|max:255',
            'religion'             => 'required|string|max:255',
            'marital_status'       => 'required|string|max:255',
            'employment_of_spouse' => 'required|string|max:255',
            'children'             => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {

            $user_information = PersonalInformation::firstOrNew(
                ['user_id' =>  $request->user_id],
            );
            $user_information->user_id              = $request->user_id;
            $user_information->passport_no          = $request->passport_no;
            $user_information->passport_expiry_date = $request->passport_expiry_date;
            $user_information->tel                  = $request->tel;
            $user_information->nationality          = $request->nationality;
            $user_information->religion             = $request->religion;
            $user_information->marital_status       = $request->marital_status;
            $user_information->employment_of_spouse = $request->employment_of_spouse;
            $user_information->children             = $request->children;
            $user_information->save();

            DB::commit();
            flash()->success('Create personal information successfully :)');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            flash()->error('Add personal information fail :)');
            return redirect()->back();
        }
    }

    public function savefamilyRecord(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'name.*' => 'required',
            'relationship.*' => 'required',
            'dob.*' => 'required',
            'phone.*' => 'required',
        ]);

        DB::beginTransaction();

        try {
            foreach ($request->name as $index => $name) {
                UserFamilyInfo::create([
                    'user_id' => $request->user_id,
                    'name' => $name,
                    'relationship' => $request->relationship[$index],
                    'dob' => $request->dob[$index],
                    'phone' => $request->phone[$index],
                ]);
            }

            DB::commit();

            Toastr::success('Family information saved successfully!', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            Toastr::error('An error occurred while saving family information.', 'Error');
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function saveEditfamilyRecord(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'relationship' => 'required|string|max:255',
            'dob' => 'required|date',
            'phone' => 'required|string|max:15',
        ]);

        DB::beginTransaction();

        try {
            $family = UserFamilyInfo::findOrFail($id);

            $family->update([
                'name' => $request->name,
                'relationship' => $request->relationship,
                'dob' => $request->dob,
                'phone' => $request->phone,
            ]);

            DB::commit();

            Toastr::success('Family information updated successfully!', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            Toastr::error('An error occurred while updating family information.', 'Error');
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function deleteFamilyRecord($id)
    {
        try {
            $family = UserFamilyInfo::findOrFail($id);
            $family->delete();

            return response()->json(['success' => true, 'message' => 'Family record deleted successfully!']);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error deleting record.', 'error' => $e->getMessage()], 500);
        }
    }
}
