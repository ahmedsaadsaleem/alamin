<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pageComponents = [
            'pageTitle'     => 'فئات المنتجات',
            'navElements' => [
                'فئات المنتجات' => route('categories.index')
            ]
        ];

        return view('dashboard.categories.index', ['categories'=>Category::all()], $pageComponents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pageComponents = [
            'pageTitle'     => 'إضافة فئة',
            'navElements' => [
                'فئات المنتجات' => route('categories.index'),
                'إضافة فئة' => route('categories.create')
            ]
        ];
    
        return view('dashboard.categories.create', $pageComponents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();

        $category->category_name = $request->validated('category_name');
        $category->description = $request->validated('description');

        $category->save();

        session()->flash('message', 'تم إضافة " ' . $category->category_name . ' " بنجاح');
        session()->flash('messageType', 'success');

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $pageComponents = [
            'pageTitle'     => 'بيانات فئة',
            'navElements' => [
                'فئات المنتجات' => route('categories.index'),
                $category->category_name => route('categories.show', $category->id)
            ]
        ];
        return view('dashboard.categories.show', ['category'=>$category], $pageComponents);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        $pageComponents = [
            'pageTitle'     => 'تعديل بيانات فئة',
            'navElements' => [
                'فئات المنتجات' => route('categories.index'),
                'تعديل بيانات فئة ' . $category->category_name => route('categories.edit', $category->id)
                ]
            ];
            
        return view('dashboard.categories.edit', ['category'=>$category], $pageComponents);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->category_name = $request->validated('category_name');
        $category->description = $request->validated('description');

        if ($category->isDirty()) {
            $category->save();
            
            session()->flash('message', 'تم تعديل " ' . $category->category_name . ' " بنجاح');
            session()->flash('messageType', 'success');
    
            return redirect()->route('categories.show', $category);
        } else {
            return redirect()->route('categories.show', $category);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (!$category->models->isEmpty()) {
            session()->flash('message', 'لا يمكن حذف فئة "' . $category->category_name . '" لوجود طرازات منتجات تابعة لها');
            session()->flash('messageType', 'danger');
            return back();
        } else {
            if ($category->delete()) {
                session()->flash('message', 'تم حذف '. $category->category_name .' بنجاح');
                session()->flash('messageType', 'success');
                return redirect()->route('categories.index');
            }
        }
    }
}
