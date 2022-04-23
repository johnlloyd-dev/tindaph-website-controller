@extends('layouts.app')
@section('content')
<router-view :testimony="{{ $testimony }}"></router-view>
@endsection
