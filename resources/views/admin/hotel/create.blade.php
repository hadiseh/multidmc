@extends('layout.master')
@php
    $action = request()->route()->getActionMethod();
@endphp
@section('content')
@section('breadcrumb',"{$action}")
@if($action == 'edit' || $action == 'update' || $action == 'show' )
    @section('page-header',"{$action} : {$model->email}")
@else
    {{--    for create and store actions--}}
    @section('page-header',"{$action} new request")

@endif


<div class="container">

    @if(session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @php
            session()->forget('error')
        @endphp
    @endif

        @if (isset($errors) && $errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form
        action="@if($action == 'edit'){{route('demand.update',['demand'=>$model->id])}}@else{{ route('demand.store') }}@endif"
        method="post">
        @csrf
        @if($action == 'update' || $action == 'edit')
            @method('PUT')
        @endif

        <div class="form-group">

            <div class=" row">

                <div class="col-sm-6">
                    <label for="exampleInputEmail1">Client Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter ClientName"
                           value="{{ $model->name ?? null }}">
                </div>
                <div class="col-sm-6">
                    <label for="exampleInputEmail1">Client Website:</label>
                    <input type="text" class="form-control" name="website" placeholder="Enter ClientWebsite"
                           value="{{ $model->website ?? null }}">
                </div>

            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Client Address:</label>
            <input type="text" class="form-control" name="address" placeholder="Enter ClientAddress"
                   value="{{ $model->address ?? null }}">

        </div>

        <div class="form-group">

            <div class=" row">

                <div class="col-sm-6">
                    <label for="exampleInputEmail1">Telephone number:</label>
                    <div class="row">
                        <div class="col-md-2"><input type="text" class="form-control" name="telephone_code"
                                                     minlength="1" pattern="[0-9]*" required
                                                     placeholder="+98" value="{{ $model->telephone_code ?? 98}}">
                        </div>
                        <div class="col-md-10"><input type="text" class="form-control" name="telephone" minlength="1"
                                                      pattern="[0-9]*" required
                                                      placeholder="Enter TelephoneNumber"
                                                      value="{{ $model->telephone ?? null }}">
                        </div>
                    </div>

                </div>
                <div class="col-sm-6">
                    <label for="exampleInputEmail1">Phone number:</label>
                    <div class="row">
                        <div class="col-md-2"><input type="text" class="form-control" name="phone_code" minlength="1"
                                                     pattern="[0-9]*" required
                                                     placeholder="21" value="{{ $model->phone_code ?? 21}}">
                        </div>
                        <div class="col-md-10"><input type="text" class="form-control" name="phone" minlength="1"
                                                      pattern="[0-9]*" required
                                                      placeholder="Enter PhoneNumber"
                                                      value="{{ $model->phone ?? null}}"></div>
                    </div>

                </div>

            </div>

        </div>

        <div class="form-group">

            <div class=" row">

                <div class="col-sm-6">
                    <label for="exampleInputEmail1">Telegram Id:</label>
                    <input type="text" class="form-control" name="telegram_id" placeholder="Enter TelegramId"
                           value="{{ $model->telegram_id ?? null}}">
                </div>
                <div class="col-sm-6">
                    <label for="exampleInputEmail1">WhatsApp Account:</label>
                    <input type="text" class="form-control" name="whats_app_account" placeholder="Enter WhatsAppAccount"
                           value="{{ $model->whats_app_account ?? null}}">
                </div>

            </div>

        </div>


        <div class="form-group">

            <div class=" row">

                <div class="col-sm-6">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email" required
                           value="{{ $model->email ?? null}}">
                </div>
                <div class="col-sm-6">

                    <div class="form-group">
                        <label for="select-language">Select Language</label>
                        <select class="form-control" style="height: 45px" name="language_id" required>
                            <option value="">selected</option>
                            @if($language_name)
                                @foreach($language_name as $ln)

                                    <option value="{{$ln->id}}"

                                    @if(isset($model) && $ln->id == $model->language_id)
                                        selected
                                        @endif

                                    >{{$ln->name}}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>

                </div>

            </div>

        </div>


        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="" cols="30"
                      rows="5">{{ $model->description ?? null}}</textarea>
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
