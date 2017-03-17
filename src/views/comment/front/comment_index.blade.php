@extends('laravel-authentication-acl::client.layouts.base')
@section('content')

{{ Form::open(['route'=>'comment.add', 'method' => 'get']) }}


{!! Form::label('Comment') !!}
{{ Form::textarea('comment_content', null, ['class' => 'form-control', 'placeholder' => 'Comment']) }}

{{ Form::submit('Submit')}}


{{ Form::close() }}

@stop