@extends('layouts.auth')
@section('content')
    <div class="login-page">
        <div class="inner d-flex flex-column">
            <div class="card m-4 shadow">
                <div class="card-body">
                    <h2 class="card-title mb-5 text-center">تسجيل الدخول</h2>
                    <form method="POST" action="{{route('auth')}}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="username" class="form-label">اسم المستخدم</label>
                                <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{old('username')}}" required />
                                @error('username')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">كلمة المرور</label>
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required />
                                @error('password')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <input type="checkbox" name="remember" id="remember" value="true" />
                                <label for="" class="form-label">تذكرني</label>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">دخول</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center">
                <p>ليس لديك حساب؟ <span><a href="{{route('auth.register')}}">إنشاء حساب</a></span></p>
            </div>
        </div>
    </div>
@endsection