@extends('layouts.master')
@section('content')

<div class='container'> 

    <h4><i class='fa fa-user-plus'></i> Add User</h4>
    <hr>

    {{-- @include ('errors.list') --}}

    {{ Form::open(array('url' => 'user')) }}

    <div class="form-group">
    <div class="form-row">
            <div class="col-md-10">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>
    </div>

    <div class="form-group">
    <div class="form-row">
            <div class="col-md-10">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', '', array('class' => 'form-control')) }}
    </div>
    </div>
    <div class="form-group">
    <div class="form-row">
    <div class="col-md-10">
        {{ Form::label('password', 'Password') }}<br>
        {{ Form::password('password', array('class' => 'form-control')) }}

    </div>
    </div>

    <div class="form-group">
    <div class="form-row">
    <div class="col-md-10">
        {{ Form::label('password', 'Confirm Password') }}<br>
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

    </div>
    </div>
    <br>
    <div>
    {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
</div>

@endsection