<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use App\Models\Grade;

class studentController extends Controller
{
    //* Get method
    public function index(){
        try {
            $student = Student::paginate(5);
            $subject = Subject::all();
            return view("student.index", compact('student', 'subject'));
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', 'An error occurred while fetching data.');
        }
    }
    
    //* Create student Method
    public function create(Request $request){
        // Check kung ang middleInitial is empty
        if ($request->input('middleInitial') === null || $request->input('middleInitial') === '') {
            return redirect()->back()->with('error', 'Please select middleInitial.');
        }else{
            //Epa uppercase
            $request->merge(['middleInitial' => strtoupper($request->input('middleInitial'))]);
        }

        // Check if gender is empty
        if ($request->input('gender') === null || $request->input('gender') === '') {
            return redirect()->back()->with('error', 'Please select gender.');
        }else{
            //Epa lowercase ang gender
            $request->merge(['gender' => strtolower($request->input('gender'))]);
        }

        // Check if gender is empty
        if ($request->input('schoolyear') === null || $request->input('schoolyear') === '') {
            return redirect()->back()->with('error', 'Please select school year.');
        }else{
            $request->merge(['schoolyear' => strtolower($request->input('schoolyear'))]);
        }
       
        
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'studentid' => [
                'required',
                'string',
                'max:255',
                Rule::unique('students', 'studentid'),
            ],
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'middleInitial' => 'nullable|string|max:1|regex:/^[A-Z]$/', //validates na ang middle inital kay A-Z rajud
            'gender' => 'string|in:male,female', //Validate na male og female rajud
            'age' => 'required|integer|min:1',
            'section' => 'required|string|max:255',
            'schoolyear' => 'string|in:1st year,2nd year,3rd year,4th year',
        ]);
    
        if ($validator->fails()) {
            // Check if the validation error is due to studentid uniqueness constraint
            if ($validator->errors()->has('studentid')) {
                return redirect()->back()->with('error', 'Student ID already exists.');
            }

            // Check if the validation error is due to invalid gender
            if ($validator->errors()->has('gender')) {
                return redirect()->back()->with('error', 'Invalid Gender.');
            }

            // Check if the validation error is due to invalid gender
            if ($validator->errors()->has('middleInitial')) {
                return redirect()->back()->with('error', 'Invalid middleInitial.');
            }
    
            // Redirect back with a general error message
            return redirect()->back()->with('error', 'Error creating student. Please try again.');
        }
    
        try {
            // Create a new student record in the database
            $student = Student::create([
                'studentid' => $request->input('studentid'),
                'lastname' => $request->input('lastname'),
                'firstname' => $request->input('firstname'),
                'middleInitial' => $request->input('middleInitial'),
                'gender' => $request->input('gender'),
                'age' => $request->input('age'),
                'section' => $request->input('section'),
                'schoolyear' => $request->input('schoolyear'),
            ]);
    
            // Redirect to the index page or any other relevant page
            return redirect()->back()->with('success', 'Student created successfully');
        } catch (QueryException $exception) {
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Error creating student. Please try again.');
        }
    }

    //*Edit Method Here
    public function edit(Request $request, $id){
        // Check if middleInitial is empty
        if ($request->input('middleInitial') === null || $request->input('middleInitial') === '') {
            return redirect()->back()->with('error', 'Please select middleInitial.');
        }else{
            //Epa uppercase
            $request->merge(['middleInitial' => strtoupper($request->input('middleInitial'))]);
        }

        // Check if gender is empty
        if ($request->input('gender') === null || $request->input('gender') === '') {
            return redirect()->back()->with('error', 'Please select gender.');
        }else{
            //Epa lowercase ang gender
            $request->merge(['gender' => strtolower($request->input('gender'))]);
        }

        // Check if gender is empty
        if ($request->input('schoolyear') === null || $request->input('schoolyear') === '') {
            return redirect()->back()->with('error', 'Please select school year.');
        }else{
            $request->merge(['schoolyear' => strtolower($request->input('schoolyear'))]);
        }

        // Find the student record
        $student = Student::where('studentid', $id)->firstOrFail();
    
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'studentid' => [
                'required',
                'string',
                'max:255',
                Rule::unique('students', 'studentid')->ignore($student->id),
            ],
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'middleInitial' => 'nullable|string|max:1|regex:/^[A-Z]$/',
            'gender' => 'required|string|in:male,female', 
            'age' => 'required|integer|min:1',
            'section' => 'required|string|max:255',
            'schoolyear' => 'required|string|in:1st year,2nd year,3rd year,4th year',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            // Check if the validation error is due to studentid uniqueness constraint
            if ($validator->errors()->has('studentid')) {
                return redirect()->back()->with('error', 'Student ID already exists.');
            }

            // Check if the validation error is due to invalid gender
            if ($validator->errors()->has('gender')) {
                return redirect()->back()->with('error', 'Invalid Gender.');
            }

            // Check if the validation error is due to invalid gender
            if ($validator->errors()->has('middleInitial')) {
                return redirect()->back()->with('error', 'Invalid middleInitial.');
            }
    
            // Redirect back with a general error message
            return redirect()->back()->with('error', 'Error updating student. Please try again.');
        }
    
        // Update the student record with validated data
        try {
        $student->update([
            'studentid' => $request->input('studentid'),
            'lastname' => $request->input('lastname'),
            'firstname' => $request->input('firstname'),
            'middleInitial' => $request->input('middleInitial'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'section' => $request->input('section'),
            'schoolyear' => $request->input('schoolyear'),
        ]);
        // Redirect with success message
        return redirect()->back()->with('success', 'Student record updated successfully!');
        } catch(QueryException $exception) {
            return redirect()->back()->with('error', 'Error updating student. Please try again.');
        }
    }

    //* Delete Method
    public function delete($id) {
        try {
            // Find the student record
            $student = Student::where('studentid', $id)->firstOrFail();
            
            // Delete the student record
            $student->delete();
            
            // Redirect with success message
            return redirect()->back()->with('success', 'Student record deleted successfully!');
        } catch (\Exception $e) {
            // Handle any exceptions, such as if the student record is not found
            return redirect()->back()->with('error', 'Failed to delete student record.');
        }
    }

    //*Enroll method
    public function enroll(Request $request){
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'subjectid' => ['required', 'string', 'max:255'],
            'subjectname' => ['required', 'string', 'max:255'],
            'studentid' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'middleInitial' => ['nullable', 'string', 'max:1', 'regex:/^[A-Z]$/'],
            'grade' => ['nullable', 'string', 'max:10'],
        ]);
    
        if ($validator->fails()) {
            // Redirect back with validation errors
            return redirect()->back()->with('error', 'Error enrolling student. Please try again.');
        }
        
        // Check if the combination of subjectid and studentid already exists
        $subjectId = $request->input('subjectid');
        $studentId = $request->input('studentid');

        $exists = Grade::where('subjectid', $subjectId)
                    ->where('studentid', $studentId)
                    ->exists();

        if ($exists) {
            // Redirect back with a session error message
            return redirect()->back()->with('error', 'Student is already enrolled in this subject');
        }

        try {
            // Create a new grade record in the database
            $grade = Grade::create([
                'subjectid' => $request->input('subjectid'),
                'subjectname' => $request->input('subjectname'),
                'studentid' => $request->input('studentid'),
                'lastname' => $request->input('lastname'),
                'firstname' => $request->input('firstname'),
                'middleInitial' => $request->input('middleInitial'),
                'grade' => $request->input('grade'),
            ]);
    
            // Redirect to the index page or any other relevant page with success message
            return redirect()->back()->with('success', 'Student enrolled successfully');
        } catch (QueryException $exception) {
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Error enrolling student. Please try again.');
        }
    }
}