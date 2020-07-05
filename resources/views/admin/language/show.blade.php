@extends('layout.master')
@section('content')
@section('breadcrumb','show')
@section('page-header',"show : {$model->email}")

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

<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Languages</th>
        <th scope="col">


            <a class="btn btn-warning"  href="{{route('language.edit',$model->id)}}"><i class="fa fa-edit"></i></a>


            <form action="{{ URL::route('language.destroy', $model->id) }}" method="POST" style="display: inline-block" onclick="confirm('Delete this language will  remove related requests.Are you sure?')">
                @csrf
                @method('delete')

                <button class="btn btn-danger"  type="submit"><i class="fa fa-trash"></i></button>



            </form>
        </th>



    </tr>
    </thead>
    <tbody>

    <tr>
        <th scope="row">Name :</th>
        <td>{{$model->name??null}}</td>

    </tr>


    </tbody>
</table>




@endsection
