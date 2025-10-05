<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageComponents = [
            'pageTitle'     => 'المستخدمين',
            'navElements' => [
                'المستخدمين' => route('users.index')
            ]
        ];

        return view('dashboard.users.index', ['users' => User::whereNot('id', Auth::user()->id)->get()], $pageComponents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageComponents = [
            'pageTitle'     => 'إضافة مستخدم',
            'navElements' => [
                'المستخدمين' => route('users.index'),
                'إضافة مستخدم' => route('users.create')
            ]
        ];

        return view('dashboard.users.create', ['groups'=>UserGroup::all()], $pageComponents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        
        $user->username = $request->validated('username');
        $user->password = Hash::make($request->validated('password'));
        $user->email = $request->validated('email');
        $user->phone = $request->validated('phone');
        $user->first_name = $request->validated('first_name');
        $user->last_name = $request->validated('last_name');
        $user->group_id = $request->validated('group');

        $user->save();

        session()->flash('message', 'تم حفظ " ' . $user->first_name . ' ' . $user->last_name . ' " بنجاح');
        session()->flash('messageType', 'success');

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $pageComponents = [
            'pageTitle'     => 'بيانات مستخدم',
            'navElements' => [
                'المستخدمين' => route('users.index'),
                'بيانات ' . $user->first_name . ' ' . $user->last_name => route('users.show', $user->id)
            ]
        ];

        return view('dashboard.users.show', ['user'=>$user], $pageComponents);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $pageComponents = [
            'pageTitle'     => 'تعديل بيانات مستخدم',
            'navElements' => [
                'المستخدمين' => route('users.index'),
                'تعديل بيانات ' . $user->first_name . ' ' . $user->last_name => route('users.show', $user->id)
            ]
        ];

        return view('dashboard.users.edit', ['user'=>$user, 'groups'=>UserGroup::all()], $pageComponents);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->username = $request->validated('username');
        $user->email = $request->validated('email');
        $user->phone = $request->validated('phone');
        $user->first_name = $request->validated('first_name');
        $user->last_name = $request->validated('last_name');
        $user->group_id = $request->validated('group');

        if ($user->isDirty()) {
            $user->save();
    
            session()->flash('message', 'تم تعديل " ' . $user->first_name . ' ' . $user->last_name . ' " بنجاح');
            session()->flash('messageType', 'success');
    
            return redirect()->route('users.show', $user->id);
        } else {
            return redirect()->route('users.show', $user->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            session()->flash('message', 'تم حذف ' . $user->first_name . ' ' . $user->last_name . ' بنجاح');
            session()->flash('messageType', 'success');
            return redirect()->route('users.index');
        }
    }
}
