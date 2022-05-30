@extends('layouts.form')

@section('form')
    <nav class="panel panel-default">
        <div class="panel-heading">完了</div>
        <div class="panel-body">
        口座情報を変更しました
    </div>
    <a href="{{ route('mypage') }}">マイページへ</a>
  </nav>
@endsection
