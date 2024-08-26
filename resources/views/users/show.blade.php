@extends('layouts.app')

@section('title', 'Show user')

@section('content')
    <h1>{{ $user->name }}</h1>
    <p class="text-muted">User ID: {{ $user->id }}</p>
    <p>Email: {{ $user->email }}</p>
    {{-- 電話番号にはUserモデルからPhoneモデルへのアクセスが必要 --}}
    <p>Phone: {{ $user->getPhoneNumber->phone_number }}</p>
@endsection