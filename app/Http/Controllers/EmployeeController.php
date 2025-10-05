<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Country;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Employee::class, 'employee');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pageComponents = [
            'pageTitle'     => 'الموظفين',
            'navElements' => [
                'الموظفين' => route('employees.index')
            ]
        ];

        return view('dashboard.employees.index', ['employees' => Employee::all()], $pageComponents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageComponents = [
            'pageTitle'     => 'إضافة موظف',
            'navElements' => [
                'الموظفين' => route('employees.index'),
                'إضافة موظف' => route('employees.create')
            ]
        ];
    
        return view('dashboard.employees.create', [
            'departments' => Department::all(),
            'managers' => Employee::all(),
            'countries' => Country::all()
        ], $pageComponents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $employee = new Employee();

        $employee->first_name = $request->validated('first_name');
        $employee->last_name = $request->validated('last_name');
        $employee->email = $request->validated('email');
        $employee->phone_number = $request->validated('phone_number');
        $employee->alamin_code = $request->validated('alamin_code');
        $employee->hire_date = $request->validated('hire_date');
        $employee->job_title = $request->validated('job_title');
        $employee->department_id = $request->validated('department');
        $employee->manager_id = $request->validated('manager');
        $employee->address = $request->validated('address');
        $employee->city = $request->validated('city');
        $employee->state = $request->validated('state');
        $employee->postal_code = $request->validated('postal_code');
        $employee->country_id = $request->validated('country');

        $employee->save();
        
        // session(['message' => 'تم إضافة ' . $employee->employee_name . ' بنجاح', 'messageType' => 'success']);

        session()->flash('message', 'تم إضافة " ' . $employee->first_name.' '.$employee->last_name . ' " بنجاح');
        session()->flash('messageType', 'success');

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $pageComponents = [
            'pageTitle'     => 'بيانات موظف',
            'navElements' => [
                'الموظفين' => route('employees.index'),
                'بيانات ' . $employee->first_name.' '.$employee->last_name => route('employees.show', $employee->id)
            ]
        ];
        return view('dashboard.employees.show', ['employee'=>$employee], $pageComponents);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee): View
    {
        $pageComponents = [
            'pageTitle'     => 'تعديل بيانات موظف',
            'navElements' => [
                'الموظفين' => route('employees.index'),
                'تعديل بيانات ' . $employee->first_name.' '.$employee->last_name => route('employees.edit', $employee->id)
                ]
            ];
            
        return view('dashboard.employees.edit', [
            'employee' => $employee,
            'departments' => Department::all(),
            'managers' => Employee::all(),
            'countries' => Country::all()
        ], $pageComponents);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->first_name = $request->validated('first_name');
        $employee->last_name = $request->validated('last_name');
        $employee->email = $request->validated('email');
        $employee->phone_number = $request->validated('phone_number');
        $employee->alamin_code = $request->validated('alamin_code');
        $employee->hire_date = $request->validated('hire_date');
        $employee->job_title = $request->validated('job_title');
        $employee->department_id = $request->validated('department');
        $employee->manager_id = $request->validated('manager');
        $employee->address = $request->validated('address');
        $employee->city = $request->validated('city');
        $employee->state = $request->validated('state');
        $employee->postal_code = $request->validated('postal_code');
        $employee->country_id = $request->validated('country');

        if ($employee->isDirty()) {
            $employee->save();
    
            session()->flash('message', 'تم تعديل " ' . $employee->first_name.' '.$employee->last_name . ' " بنجاح');
            session()->flash('messageType', 'success');
    
            return redirect()->route('employees.show', $employee);
        } else {
            return redirect()->route('employees.show', $employee);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if (!$employee->employees->isEmpty()) {
            session()->flash('message', 'لا يمكن حذف " ' . $employee->first_name.' '.$employee->last_name . ' " لوجود موظفين تابعين له');
            session()->flash('messageType', 'danger');
            return back();
        } else {
            if ($employee->delete()) {
                session()->flash('message', 'تم حذف " '. $employee->first_name.' '.$employee->last_name .' " بنجاح');
                session()->flash('messageType', 'success');
                return redirect()->route('employees.index');
            }
        }
    }
}
