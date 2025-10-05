<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Contracts\View\View;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Brand::class, 'brand');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pageComponents = [
            'pageTitle'     => 'العلامات التجارية',
            'navElements' => [
                'العلامات التجارية' => route('brands.index')
            ]
        ];

        return view('dashboard.brands.index', ['brands'=>Brand::all()], $pageComponents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageComponents = [
            'pageTitle'     => 'إضافة علامة',
            'navElements' => [
                'العلامات التجارية' => route('brands.index'),
                'إضافة علامة' => route('brands.create')
            ]
        ];
    
        return view('dashboard.brands.create', $pageComponents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $brand = new Brand();

        $brand->brand_name = $request->validated('brand_name');
        $brand->description = $request->validated('description');

        $brand->save();

        session()->flash('message', 'تم إضافة " ' . $brand->brand_name . ' " بنجاح');
        session()->flash('messageType', 'success');

        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        $pageComponents = [
            'pageTitle'     => 'بيانات علامة',
            'navElements' => [
                'العلامات التجارية' => route('brands.index'),
                'بيانات علامة ' . $brand->brand_name => route('brands.show', $brand->id)
            ]
        ];
        return view('dashboard.brands.show', ['brand'=>$brand], $pageComponents);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand): View
    {
        $pageComponents = [
            'pageTitle'     => 'تعديل بيانات علامة',
            'navElements' => [
                'العلامات التجارية' => route('brands.index'),
                'تعديل بيانات علامة ' . $brand->brand_name => route('brands.edit', $brand->id)
                ]
            ];
            
        return view('dashboard.brands.edit', ['brand'=>$brand], $pageComponents);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->brand_name = $request->validated('brand_name');
        $brand->description = $request->validated('description');

        if ($brand->isDirty()) {
            $brand->save();
    
            session()->flash('message', 'تم تعديل " ' . $brand->brand_name . ' " بنجاح');
            session()->flash('messageType', 'success');
    
            return redirect()->route('brands.show', $brand);
        } else {
            return redirect()->route('brands.show', $brand);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if (!$brand->models->isEmpty()) {
            session()->flash('message', 'لا يمكن حذف علامة '. $brand->brand_name .' لوجود طرازات منتجات تابعة لها');
            session()->flash('messageType', 'danger');
            return back();
        } else {
            if ($brand->delete()) {
                session()->flash('message', 'تم حذف '. $brand->brand_name .' بنجاح');
                session()->flash('messageType', 'success');
                return redirect()->route('brands.index');
            }
        }
    }
}
