<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserGroupRequest;
use App\Http\Requests\UpdateUserGroupRequest;
use App\Models\Role;
use App\Models\UserGroup;
use App\Models\groupRole;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class UserGroupController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(UserGroup::class, 'group');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pageComponents = [
            'pageTitle'   => 'مجموعات المستخدمين',
            'navElements' => [
                'مجموعات المستخدمين' => route('groups.index')
                ]
        ];


        return view('dashboard.groups.index', ['groups' => UserGroup::all()], $pageComponents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageComponents = [
            'pageTitle'   => 'إضافة مجموعة مستخدمين',
            'navElements' => [
                'مجموعات المستخدمين' => route('groups.index'),
                'إضافة مجموعة مستخدمين' => route('groups.create')
                ]
        ];

        $role = Role::all();
    
        return view('dashboard.groups.create', ['roles'=>$role], $pageComponents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserGroupRequest $request)
    {
        $group = new UserGroup();

        $group->group_name = $request->validated('group_name');

        $roles = $request->post('roles');

        if ($group->save()) {
            if (is_array($roles)) {
                $group->roles()->attach($roles);
            }
        }
        
        // session(['message' => 'تم إضافة ' . $group->group_name . ' بنجاح', 'messageType' => 'success']);

        session()->flash('message', 'تم إضافة " ' . $group->group_name . ' " بنجاح');
        session()->flash('messageType', 'success');

        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserGroup $group)
    {
        $pageComponents = [
            'pageTitle'     => 'بيانات مجموعة مستخدمن',
            'navElements' => [
                'مجموعات المستخدمين' => route('groups.index'),
                'بيانات ' . $group->group_name => route('groups.show', $group->id)
                ]
        ];
        
        return view('dashboard.groups.show', ['group'=>$group], $pageComponents);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserGroup $group): View
    {
        $pageComponents = [
            'pageTitle'     => 'تعديل بيانات مجموعة',
            'navElements' => [
                'مجموعات المستخدمين' => route('groups.index'),
                'تعديل بيانات ' . $group->group_name => route('groups.edit', $group->id)
                ]
            ];

        $extractedRoles = $group->roles;

        $roles = Role::all();
            
        return view('dashboard.groups.edit', ['group'=>$group, 'roles'=>$roles, 'groupRoles'=>$extractedRoles], $pageComponents);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserGroupRequest $request, UserGroup $group)
    {
        $group->group_name = $request->validated('group_name');
        $roles = $request->post('roles', []);

        if ($group->save()) {
            if ($roles !== null) {
                $group->roles()->sync($roles);
            }
        }

        session()->flash('message', 'تم تعديل " ' . $group->group_name . ' " بنجاح');
        session()->flash('messageType', 'success');

        return redirect()->route('groups.show', $group);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserGroup $group)
    {
        if (!$group->users->isEmpty()) {
            session()->flash('message', 'لا يمكن حذف مجموعة '. $group->group_name .' لوجود مستخدمين ينتمون لها');
            session()->flash('messageType', 'danger');
            return redirect()->route('groups.index');
        } else {
            $group->roles()->detach();
            
            if ($group->delete()) {
                session()->flash('message', 'تم حذف '. $group->group_name .' بنجاح');
                session()->flash('messageType', 'success');
                return redirect()->route('groups.index');
            }
        }
        
    }
}
