@extends('layouts.auth')
@section('content')
    <div class="register-page">
        <div class="inner d-flex flex-column">
            <div class="card m-4 shadow">
                <div class="card-body">
                    <h2 class="card-title mb-5 text-center">مرحباً <span>{{$user_name}}</span></h2>
                    <p>لقد انشأت حسابك بنجاح</p>
                    <div><a href="{{route('auth.login')}}">انقر هنا لتسجيل الدخول</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection