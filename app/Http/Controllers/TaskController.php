<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Contracts\View\View;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pageComponents = [
            'pageTitle'     => 'مهام الموظفين',
            'navElements' => [
                'مهام الموظفين' => route('tasks.index')
            ]
        ];

        return view('dashboard.tasks.index', ['tasks' => Task::all()], $pageComponents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageComponents = [
            'pageTitle'     => 'إضافة مهمة',
            'navElements' => [
                'مهام الموظفين' => route('tasks.index'),
                'إضافة مهمة' => route('tasks.create')
            ]
        ];
    
        return view('dashboard.tasks.create', $pageComponents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = new Task();

        $task->task = $request->validated('task');
        $task->description = $request->validated('description');

        $task->save();

        session()->flash('message', 'تم إضافة " ' . $task->task . ' " بنجاح');
        session()->flash('messageType', 'success');

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $pageComponents = [
            'pageTitle'     => 'بيانات مهمة',
            'navElements' => [
                'مهام الموظفين' => route('tasks.index'),
                $task->task => route('tasks.show', $task->id)
            ]
        ];
        return view('dashboard.tasks.show', ['task'=>$task], $pageComponents);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task): View
    {
        $pageComponents = [
            'pageTitle'     => 'تعديل بيانات مهمة',
            'navElements' => [
                'مهام الموظفين' => route('tasks.index'),
                'تعديل بيانات مهمة ' . $task->task => route('tasks.edit', $task->id)
                ]
            ];
            
        return view('dashboard.tasks.edit', ['task'=>$task], $pageComponents);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->task = $request->validated('task');
        $task->description = $request->validated('description');

        if ($task->isDirty()) {
            $task->save();
    
            session()->flash('message', 'تم تعديل " ' . $task->task . ' " بنجاح');
            session()->flash('messageType', 'success');
    
            return redirect()->route('tasks.show', $task);
        } else {
            return redirect()->route('tasks.show', $task);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if (!$task->models->isEmpty()) {
            session()->flash('message', 'لا يمكن حذف مهمة "' . $task->task . '" لوجود طرازات منتجات تابعة لها');
            session()->flash('messageType', 'danger');
            return back();
        } else {
            if ($task->delete()) {
                session()->flash('message', 'تم حذف '. $task->task .' بنجاح');
                session()->flash('messageType', 'success');
                return redirect()->route('tasks.index');
            }
        }
    }
}
