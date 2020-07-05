@extends('layout.master')
@section('content')
@section('breadcrumb','Index')
@section('page-header','Index')


<div style="margin-bottom: 30px">

    <a href="{{ route('language.create') }}">
        <button type="button" class="btn btn-primary">create new language</button>
    </a>
</div>


<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
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
                <td>{{ $items->name}}</td>


                <td>


                    <div class="form-group">


                        <a class="btn btn-info"  href="{{route('language.show',$items->id) }}"><i class="fa fa-eye"></i></a>

                        <a class="btn btn-warning"  href="{{route('language.edit',$items->id)}}"><i class="fa fa-edit"></i></a>

                        <form action="{{ URL::route('language.destroy', $items->id) }}" method="POST" style="display: inline-block" onclick="return confirm('Delete this language will  remove related requests.Are you sure?')">
                            @csrf
                            @method('delete')

                            <button class="btn btn-danger"  type="submit"><i class="fa fa-trash"></i></button>



                        </form>
                    </div>




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
