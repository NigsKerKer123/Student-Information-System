<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class gradeController extends Controller
{
    public function index(){
        try {
            // Retrieve all unique subjectids
            $subjects = Grade::select('subjectid', 'subjectname')
                         ->distinct()
                         ->get();

            $grade = Grade::all();
            
            return view("grade.index", compact('grade', 'subjects'));
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', 'An error occurred while fetching data.');
        }
    }

    public function grade(Request $request){
        try {
            // Iterate over each form submission
            foreach ($request->except('_token', '_method') as $fieldName => $studentId) {
                // Extract student ID from field name
                $studentId = substr($fieldName, strpos($fieldName, '_') + 1);
                
                // Extract subject ID and grade using student ID
                $subjectId = $request->input('subjectid_'.$studentId);
                $grade = $request->input('grade'.$studentId);

                // Handle the case when the value is "null"
                Grade::where('studentid', $studentId)
                        ->where('subjectid', $subjectId)
                        ->update(['grade' => $grade]);
            }
            // Redirect back with success message
            return redirect()->back()->with('success', 'Grades updated successfully');
        } catch (QueryException $exception) {
            // Handle exceptions
            return redirect()->back()->with('error', 'An error occurred while updating grades.');
        }
    }  

    public function remove(Request $request){
        return $request;
    }
}
