@extends('layouts.app')

@section('content')
    <div>
        <home-page-show-item :products="{{ $products }}"></home-page-show-item>
    </div>
@endsection