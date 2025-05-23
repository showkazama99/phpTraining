@extends('layouts.app')
@section('title', '結果')
@section('content')
<p>{{ $message }}</p>
<a href="{{ route('employee.index') }}">社員一覧画面へ</a>
<a href="{{ route('menu') }}">メニュー画面へ</a>
@endsection