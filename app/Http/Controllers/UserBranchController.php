<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserBranchRequest;
use App\Http\Requests\UpdateUserBranchRequest;
use App\Models\CustomerBranch;
use App\Models\UserBranch;
use App\Models\User;
use Illuminate\Contracts\View\View;

class UserBranchController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(UserBranch::class, 'branch');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(User $user): View
    {
        $pageComponents = [
            'pageTitle'     => 'بيانات فروع مستخدم',
            'navElements' => [
                'العملاء' => route('users.index'),
                $user->customer_name => route('users.show', $user->id),
                'فروع المستخدم' => route('users.branchs.index', $user->id)
            ]
        ];

        return view('dashboard.users.branchs.index', ['customer' =>$user , 'branchs' => UserBranch::where('user_id', $user->id)->get()], $pageComponents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user): View
    {
        $pageComponents = [
            'pageTitle'     => 'إضافة فرع لمستخدم',
            'navElements' => [
                $user->customer_name => route('users.show', $user->id),
                'فروع المستخدم' => route('users.branchs.index', $user->id),
                'إضافة فرع' => route('users.branchs.create', $user->id)
            ]
        ];
        
        $givedbranchs = [];

        foreach (UserBranch::all() as $userBranch) {
            $givedbranchs[] = $userBranch->branch_id;
        }
        
        return view('dashboard.users.branchs.create', [
            'customer' => $user, 'branches' => $user->branches,
            'branchs' => CustomerBranch::whereNotIn('id', $givedbranchs)->get()
        ], 
        $pageComponents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserBranchRequest $request, User $user)
    {
        $branch = new UserBranch();

        $branch->user_id = $request->validated('customer', $user->id);
        $branch->branch_id = $request->validated('branch');
        $branch->task_id = $request->validated('task');
        $branch->visit_number = $request->validated('visit_number');

        $branch->save();

        session()->flash('message', 'تم إضافة " ' . $branch->branch->branch_name . ' " بنجاح');
        session()->flash('messageType', 'success');

        return redirect()->route('users.branchs.index', $user->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, UserBranch $branch)
    {
        $pageComponents = [
            'pageTitle'     => 'بيانات فرع',
            'navElements' => [
                $user->customer_name => route('users.show', $user->id),
                'فروع المستخدم' => route('users.branchs.index', $user->id),
                'بيانات فرع' => route('users.branchs.show', [$user->id, $branch->id])
            ]
        ];

        return view('dashboard.users.branchs.show', ['userBranch' => $branch], $pageComponents);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, UserBranch $branch): View
    {
        $pageComponents = [
            'pageTitle'     => 'تعديل فرع لمستخدم',
            'navElements' => [
                $user->customer_name => route('users.show', $user->id),
                'فروع المستخدم' => route('users.branchs.index', $user->id),
                $branch->branch->branch_name => route('users.branchs.create', $user->id),
                'تعديل بيانات' => route('users.branchs.create', [$user->id, $branch->id])
            ]
        ];

        foreach (UserBranch::all() as $userBranch) {
            $givedbranchs[] = $userBranch->branch_id;
        }

        $givedbranchs = array_diff($givedbranchs, (array) $branch->branch_id);
        
        return view('dashboard.users.branchs.edit', [
            'userBranch' => $branch, 'branches' => $user->branches, 
            'branchs' => CustomerBranch::whereNotIn('id', $givedbranchs)->get()
        ], 
        $pageComponents);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserBranchRequest $request, User $user, UserBranch $branch)
    {
        $branch->branch_id = $request->validated('branch');
        $branch->branch_id = $request->validated('branch');
        $branch->purchase_date = $request->validated('purchase_date');
        $branch->warranty = $request->validated('warranty', 0);
        $branch->end_warranty = $request->validated('end_warranty');

        $branch->save();

        session()->flash('message', 'تم تعديل " ' . $branch->branch->branch_name . ' " بنجاح');
        session()->flash('messageType', 'success');

        return redirect()->route('users.branchs.show',[$user->id, $branch->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, UserBranch $branch)
    {
        if ($branch->delete()) {
            session()->flash('message', 'تم حذف '. $branch->model_name .' بنجاح');
            session()->flash('messageType', 'success');
            return redirect()->route('users.branchs.index', $user->id);
        }
    }
}
