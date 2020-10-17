@extends('layouts.default')

@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Post CRUD</h2>

        </div>

    </div>

</div>

@if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

@endif

<table class="table table-bordered">

    <tr>

        <th width="80px">No</th>

        <th>Title</th>

        <th>Content</th>

        <th width="140px" class="text-center">

            <a class="btn btn-success btn-sm" href="{{ route('posts.create') }}"><i class="glyphicon glyphicon-plus"></i></a>

        </th>

    </tr>

@foreach ($posts as $post)

<tr>

    <td>{{ ++$i }}</td>

    <td>{{ $post->title }}</td>

    <td>{{ $post->content }}</td>

    <td>

        <a class="btn btn-info btn-sm" href="{{ route('posts.show',$post->id) }}"><i class="glyphicon glyphicon-th-large"></i></a>

        <a class="btn btn-primary btn-sm" href="{{ route('posts.edit',$post->id) }}"><i class="glyphicon glyphicon-pencil"></i></a>

        {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}

        <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></button>

        {!! Form::close() !!}

    </td>

</tr>

@endforeach

</table>

{!! $posts->render() !!}

@endsection