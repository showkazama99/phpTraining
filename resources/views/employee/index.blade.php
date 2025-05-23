@extends('layouts.app')
@section('title', '社員一覧画面')
@section('content')
<h2>社員一覧画面</h2>
<table border="1" cellpadding="4">
    <tr>
        <th>社員ID</th>
        <th>社員名</th>
        <th>所属セクション</th>
        <th>メールアドレス</th>
        <th>性別</th>
    </tr>
    @foreach ($employees as $employee)
        <tr>
            <td><a href="{{ route('employee.show', $employee->id) }}">{{ $employee->employee_id }}</a></td>
            <td>{{ $employee->family_name }} {{ $employee->first_name }}</td>
            <td>{{ App\Models\Employee::SECTION[$employee->section_id] }}</td>
            <td>{{ $employee->mail }}</td>
            <td>{{ App\Models\Employee::GENDER[$employee->gender_id] }}</td>
        </tr>
    @endforeach
</table>
<a href="{{ route('menu') }}">メニュー画面へ</a>
@endsection