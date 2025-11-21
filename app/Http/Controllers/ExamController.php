<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Todolist;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ExamController extends Controller
{
    public function index()
    {
        // Exams could be stored as Todolist entries or separate table
        // For now, treating them as special Todolist entries
        $exams = Todolist::where('status', '!=', null)
            ->orderBy('due_date')
            ->with('category')
            ->paginate(10);

        $allExams = Todolist::get();
        $thisMonthExams = $allExams->filter(function ($exam) {
            return Carbon::parse($exam->due_date)->month === Carbon::now()->month;
        });
        $next7DaysExams = $allExams->filter(function ($exam) {
            $examDate = Carbon::parse($exam->due_date);
            return $examDate->isBetween(Carbon::now(), Carbon::now()->addDays(7));
        });

        $stats = [
            'total' => $allExams->count(),
            'this_month' => $thisMonthExams->count(),
            'next_7_days' => $next7DaysExams->count(),
        ];

        return view('exams.index', [
            'exams' => $exams,
            'stats' => $stats,
        ]);
    }

    public function create()
    {
        $subjects = Subject::all();
        $categories = \App\Models\Category::all();
        return view('exams.create', [
            'subjects' => $subjects,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'required|date',
        ]);

        $validated['status'] = 'doing';
        Todolist::create($validated);

        return redirect()->route('exams.index')->with('success', 'Exam added successfully');
    }

    public function edit(Todolist $exam)
    {
        $subjects = Subject::all();
        $categories = \App\Models\Category::all();
        return view('exams.edit', [
            'exam' => $exam,
            'subjects' => $subjects,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Todolist $exam)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'priority' => 'required|in:low,medium,high',
            'due_date' => 'required|date',
        ]);

        $exam->update($validated);

        return redirect()->route('exams.index')->with('success', 'Exam updated successfully');
    }

    public function destroy(Todolist $exam)
    {
        $exam->delete();
        return redirect()->route('exams.index')->with('success', 'Exam deleted successfully');
    }
}
