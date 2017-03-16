@extends('laravel-authentication-acl::client.layouts.base')
@section('content')

{{ Form::open(['route'=>'comment.add', 'method' => 'get']) }}

{!! Form::label('User Id') !!}
{{ Form::text('user_id', null, ['class' => 'form-control', 'placeholder' => 'User Id']) }}

{!! Form::label('Post Id') !!}
{{ Form::text('post_id', null, ['class' => 'form-control', 'placeholder' => 'Post Id']) }}

{!! Form::label('Comment') !!}
{{ Form::textarea('comment_content', null, ['class' => 'form-control', 'placeholder' => 'Comment']) }}

{{ Form::submit('Submit')}}


{{ Form::close() }}

@stop