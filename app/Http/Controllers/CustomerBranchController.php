<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerBranchRequest;
use App\Http\Requests\UpdateCustomerBranchRequest;
use App\Models\Customer;
use App\Models\CustomerBranch;
use App\Models\CustomerProduct;

class CustomerBranchController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(CustomerBranch::class, 'branch');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Customer $customer)
    {
        $pageComponents = [
            'pageTitle'     => 'فروع ' . $customer->customer_name,
            'navElements' => [
                'العملاء' => route('customers.index'),
                $customer->customer_name => route('customers.show', $customer),
                'فروع ' . $customer->customer_name => route('customers.branches.index', $customer)
            ]
        ];

        // dd(CustomerBranch::where('customer_id', $customer->id)->get());

        return view('dashboard.customers.branches.index', ['branches' => CustomerBranch::where('customer_id', $customer->id)->get(), 'customer' => $customer], $pageComponents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Customer $customer)
    {
        $pageComponents = [
            'pageTitle'     => 'إضافة فرع',
            'navElements' => [
                'العملاء' => route('customers.index'),
                $customer->customer_name => route('customers.show', $customer),
                'إضافة فرع' => route('customers.branches.create', $customer)
            ]
        ];

        // dd(CustomerBranch::where('customer_id', $customer->id)->get());

        return view('dashboard.customers.branches.create', ['customer' => $customer], $pageComponents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerBranchRequest $request, Customer $customer)
    {
        $branch = new CustomerBranch();

        $branch->customer_id = $customer->id;
        $branch->branch_name = $request->validated('branch_name');
        $branch->alamin_code = $request->validated('alamin_code');
        $branch->address = $request->validated('address');
        $branch->branch_phone = $request->validated('branch_phone');
        $branch->branch_emp = $request->validated('branch_emp');
        $branch->emp_phone = $request->validated('emp_phone');

        $branch->save();

        session()->flash('message', 'تم إضافة " ' . $branch->branch_name . ' " بنجاح');
        session()->flash('messageType', 'success');

        return redirect()->route('customers.branches.index', $customer->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerBranch $branch)
    {
        $pageComponents = [
            'pageTitle'     => 'فرع ' . $branch->branch_name,
            'navElements' => [
                'العملاء' => route('customers.index'),
                $branch->customer->customer_name => route('customers.show', $branch->customer->id),
                'فرع ' . $branch->branch_name => route('branches.show', $branch->id)
            ]
        ];

        // dd($branch->products);

        return view('dashboard.customers.branches.show', ['branch' => $branch], $pageComponents);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerBranch $branch)
    {
        $pageComponents = [
            'pageTitle'     => 'تعديل فرع',
            'navElements' => [
                'العملاء' => route('customers.index'),
                $branch->customer->customer_name => route('customers.show', $branch->customer->id),
                'تعديل فرع ' . $branch->branch_name => route('branches.edit', $branch->id)
            ]
        ];

        // dd(CustomerBranch::where('customer_id', $customer->id)->get());

        return view('dashboard.customers.branches.edit', ['branch' => $branch], $pageComponents);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerBranchRequest $request, CustomerBranch $branch)
    {
        $branch->branch_name = $request->validated('branch_name');
        $branch->alamin_code = $request->validated('alamin_code');
        $branch->address = $request->validated('address');
        $branch->branch_phone = $request->validated('branch_phone');
        $branch->branch_emp = $request->validated('branch_emp');
        $branch->emp_phone = $request->validated('emp_phone');

        if ($branch->isDirty()) {
            $branch->save();
    
            session()->flash('message', 'تم تعديل " ' . $branch->branch_name . ' " بنجاح');
            session()->flash('messageType', 'success');
    
            return redirect()->route('branches.show', $branch->id);
        } else {
            return redirect()->route('branches.show', $branch->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerBranch $branch)
    {
        if (!$branch->products->isEmpty()) {
            CustomerProduct::where('branch_id', $branch->id)->update([
                'branch_id' => null
            ]);
        }

        if ($branch->delete()) {
            session()->flash('message', 'تم حذف '. $branch->branch_name .' بنجاح');
            session()->flash('messageType', 'success');
            return redirect()->route('customers.index');
        }
    }
}
