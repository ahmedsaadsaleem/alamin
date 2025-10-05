<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Contracts\View\View;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Department::class, 'department');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pageComponents = [
            'pageTitle'     => 'أقسام الشركة',
            'navElements' => [
                'أقسام الشركة' => route('departments.index')
            ]
        ];

        return view('dashboard.departments.index', ['departments' => Department::all()], $pageComponents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageComponents = [
            'pageTitle'     => 'إضافة قسم',
            'navElements' => [
                'أقسام الشركة' => route('departments.index'),
                'إضافة قسم' => route('departments.create')
            ]
        ];
    
        return view('dashboard.departments.create', ['managers' => Employee::all()], $pageComponents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $department = new Department();

        $department->department_name = $request->validated('department_name');
        $department->department_code = $request->validated('department_code');
        $department->manager_id = $request->validated('manager');
        $department->location = $request->validated('location');
        $department->phone_number = $request->validated('phone_number');

        $department->save();

        session()->flash('message', 'تم إضافة " ' . $department->department_name . ' " بنجاح');
        session()->flash('messageType', 'success');

        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        $pageComponents = [
            'pageTitle'     => 'بيانات قسم',
            'navElements' => [
                'أقسام الشركة' => route('departments.index'),
                $department->department_name => route('departments.show', $department->id)
            ]
        ];
        return view('dashboard.departments.show', ['department'=>$department], $pageComponents);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department): View
    {
        $pageComponents = [
            'pageTitle'     => 'تعديل بيانات قسم',
            'navElements' => [
                'أقسام الشركة' => route('departments.index'),
                $department->department_name => route('departments.show', $department->id),
                'تعديل بيانات ' => route('departments.edit', $department->id)
                ]
            ];
            
        return view('dashboard.departments.edit', ['department'=>$department, 'managers' => Employee::all()], $pageComponents);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->department_name = $request->validated('department_name');
        $department->department_code = $request->validated('department_code');
        $department->manager_id = $request->validated('manager');
        $department->location = $request->validated('location');
        $department->phone_number = $request->validated('phone_number');

        if ($department->isDirty()) {
            $department->save();
    
            session()->flash('message', 'تم تعديل " ' . $department->department . ' " بنجاح');
            session()->flash('messageType', 'success');
    
            return redirect()->route('departments.show', $department);
        } else {
            return redirect()->route('departments.show', $department);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        if (!$department->employees->isEmpty()) {
            session()->flash('message', 'لا يمكن حذف قسم " ' . $department->department_name . ' " لوجود موظفين تابعين له');
            session()->flash('messageType', 'danger');
            return back();
        } else {
            if ($department->delete()) {
                session()->flash('message', 'تم حذف '. $department->department_name .' بنجاح');
                session()->flash('messageType', 'success');
                return redirect()->route('departments.index');
            }
        }
    }
}
