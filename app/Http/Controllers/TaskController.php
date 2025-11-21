<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Todolist::with('category')
            ->orderBy('due_date')
            ->paginate(10);

        // Get tasks grouped by status
        $allTasks = Todolist::with('category')->get();
        $dueTodayTasks = $allTasks->filter(function ($task) {
            return Carbon::parse($task->due_date)->isToday();
        });
        $overdueTasks = $allTasks->filter(function ($task) {
            return Carbon::parse($task->due_date)->isPast() && $task->status === 'doing';
        });
        $completedTasks = $allTasks->filter(function ($task) {
            return $task->status === 'done';
        });

        $stats = [
            'total' => $allTasks->count(),
            'completed' => $completedTasks->count(),
            'overdue' => $overdueTasks->count(),
            'due_today' => $dueTodayTasks->count(),
        ];

        return view('tasks.index', [
            'tasks' => $tasks,
            'stats' => $stats,
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'document_id' => 'nullable|exists:documents,id',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:doing,done',
            'due_date' => 'required|date',
        ]);

        Todolist::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function edit(Todolist $todolist)
    {
        $categories = Category::all();
        return view('tasks.edit', [
            'task' => $todolist,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Todolist $todolist)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:doing,done',
            'due_date' => 'required|date',
        ]);

        $todolist->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
