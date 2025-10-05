<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductModel;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pageComponents = [
            'pageTitle'     => 'المنتجات',
            'navElements' => [
                'المنتجات' => route('products.index')
            ]
        ];

        return view('dashboard.products.index', ['products'=>Product::all()], $pageComponents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageComponents = [
            'pageTitle'     => 'إضافة منتج',
            'navElements' => [
                'المنتجات' => route('products.index'),
                'إضافة منتج' => route('products.create')
            ]
        ];
    
        return view('dashboard.products.create', ['models' => ProductModel::all()], $pageComponents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();

        $product->model_id = $request->validated('model');
        $product->serial_number = $request->validated('serial_number');
        $product->purchase_date = $request->validated('purchase_date');
        $product->warranty = $request->validated('warranty');
        $product->end_warranty = $request->validated('end_warranty');

        $product->save();

        session()->flash('message', 'تم إضافة "' . $product->model->model_name . ' - ' . $product->serial_number . '" بنجاح');
        session()->flash('messageType', 'success');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $pageComponents = [
            'pageTitle'     => 'بيانات منتج',
            'navElements' => [
                'المنتجات' => route('products.index'),
                'بيانات منتج' => route('products.show', $product->id)
            ]
        ];
        return view('dashboard.products.show', ['product' => $product], $pageComponents);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        $pageComponents = [
            'pageTitle'     => 'تعديل بيانات منتج',
            'navElements' => [
                'المنتجات' => route('products.index'),
                'تعديل بيانات ' . $product->model->model_name . ' - ' . $product->serial_number => route('products.edit', $product->id)
                ]
            ];
            
        return view('dashboard.products.edit', ['product' => $product, 'models' => ProductModel::all()], $pageComponents);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->model_id = $request->validated('model');
        $product->serial_number = $request->validated('serial_number');
        $product->purchase_date = $request->validated('purchase_date');
        $product->warranty = $request->validated('warranty');
        $product->end_warranty = $request->validated('end_warranty');

        if ($product->isDirty()) {
            $product->save();
    
            session()->flash('message', 'تم تعديل "' . $product->model->model_name . ' - ' . $product->serial_number .  '" بنجاح');
            session()->flash('messageType', 'success');
    
            return redirect()->route('products.show', $product);
        } else {
            return redirect()->route('products.show', $product);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ((bool) $product->customerProduct) {
            session()->flash('message', 'لا يمكن حذف "' . $product->model->model_name . ' - ' . $product->serial_number . '" لأنه يتبع لعميل');
            session()->flash('messageType', 'danger');
            return redirect()->route('products.index');
        } else {
            if ($product->delete()) {
                session()->flash('message', 'تم حذف "' . $product->model->model_name . ' - ' . $product->serial_number . '" بنجاح');
                session()->flash('messageType', 'success');
                return redirect()->route('products.index');
            }
        }
    }
}
