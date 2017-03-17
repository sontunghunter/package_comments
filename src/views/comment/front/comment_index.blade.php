@extends('laravel-authentication-acl::client.layouts.base')
@section('content')

{{ Form::open(['route'=>'comment.add', 'method' => 'get']) }}


{!! Form::label('Comment') !!}
{{ Form::textarea('comment_content', null, ['class' => 'form-control', 'placeholder' => 'Comment']) }}
<div style="float: right; padding-top: 15px;">
	{{ Form::submit('Gửi')}}
</div>


{{ Form::close() }}

@stop