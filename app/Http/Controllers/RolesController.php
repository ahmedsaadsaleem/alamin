<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pageComponents = [
            'pageTitle'     => 'الصلاحيات',
            'navElements' => [
                'الصلاحيات' => route('roles.index')
            ]
        ];

        $roles = new Role();

        return view('dashboard.roles.index', ['roles'=>$roles->all()], $pageComponents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageComponents = [
            'pageTitle'     => 'إضافة صلاحية',
            'navElements' => [
                'الصلاحيات' => route('roles.index'),
                'إضافة صلاحية' => route('roles.create')
            ]
        ];
    
        return view('dashboard.roles.create', $pageComponents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $role = new Role();

        $role->role_name = $request->validated('role_name');
        $role->role = $request->validated('role');
        $role->target = $request->validated('target');

        $role->save();
        
        // session(['message' => 'تم إضافة ' . $role->role_name . ' بنجاح', 'messageType' => 'success']);

        session()->flash('message', 'تم إضافة " ' . $role->role_name . ' " بنجاح');
        session()->flash('messageType', 'success');

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $pageComponents = [
            'pageTitle'     => 'بيانات صلاحية',
            'navElements' => [
                'الصلاحيات' => route('roles.index'),
                'صلاحية ' . $role->role_name => route('roles.show', $role->id)
            ]
        ];

        return view('dashboard.roles.show', ['role'=>$role], $pageComponents);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        $pageComponents = [
            'pageTitle'     => 'تعديل بيانات صلاحية',
            'navElements' => [
                'الصلاحيات' => route('roles.index'),
                'تعديل بيانات صلاحية ' . $role->role_name => route('roles.edit', $role->id)
                ]
            ];
            
        return view('dashboard.roles.edit', ['role'=>$role], $pageComponents);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, role $role)
    {
        $role->role_name = $request->validated('role_name');
        $role->role = $request->validated('role');
        $role->target = $request->validated('target');

        if ($role->isDirty()) {
            $role->save();
            
            session()->flash('message', 'تم تعديل " ' . $role->role_name . ' " بنجاح');
            session()->flash('messageType', 'success');
    
            return redirect()->route('roles.show', $role);
        } else {
            return redirect()->route('roles.show', $role);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        DB::table('group_role')->where('role_id', $role->id)->delete();
        
        if ($role->delete()) {
            session()->flash('message', 'تم حذف '. $role->role_name .' بنجاح');
            session()->flash('messageType', 'success');
            return redirect()->route('roles.index');
        }
    }
}
