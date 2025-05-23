@extends('layouts.app')
@section('title', 'メニュー')
@section('content')
<h2>管理画面</h2>
<ul>
    <li><a href="{{ route('employee.create') }}">社員登録画面</a></li>
    <li><a href="{{ route('employee.index') }}">社員一覧画面</a></li>
</ul>
@endsection