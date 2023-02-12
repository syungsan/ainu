@extends('layouts.frame')
@section('content')
    <h1 class="page-heading">ホーム</h1>
    <p>ようこそ、{{ Auth::user()->name }}さん</p>
    <p>ユーザのステータスによって追加アプリが選べたり選べなかったりするようにします？</p>

    <p><a href="{{ url('/ainu01/ainu_1') }}">アイヌ語クイズアプリ（入門編）</a></p>

    @if (Auth::user()->status->extend_app_enable == true)
        <p><a href="{{ url('/ainu02/ainu_2') }}">アイヌ語クイズアプリ（応用編）</a></p>
    @else
        <p><s>アイヌ語クイズアプリ（応用編）</s>=> 入門編をクリアするとプレイできます。</p>
    @endif
@endsection()
