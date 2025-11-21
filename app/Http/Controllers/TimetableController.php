<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Subject;
use App\Models\Lecture;
use Illuminate\Http\Request;
use Carbon\Carbon;
use id;

class TimetableController extends Controller
{
    public function index()
    {
        $currentView = request('view', 'week');

        // Get all schedules for current user
        $schedules = Schedule::where('user_id', auth()->id())
            ->with(['subject', 'lecture'])
            ->get();

        $subjects = Subject::all();

        return view('timetable.index', [
            'schedules' => $schedules,
            'subjects' => $subjects,
            'currentView' => $currentView,
        ]);
    }

    public function create()
    {
        $subjects = Subject::all();
        $lectures = Lecture::all();
        return view('timetable.create', [
            'subjects' => $subjects,
            'lectures' => $lectures,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'lecture_id' => 'required|exists:lectures,id',
            'days' => 'required|integer|min:1|max:7',
            'start_at' => 'required|date_format:H:i',
            'end_at' => 'required|date_format:H:i|after:start_at',
            'room' => 'required|string|max:255',
        ]);

        $validated['user_id'] = auth()->id();
        Schedule::create($validated);

        return redirect()->route('timetable.index')->with('success', 'Schedule added successfully');
    }

    public function edit(Schedule $schedule)
    {
        $subjects = Subject::all();
        $lectures = Lecture::all();
        return view('timetable.edit', [
            'schedule' => $schedule,
            'subjects' => $subjects,
            'lectures' => $lectures,
        ]);
    }

    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'lecture_id' => 'required|exists:lectures,id',
            'days' => 'required|integer|min:1|max:7',
            'start_at' => 'required|date_format:H:i',
            'end_at' => 'required|date_format:H:i|after:start_at',
            'room' => 'required|string|max:255',
        ]);

        $schedule->update($validated);

        return redirect()->route('timetable.index')->with('success', 'Schedule updated successfully');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('timetable.index')->with('success', 'Schedule deleted successfully');
    }
}
