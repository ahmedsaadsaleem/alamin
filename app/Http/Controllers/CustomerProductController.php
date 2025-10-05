<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerProductRequest;
use App\Http\Requests\UpdateCustomerProductRequest;
use App\Models\Customer;
use App\Models\CustomerProduct;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class CustomerProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(CustomerProduct::class, 'product');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Customer $customer): View
    {
        $pageComponents = [
            'pageTitle'     => 'بيانات منتجات عميل',
            'navElements' => [
                'العملاء' => route('customers.index'),
                $customer->customer_name => route('customers.show', $customer->id),
                'منتجات العميل' => route('customers.products.index', $customer->id)
            ]
        ];

        return view('dashboard.customers.products.index', ['customer' =>$customer , 'products' => CustomerProduct::where('customer_id', $customer->id)->get()], $pageComponents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Customer $customer): View
    {
        $pageComponents = [
            'pageTitle'     => 'إضافة منتج لعميل',
            'navElements' => [
                $customer->customer_name => route('customers.show', $customer->id),
                'منتجات العميل' => route('customers.products.index', $customer->id),
                'إضافة منتج' => route('customers.products.create', $customer->id)
            ]
        ];
        
        $givedProducts = [];

        foreach (CustomerProduct::all() as $customerProduct) {
            $givedProducts[] = $customerProduct->product_id;
        }
        
        return view('dashboard.customers.products.create', [
            'customer' => $customer, 'branches' => $customer->branches,
            'products' => Product::whereNotIn('id', $givedProducts)->get()
        ], 
        $pageComponents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerProductRequest $request, Customer $customer)
    {
        $product = new CustomerProduct();

        $product->customer_id = $request->validated('customer', $customer->id);
        $product->branch_id = $request->validated('branch');
        $product->product_id = $request->validated('product');
        $product->purchase_date = $request->validated('purchase_date');
        $product->warranty = $request->validated('warranty', 0);
        $product->end_warranty = $request->validated('end_warranty');

        $product->save();

        session()->flash('message', 'تم إضافة " ' . $product->product->product_name . ' " بنجاح');
        session()->flash('messageType', 'success');

        return redirect()->route('customers.products.index', $customer->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer, CustomerProduct $product)
    {
        $pageComponents = [
            'pageTitle'     => 'بيانات منتج',
            'navElements' => [
                $customer->customer_name => route('customers.show', $customer->id),
                'منتجات العميل' => route('customers.products.index', $customer->id),
                'بيانات منتج' => route('customers.products.show', [$customer->id, $product->id])
            ]
        ];

        return view('dashboard.customers.products.show', ['customerProduct' => $product], $pageComponents);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer, CustomerProduct $product): View
    {
        $pageComponents = [
            'pageTitle'     => 'تعديل منتج لعميل',
            'navElements' => [
                $customer->customer_name => route('customers.show', $customer->id),
                'منتجات العميل' => route('customers.products.index', $customer->id),
                'تعديل بيانات '.$product->product->productName() => route('customers.products.edit', [$customer->id, $product->id])
            ]
        ];

        foreach (CustomerProduct::all() as $customerProduct) {
            $givedProducts[] = $customerProduct->product_id;
        }

        $givedProducts = array_diff($givedProducts, (array) $product->product_id);
        
        return view('dashboard.customers.products.edit', [
            'customerProduct' => $product, 'branches' => $customer->branches, 
            'products' => Product::whereNotIn('id', $givedProducts)->get()
        ], 
        $pageComponents);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerProductRequest $request, Customer $customer, CustomerProduct $product)
    {
        $product->branch_id = $request->validated('branch');
        $product->product_id = $request->validated('product');
        $product->purchase_date = $request->validated('purchase_date');
        $product->warranty = $request->validated('warranty', 0);
        $product->end_warranty = $request->validated('end_warranty');

        if ($product->isDirty()) {
            $product->save();
    
            session()->flash('message', 'تم تعديل " ' . $product->product->product_name . ' " بنجاح');
            session()->flash('messageType', 'success');
    
            return redirect()->route('customers.products.show',[$customer->id, $product->id]);
        } else {
            return redirect()->route('customers.products.show',[$customer->id, $product->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer, CustomerProduct $product)
    {
        if ($product->delete()) {
            session()->flash('message', 'تم حذف " '. $product->model_name .' " بنجاح');
            session()->flash('messageType', 'success');
            return redirect()->route('customers.products.index', $customer->id);
        }
    }
}
