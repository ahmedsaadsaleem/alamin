<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductModelRequest;
use App\Http\Requests\UpdateProductModelRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductModel;
use Illuminate\Contracts\View\View;

class ProductModelController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ProductModel::class, 'model');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pageComponents = [
            'pageTitle'     => 'طرازات المنتجات',
            'navElements' => [
                'طرازات المنتجات' => route('models.index')
            ]
        ];

        return view('dashboard.product-models.index', ['models'=>ProductModel::all()], $pageComponents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageComponents = [
            'pageTitle'     => 'إضافة طراز',
            'navElements' => [
                'طرازات المنتجات' => route('models.index'),
                'إضافة طراز' => route('models.create')
            ]
        ];
    
        return view('dashboard.product-models.create', ['categories' => Category::all(), 'brands' => Brand::all()], $pageComponents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductModelRequest $request)
    {
        $model = new ProductModel();

        $model->model_name = $request->validated('model_name');
        $model->category_id = $request->validated('category');
        $model->brand_id = $request->validated('brand');
        $model->description = $request->validated('description');

        $model->save();

        session()->flash('message', 'تم إضافة " ' . $model->model_name . ' " بنجاح');
        session()->flash('messageType', 'success');

        return redirect()->route('models.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductModel $model)
    {
        $pageComponents = [
            'pageTitle'     => 'بيانات طراز',
            'navElements' => [
                'طرازات المنتجات' => route('models.index'),
                'بيانات طراز ' . $model->model_name => route('models.show', $model->id)
            ]
        ];
        return view('dashboard.product-models.show', ['model' => $model], $pageComponents);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductModel $model): View
    {
        $pageComponents = [
            'pageTitle'     => 'تعديل بيانات طراز',
            'navElements' => [
                'طرازات المنتجات' => route('models.index'),
                'تعديل بيانات طراز ' . $model->model_name => route('models.edit', $model->id)
                ]
            ];
            
        return view('dashboard.product-models.edit', ['model' => $model, 'categories' => Category::all(), 'brands' => Brand::all()], $pageComponents);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductModelRequest $request, ProductModel $model)
    {
        $model->model_name = $request->validated('model_name');
        $model->category_id = $request->validated('category');
        $model->brand_id = $request->validated('brand');
        $model->description = $request->validated('description');

        if ($model->isDirty()) {
            $model->save();
    
            session()->flash('message', 'تم تعديل " ' . $model->model_name . ' " بنجاح');
            session()->flash('messageType', 'success');
    
            return redirect()->route('models.show', $model);
        } else {
            return redirect()->route('models.show', $model);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductModel $model)
    {
        if(!$model->products->isEmpty()) {
            session()->flash('message', 'لا يمكن حذف طراز "' . $model->model_name . '" لوجود منتجات تابعة له');
            session()->flash('messageType', 'danger');
            return back();
        } else {
            if ($model->delete()) {
                session()->flash('message', 'تم حذف '. $model->model_name .' بنجاح');
                session()->flash('messageType', 'success');
                return redirect()->route('models.index');
            }
        }
    }
}
