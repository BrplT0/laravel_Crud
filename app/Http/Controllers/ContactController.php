<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $students = Student::with('city')->get();
        return view('contact.index', compact('students'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $student = Student::findOrFail($request->student_id);

        // Send email
        Mail::raw($request->message, function($message) use ($student, $request) {
            $message->to($student->email)
                   ->subject($request->subject);
        });

        return redirect()->route('contact.index')
            ->with('success', 'Message sent successfully to ' . $student->name);
    }
} 