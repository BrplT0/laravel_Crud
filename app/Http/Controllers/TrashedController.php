<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use Illuminate\Http\Request;

class TrashedController extends Controller
{
    public function index()
    {
        $deletedStudents = Student::onlyTrashed()->get();
        $deletedCities = City::onlyTrashed()->get();
        
        return view('trashed.index', compact('deletedStudents', 'deletedCities'));
    }

    public function restoreStudent($id)
    {
        $student = Student::withTrashed()->findOrFail($id);
        $student->restore();
        
        return redirect()->route('trashed.index')
            ->with('success', 'Student restored successfully.');
    }

    public function restoreCity($id)
    {
        $city = City::withTrashed()->findOrFail($id);
        $city->restore();
        
        return redirect()->route('trashed.index')
            ->with('success', 'City restored successfully.');
    }

    public function forceDeleteStudent($id)
    {
        $student = Student::withTrashed()->findOrFail($id);
        $student->forceDelete();
        
        return redirect()->route('trashed.index')
            ->with('success', 'Student permanently deleted.');
    }

    public function forceDeleteCity($id)
    {
        $city = City::withTrashed()->findOrFail($id);
        $city->forceDelete();
        
        return redirect()->route('trashed.index')
            ->with('success', 'City permanently deleted.');
    }
}
