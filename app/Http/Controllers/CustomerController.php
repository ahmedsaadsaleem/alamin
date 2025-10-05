<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Customer::class, 'customer');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pageComponents = [
            'pageTitle'     => 'العملاء',
            'navElements' => [
                'العملاء' => route('customers.index')
            ]
        ];

        return view('dashboard.customers.index', ['customers' => Customer::all()], $pageComponents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageComponents = [
            'pageTitle'     => 'إضافة عميل',
            'navElements' => [
                'العملاء' => route('customers.index'),
                'إضافة عميل' => route('customers.create')
            ]
        ];
    
        return view('dashboard.customers.create', $pageComponents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = new Customer();

        $customer->customer_name = $request->validated('customer_name');
        $customer->main_branch = $request->validated('main_branch');
        $customer->address = $request->validated('address');
        $customer->phone = $request->validated('phone');
        $customer->responsible = $request->validated('responsible');
        $customer->user_id = Auth::user()->id;

        $customer->save();
        
        // session(['message' => 'تم إضافة ' . $customer->customer_name . ' بنجاح', 'messageType' => 'success']);

        session()->flash('message', 'تم إضافة " ' . $customer->customer_name . ' " بنجاح');
        session()->flash('messageType', 'success');

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $pageComponents = [
            'pageTitle'     => 'بيانات عميل',
            'navElements' => [
                'العملاء' => route('customers.index'),
                'بيانات ' . $customer->customer_name => route('customers.show', $customer->id)
            ]
        ];
        return view('dashboard.customers.show', ['customer'=>$customer], $pageComponents);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer): View
    {
        $pageComponents = [
            'pageTitle'     => 'تعديل بيانات عميل',
            'navElements' => [
                'العملاء' => route('customers.index'),
                'تعديل بيانات ' . $customer->customer_name => route('customers.edit', $customer->id)
                ]
            ];
            
        return view('dashboard.customers.edit', ['customer'=>$customer], $pageComponents);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->customer_name = $request->validated('customer_name');
        $customer->main_branch = $request->validated('main_branch');
        $customer->address = $request->validated('address');
        $customer->phone = $request->validated('phone');
        $customer->responsible = $request->validated('responsible');

        if ($customer->isDirty()) {
            $customer->save();
    
            session()->flash('message', 'تم تعديل " ' . $customer->customer_name . ' " بنجاح');
            session()->flash('messageType', 'success');
    
            return redirect()->route('customers.show', $customer);
        } else {
            return redirect()->route('customers.show', $customer);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        if ($customer->delete()) {
            session()->flash('message', 'تم حذف '. $customer->customer_name .' بنجاح');
            session()->flash('messageType', 'success');
            return redirect()->route('customers.index');
        }
    }
}
