<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    // 社員一覧表示
    public function index()
    {
        $employees = Employee::orderBy('employee_id', 'asc')->get();
        return view('employee.index', compact('employees'));
    }

    // 社員登録画面表示
    public function create()
    {
        return view('employee.create');
    }

    // 社員登録処理
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => [
                'required',
                'size:10',
                'regex:/^YZ[0-9]{8}$/',
                'unique:employee,employee_id'
            ],
            'family_name' => ['required', 'max:20'],
            'first_name'  => ['required', 'max:20'],
            'section_id'  => ['required', 'in:1,2,3'],
            'mail'        => [
                'required',
                'max:256',
                'email',
                'regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+$/',
                'unique:employee,mail'
            ],
            'gender_id'   => ['required', 'in:1,2'],
        ],
        [
            'required' => ':attributeを入力してください',
            'size'     => ':attributeは:size文字で入力してください',
            'max'      => ':attributeは:max文字以内で入力してください',
            'in'       => ':attributeを正しく入力してください',
            'regex'    => ':attributeを正しく入力してください',
            'unique'   => '入力した:attributeはすでに登録されています',
            'email'    => ':attributeを正しく入力してください',
        ],
        [
            'employee_id' => '社員ID',
            'family_name' => '社員名（姓）',
            'first_name'  => '社員名（名）',
            'section_id'  => '所属セクション',
            'mail'        => 'メールアドレス',
            'gender_id'   => '性別',
        ]);

        try {
            Employee::create($validated);
            return view('employee.result', ['message' => 'データを登録しました']);
        } catch (\Exception $e) {
            return view('employee.result', ['message' => 'データ登録に失敗しました']);
        }
    }

    // 社員参照画面表示
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.show', compact('employee'));
    }

    // 社員編集画面表示
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        session(['edit_employee_id' => $id]);
        return view('employee.edit', compact('employee'));
    }

    // 社員更新処理
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validated = $request->validate([
            // 社員IDは編集不可のためバリデーション不要
            'family_name' => ['required', 'max:20'],
            'first_name'  => ['required', 'max:20'],
            'section_id'  => ['required', 'in:1,2,3'],
            'mail'        => [
                'required',
                'max:256',
                'email',
                'regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+$/',
                Rule::unique('employee', 'mail')->ignore($employee->id)
            ],
            'gender_id'   => ['required', 'in:1,2'],
        ],
        [
            'required' => ':attributeを入力してください',
            'size'     => ':attributeは:size文字で入力してください',
            'max'      => ':attributeは:max文字以内で入力してください',
            'in'       => ':attributeを正しく入力してください',
            'regex'    => ':attributeを正しく入力してください',
            'unique'   => '入力した:attributeはすでに登録されています',
            'email'    => ':attributeを正しく入力してください',
        ],
        [
            'family_name' => '社員名（姓）',
            'first_name'  => '社員名（名）',
            'section_id'  => '所属セクション',
            'mail'        => 'メールアドレス',
            'gender_id'   => '性別',
        ]);

        try {
            $employee->update($validated);
            return view('employee.result', ['message' => 'データを更新しました']);
        } catch (\Exception $e) {
            return view('employee.result', ['message' => 'データ更新に失敗しました']);
        }
    }

    // 社員削除処理
    public function destroy($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();
            return view('employee.result', ['message' => 'データを削除しました']);
        } catch (\Exception $e) {
            return view('employee.result', ['message' => 'データ削除に失敗しました']);
        }
    }
}
