@extends('layouts.app')
@section('title', '社員参照画面')
@section('content')
<h2>社員情報画面</h2>
<table border="1" cellpadding="4">
    <tr><th>社員ID</th><td>{{ $employee->employee_id }}</td></tr>
    <tr><th>社員名</th><td>{{ $employee->family_name }} {{ $employee->first_name }}</td></tr>
    <tr><th>所属セクション</th><td>{{ App\Models\Employee::SECTION[$employee->section_id] }}</td></tr>
    <tr><th>メールアドレス</th><td>{{ $employee->mail }}</td></tr>
    <tr><th>性別</th><td>{{ App\Models\Employee::GENDER[$employee->gender_id] }}</td></tr>
</table>
<form action="{{ route('employee.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('データを削除します。よろしいですか？')">
    @csrf
    <button type="submit">削除</button>
</form>
<a href="{{ route('employee.edit', $employee->id) }}">編集</a></br>
<a href="{{ route('employee.index') }}">社員一覧画面へ</a></br>
<a href="{{ route('menu') }}">メニュー画面へ</a>
@endsection