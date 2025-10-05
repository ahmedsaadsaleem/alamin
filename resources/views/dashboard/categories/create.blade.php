@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col">
        <div class="card tm-bg-main shadow">
            <div class="card-body">
                <h4 class="card-title mb-4">بيانات الفئة</h4>
                <div>
                    <form method="POST" action="{{route('categories.store')}}">
                        @csrf
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="category_name">اسم الفئة</label>
                            <div class="col-lg-5 col-md-7">
                                <input class="form-control @error('category_name') is-invalid @else {{old('category_name') ? 'is-valid' : '';}} @enderror" type="text" name="category_name" id="category_name" value="{{old('category_name')}}" />
                                @error('category_name')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label  class="col-lg-2 col-md-3 col-form-label" for="description">الوصف</label>
                            <div class="col-lg-5 col-md-7">
                                <textarea name="description" class="form-control @error('description') is-invalid @else {{old('description') ? 'is-valid' : '';}} @enderror" id="description" cols="30" rows="5" style="resize: none;">{{old('description')}}</textarea>
                                @error('description')
                                    <div class="text-danger">{{$message}}</div>
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