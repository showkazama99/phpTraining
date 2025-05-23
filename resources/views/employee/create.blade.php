@extends('layouts.app')
@section('title', '社員登録画面')
@section('content')

@if ($errors->any())
    <div class="error">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif
<h2>社員登録画面</h2>
<form action="{{ route('employee.store') }}" method="post" novalidate>
    @csrf
    <div class="form-group">
        <label>社員ID <span class="required">*</span></label>
        <input type="text" name="employee_id" value="{{ old('employee_id') }}" placeholder="例）YZ12345678"
            required pattern="^YZ[0-9]{8}$" maxlength="10">
    </div>
    <div class="form-group">
        <label>社員名（姓） <span class="required">*</span></label>
        <input type="text" name="family_name" value="{{ old('family_name') }}" maxlength="20" required>
    </div>
    <div class="form-group">
        <label>社員名（名） <span class="required">*</span></label>
        <input type="text" name="first_name" value="{{ old('first_name') }}" maxlength="20" required>
    </div>
    <div class="form-group">
        <label>所属セクション <span class="required">*</span></label>
        <select name="section_id" required>
            <option value="">選択してください</option>
            @foreach (App\Models\Employee::SECTION as $key => $value)
                <option value="{{ $key }}" {{ old('section_id')==$key?'selected':'' }}>{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>メールアドレス <span class="required">*</span></label>
        <input type="email" name="mail" value="{{ old('mail') }}" maxlength="256"
            required pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+$">
    </div>
    <div class="form-group">
        <label>性別 <span class="required">*</span></label>
        <label><input type="radio" name="gender_id" value="1" {{ old('gender_id')=='1'?'checked':'' }}>男性</label>
        <label><input type="radio" name="gender_id" value="2" {{ old('gender_id')=='2'?'checked':'' }}>女性</label>
    </div>
    <div class="form-group">
        <button type="submit">登録</button>
    </div>
</form>
<a href="{{ route('menu') }}">メニュー画面へ</a>
@endsection