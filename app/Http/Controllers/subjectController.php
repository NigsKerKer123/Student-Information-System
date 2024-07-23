<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class subjectController extends Controller
{   

    //*Index/Get Method
    public function index(){
        try {
            $subject = Subject::simplepaginate(5);
            return view("subject.index", compact('subject'));
        } catch (QueryException $exception) {
            return redirect()->back()->with('error', 'An error occurred while fetching data.');
        }
    }

    //* CREATE method
    public function create(Request $request){
        // Check if subjectid is empty
        if ($request->input('subjectid') === null || $request->input('subjectid') === '') {
            return redirect()->back()->with('error', 'Please input subject id.');
        }

        // Check if subjectname is empty
        if ($request->input('subjectname') === null || $request->input('subjectname') === '') {
            return redirect()->back()->with('error', 'Please input subjectname.');
        }

        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'subjectid' => [
                'required',
                'string',
                'max:255',
                Rule::unique('subjects', 'subjectid'),
            ],
            'subjectname' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            // Check if the validation error is due to subjectid uniqueness constraint
            if ($validator->errors()->has('subjectid')) {
                return redirect()->back()->with('error', 'Subject ID already exists.');
            }

            // Check if the validation error is due to invalid subjectname
            if ($validator->errors()->has('subjectname')) {
                return redirect()->back()->with('error', 'Invalid subjectname.');
            }
    
            // Redirect back with a general error message
            return redirect()->back()->with('error', 'Error creating subject. Please try again.');
        }

        try {
            // Create a new subject record in the database
            $subject = Subject::create([
                'subjectid' => $request->input('subjectid'),
                'subjectname' => $request->input('subjectname'),
            ]);
    
            // Redirect to the index page or any other relevant page
            return redirect()->back()->with('success', 'Subject created successfully');
        } catch (QueryException $exception) {
            // Redirect back with an error message
            return redirect()->back()->with('error', 'Error creating Subject. Please try again.');
        }
    }

    //* Edit method
    public function edit(Request $request, $id){
        // Check if subjectid is empty
        if ($request->input('subjectid') === null || $request->input('subjectid') === '') {
            return redirect()->back()->with('error', 'Please input subject id.');
        }

        // Check if subjectname is empty
        if ($request->input('subjectname') === null || $request->input('subjectname') === '') {
            return redirect()->back()->with('error', 'Please input subjectname.');
        }

        // Find the subject record
        $subject = Subject::where('subjectid', $id)->firstOrFail();

        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'subjectid' => [
                'required',
                'string',
                'max:255',
                Rule::unique('subjects', 'subjectid')->ignore($subject->id),
            ],
            'subjectname' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            // Check if the validation error is due to subjectid uniqueness constraint
            if ($validator->errors()->has('subjectid')) {
                return redirect()->back()->with('error', 'Subject ID already exists.');
            }

            // Check if the validation error is due to invalid subjectname
            if ($validator->errors()->has('subjectname')) {
                return redirect()->back()->with('error', 'Invalid subjectname.');
            }
    
            // Redirect back with a general error message
            return redirect()->back()->with('error', 'Error creating subject. Please try again.');
        }

        // Update the subject record with validated data
        try {
            $subject->update([
                'subjectid' => $request->input('subjectid'),
                'subjectname' => $request->input('subjectname'),
            ]);
            // Redirect with success message
            return redirect()->back()->with('success', 'subject record updated successfully!');
            } catch(QueryException $exception) {
                return redirect()->back()->with('error', 'Error updating subject. Please try again.');
            }
    }

    //*Delete Method
    public function delete(Request $request, $id){
        try {
            // Find the Subject record
            $subject = Subject::where('subjectid', $id)->firstOrFail();
            
            // Delete the Subject record
            $subject->delete();
            
            // Redirect with success message
            return redirect()->back()->with('success', 'Subject record deleted successfully!');
        } catch (\Exception $e) {
            // Handle any exceptions, such as if the Subject record is not found
            return redirect()->back()->with('error', 'Failed to delete Subject record.');
        }
    }
}
