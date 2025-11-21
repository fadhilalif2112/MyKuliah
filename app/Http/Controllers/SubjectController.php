<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Lecture;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('subject')
            ->paginate(10);

        $stats = [
            'total' => Subject::count(),
            'total_credits' => Subject::sum('credits'),
            'average_credits' => Subject::avg('credits'),
        ];

        return view('subjects.index', [
            'subjects' => $subjects,
            'stats' => $stats,
        ]);
    }

    public function create()
    {
        $lectures = Lecture::all();
        return view('subjects.create', ['lectures' => $lectures]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'lecture_id' => 'nullable|exists:lectures,id',
            'subject_name' => 'required|string|max:255',
            'semester' => 'required|integer|min:1|max:8',
            'credits' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        Subject::create($validated);

        return redirect()->route('subjects.index')->with('success', 'Subject created successfully');
    }

    public function edit(Subject $subject)
    {
        $lectures = Lecture::all();
        return view('subjects.edit', [
            'subject' => $subject,
            'lectures' => $lectures,
        ]);
    }

    public function update(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'lecture_id' => 'nullable|exists:lectures,id',
            'subject_name' => 'required|string|max:255',
            'semester' => 'required|integer|min:1|max:8',
            'credits' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $subject->update($validated);

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully');
    }
}
