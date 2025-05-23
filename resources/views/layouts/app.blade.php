<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', '社員名簿Web管理システム')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
      body { margin: 30px; font-family: sans-serif;}
      .error { color: red; }
      .form-group { margin-bottom: 1em; }
      .required { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <h1 style="margin-bottom:30px;">社員名簿Web管理システム（簡易版）</h1>
    @yield('content')
</body>
</html>