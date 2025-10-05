@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات الطراز</h4>
                <div>
                    <form method="POST" action="{{route('models.update', $model->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="model_name">اسم الطراز</label>
                            <div class="col-lg-5 col-md-7">
                                <input class="form-control @error('model_name') is-invalid @else {{old('model_name') ? 'is-valid' : '';}} @enderror" type="text" name="model_name" id="model_name" value="{{old('model_name') ?? $model->model_name}}" />
                                @error('model_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="category">الفئة</label>
                            <div class="col-lg-5 col-md-7">
                                <select name="category" id="category" class="form-select @error('category') is-invalid @else {{old('category') ? 'is-valid' : '';}} @enderror">
                                    <option selected disabled>اختر فئة</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}" @selected($model->category_id == $category->id || old('category') == $category->id)>{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="brand">العلامة التجارية</label>
                            <div class="col-lg-5 col-md-7">
                                <select name="brand" id="brand" class="form-select @error('brand') is-invalid @else {{old('brand') ? 'is-valid' : '';}} @enderror">
                                    <option selected disabled>اختر علامة</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}" @selected($model->brand_id == $brand->id || old('brand') == $brand->id)>{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                                @error('brand')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="description">الوصف</label>
                            <div class="col-lg-5 col-md-7">
                                <textarea name="description" class="form-control @error('description') is-invalid @else {{old('description') ? 'is-valid' : '';}} @enderror" id="description" cols="30" rows="5" style="resize: none;">{{old('description') ?? $model->description}}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <input class="btn btn-primary mt-3" type="submit" value="حفظ">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection