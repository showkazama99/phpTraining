<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';

    protected $fillable = [
        'employee_id',
        'family_name',
        'first_name',
        'section_id',
        'mail',
        'gender_id',
    ];

    // ▼▼ ここを必ず追加 ▼▼
    public const SECTION = [
        1 => '組織０１',
        2 => '組織０２',
        3 => '組織０３',
    ];

    public const GENDER = [
        1 => '男性',
        2 => '女性',
    ];
    // ▲▲▲▲▲▲▲▲▲▲▲▲▲

    // フルネーム（姓＋名）
    public function getFullNameAttribute()
    {
        return $this->family_name . ' ' . $this->first_name;
    }
}