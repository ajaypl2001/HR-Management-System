<?php

namespace App\Http\Controllers;

use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserFamilyInfo;
use Svg\Tag\Rect;
use App\Models\UserEducation;
use App\Models\UserExperience;

use Brian2694\Toastr\Facades\Toastr;

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


    public function saveEducation(Request $request)
    {
        
        DB::beginTransaction();

        try {
            foreach ($request->institution as $index => $institution) {
                UserEducation::create([
                    'user_id'     => $request->user_id,
                    'institution' => $institution,
                    'subject'     => $request->subject[$index] ?? null,
                    'start_date'  => $request->start_date[$index] ?? null,
                    'end_date'    => $request->end_date[$index] ?? null,
                    'degree'      => $request->degree[$index] ?? null,
                    'grade'       => $request->grade[$index] ?? null,
                ]);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Education details saved successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function editEducation(Request $request, $id)
    {
        $request->validate([
            'institution' => 'required|string|max:255',
            'subject' => 'nullable|string|max:255',
            'start_date' => 'nullable|string',
            'end_date' => 'nullable|string',
            'degree' => 'nullable|string|max:255',
            'grade' => 'nullable|string|max:255',
        ]);

        $education = UserEducation::findOrFail($id);
        $education->update($request->only(['institution', 'subject', 'start_date', 'end_date', 'degree', 'grade']));

        return back()->with('success', 'Education record updated successfully.');
    }


    public function saveExprience(Request $request)
    {
        $request->validate([
            'user_id'       => 'required',
            'company_name'  => 'required|array',
            'location'      => 'required|array',
            'job_position'  => 'required|array',
            'period_from'   => 'required|array',
            'period_to'     => 'required|array',
        ]);

        // Optional: clear old experiences before adding new ones
        // UserExperience::where('user_id', $request->user_id)->delete();

        foreach ($request->company_name as $index => $company) {
            if (!$company || !$request->job_position[$index]) {
                continue;
            }

            UserExperience::create([
                'user_id'       => $request->user_id,
                'company_name'  => $company,
                'location'      => $request->location[$index] ?? null,
                'job_position'  => $request->job_position[$index],
                'period_from'   => \Carbon\Carbon::createFromFormat('d-m-Y', $request->period_from[$index])->format('Y-m-d'),
                'period_to'     => \Carbon\Carbon::createFromFormat('d-m-Y', $request->period_to[$index])->format('Y-m-d'),
            ]);
        }

        return redirect()->back()->with('success', 'Experience details saved successfully!');
    }


}
