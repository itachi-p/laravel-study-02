@extends('layouts.app')

@section('title', 'User Info (from Phone number)')

@section('content')
{{-- Phoneモデルのuser()メソッドからユーザー情報に逆アクセスする --}}
    <h1>{{ $phone->user->name }}</h1>
    <p class="text-muted">User ID: {{ $phone->user_id }}</p>
    <p>Email: {{ $phone->user->email }}</p>
    <p>Phone: {{ $phone->phone_number }}</p>
@endsection