@extends('layouts.app')

@section('title', Auth::check() ? 'Bảng điều khiển - LinkSnap' : 'LinkSnap - Nền tảng Rút gọn Link & Bio Profile Hiện Đại')

@section('content')
<div class="transition-all duration-500">
    @auth
        @include('pages.dashboard')
    @else
        @include('pages.landing')
    @endauth
</div>
@endsection