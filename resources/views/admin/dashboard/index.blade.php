@extends('layouts.app')

@section('content')
    <div class="col-sm-2">
        <dashboard-sidebar></dashboard-sidebar>
    </div>
    <div class="col-sm-10">
        <router-view></router-view>
    </div>
@endsection