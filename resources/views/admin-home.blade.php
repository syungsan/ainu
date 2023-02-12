@extends('layouts.frame')
@section('content')
    <h1 class="page-heading">管理者ページ</h1>
    <p>ようこそ、{{ Auth::user()->name }}さん</p>
    <p><a href="{{ url('/scores/ainu01') }}">アイヌ語クイズアプリ（入門編）スコア一覧</a></p>
    <p><a href="{{ url('/scores/ainu02') }}">アイヌ語クイズアプリ（応用編）スコア一覧</a></p>
@endsection()
