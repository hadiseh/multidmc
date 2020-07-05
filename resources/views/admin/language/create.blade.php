@extends('layout.master')
@php
    $action = request()->route()->getActionMethod();
@endphp
@section('content')
@section('breadcrumb',"{$action}")
@if($action == 'edit' || $action == 'update' || $action == 'show' )
    @section('page-header',"{$action} : {$model->name}")
@else
{{--    for create and store actions--}}
    @section('page-header',"{$action} new language")

@endif


<div class="container">


    @if (isset($errors) && $errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@if(session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @php
            session()->forget('error')
        @endphp
    @endif


    <form action="@if($action == 'edit'){{route('language.update',['language'=>$model->id])}}@else{{ route('language.store') }}@endif" method="post">
        @csrf
        @if($action == 'update' || $action == 'edit')
         @method('PUT')
        @endif


        <div class="form-group">
            <label for="exampleInputEmail1">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" required
                   value="{{ $model->name ?? null }}">

        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary">

                @if($action == 'edit' || $action == 'update' || $action == 'show' )
                        Update
                @else
{{--                    for create and store actions--}}
                        Submit
                @endif

                </button>
        </div>

    </form>
</div>


@endsection
