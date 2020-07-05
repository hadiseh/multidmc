@extends('layout.master')
@section('content')
@section('breadcrumb','Index')
@section('page-header','Index')


@if(session()->has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @php
        session()->forget('error')
    @endphp
@endif
<div style="margin-bottom: 30px">

    <a href="{{ route('demand.create') }}">
        <button type="button" class="btn btn-primary">create new request</button>
    </a>
</div>


<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">telephone</th>
        <th scope="col">phone</th>
        <th scope="col">email</th>
        <th scope="col">status</th>
        <th scope="col">actions</th>
    </tr>
    </thead>
    <tbody>

        @if($model)

    @php
        $count =1;
    @endphp
            @foreach($model as $items)
                <tr>
                <th scope="row">{{ $count }}</th>
                <td>{{ $items->telephone_code .'_'.$items->telephone }}</td>
                <td>{{ $items->phone_code .'_'.$items->phone }}</td>
                <td>{{ $items->email }}</td>
                <td
                @if($items->status == 'waiting')
                 style="color: #ff8c00"
                @elseif($items->status == 'active')
                style="color: #006400"
                @elseif($items->status == 'inactive')
                style="color: #8b0000"
                @endif
                >{{ $items->status}}</td>
                <td>


                    <a class="btn btn-info"  href="{{route('demand.show',$items->id)}}"><i class="fa fa-eye"></i></a>

                    <a href="{{ route('demand.status',[$items->id,'active']) }}">
                        <button type="button" class="btn btn-success">Active</button>
                    </a>

                    <a href="{{ route('demand.status',[$items->id,'inactive']) }}">

                        <button type="button" class="btn btn-danger">Inactive</button>

                    </a>



                </td>
                    @php
                        $count++;
                    @endphp
                </tr>
            @endforeach
        @endif


    </tbody>
</table>


@endsection
