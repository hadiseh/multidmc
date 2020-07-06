@extends('layout.master')
@section('content')
@section('breadcrumb','show')
@section('page-header',"show : {$model->email}")



@if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @php
        session()->forget('error')
    @endphp
@endif

<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Request</th>
        <th scope="col">


            <a class="btn btn-warning"  href="{{route('demand.edit',$model->id)}}"><i class="fa fa-edit"></i></a>

            <a href="{{ route('demand.status',[$model->id,'active']) }}">
                <button type="button" class="btn btn-success">Active</button>
            </a>

            <a href="{{ route('demand.status',[$model->id,'inactive']) }}">

                <button type="button" class="btn btn-danger">Inactive</button>

            </a>
        </th>

    </tr>
    </thead>
    <tbody>

    <tr>
        <th scope="row">Name :</th>
        <td>{{$model->name??null}}</td>

    </tr>
    <tr>
        <th scope="row">Website :</th>
        <td>{{$model->website??null}}</td>

    </tr>
    <tr>
        <th scope="row">Address :</th>
        <td>{{$model->address??null}}</td>

    </tr>
    <tr>
        <th scope="row">Telephone number :</th>
        <td>{{$model->telephone??null}}</td>

    </tr>
    <tr>
        <th scope="row">Phone number :</th>
        <td>{{$model->phone??null}}</td>

    </tr>
    <tr>
        <th scope="row">Telegram Id :</th>
        <td>{{$model->telegram_id??null}}</td>

    </tr>
    <tr>
        <th scope="row">WhatsApp Account :</th>
        <td>{{$model->whats_app_account??null}}</td>

    </tr>
    <tr>
        <th scope="row">Email address:</th>
        <td>{{$model->email??null}}</td>

    </tr>
    <tr>
        <th scope="row">Language :</th>
        <td>{{$language_name??null}}</td>

    </tr>

    <tr>
        <th scope="row">Description :</th>
        <td>{{$model->description??null}}</td>

    </tr>
    <tr>
        <th scope="row">status :</th>
        <td>{{$model->status??null}}</td>

    </tr>

    </tbody>
</table>




@endsection
