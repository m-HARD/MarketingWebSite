@extends('layouts.app')

@section('content')
    <div>
        <products :products="{{ $products }}"/>
    </div>
@endsection