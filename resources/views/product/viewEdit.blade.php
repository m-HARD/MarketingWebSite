@extends('layouts.app')

@section('header')
    <style>
        
    </style>
@endsection
@section('content')
    <view-edit-product :product="{{ $product }}" :editing="{{ $editing }}"></view-edit-product>
@endsection