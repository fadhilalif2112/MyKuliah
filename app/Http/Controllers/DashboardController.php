<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Todolist;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today()->dayOfWeek; // 1=Monday, 7=Sunday
        $userId = Auth::user()->id;

        // Get today's classes
        $todayClasses = Schedule::where('user_id', $userId)
            ->where('days', $today)
            ->with(['subject', 'lecture'])
            ->orderBy('start_at')
            ->get();

        // Get upcoming tasks
        $upcomingTasks = Todolist::where('user_id', $userId)
            ->where('status', 'doing')
            ->orderBy('due_date')
            ->limit(5)
            ->with('category')
            ->get();

        // Get upcoming exams (assuming exams stored in separate table or as todolists)
        // We are assuming that the category for exams has an id of 2
        $upcomingExams = Todolist::where('user_id', $userId)
            ->where('status', 'doing')
            ->where('category_id', 2)
            ->orderBy('due_date')
            ->limit(3)
            ->get();

        // Calculate task progress
        $totalTasks = Todolist::where('user_id', $userId)->count();
        $completedTasks = Todolist::where('user_id', $userId)->where('status', 'done')->count();
        $taskProgress = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0;

        return view('dashboard', [
            'todayClasses' => $todayClasses,
            'upcomingTasks' => $upcomingTasks,
            'upcomingExams' => $upcomingExams,
            'taskProgress' => $taskProgress,
            'classesCount' => $todayClasses->count(),
            'examsCount' => $upcomingExams->count(),
        ]);
    }
}
