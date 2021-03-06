
@section('title')
Admin area: {{ trans('comment::comment_admin.page_edit') }}
@stop
@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                        {!! !empty($comment->comment_id) ? '<i class="fa fa-pencil"></i>'.trans('comment::comment_admin.form_edit') : '<i class="fa fa-users"></i>'.trans('comment::comment_admin.form_add') !!}
                    </h3>
                </div>
                
                <!-- ERRORS NAME  -->
                {{-- model general errors from the form --}}
                
                @if($errors->has('comment_title') )
                    <div class="alert alert-danger">{!! $errors->first('comment_title') !!}</div>
                @endif
                <!-- /END ERROR NAME -->
                
                <!-- LENGTH NAME  -->
                @if($errors->has('name_unvalid_length') )
                    <div class="alert alert-danger">{!! $errors->first('name_unvalid_length') !!}</div>
                @endif
                <!-- /END LENGTH NAME -->

                {{-- successful message --}}
                <?php $message = Session::get('message'); ?>
                @if( isset($message) )
                <div class="alert alert-success">{{$message}}</div>
                @endif

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <!-- POST ID -->
                            <h4>{!! trans('comment::comment_admin.form_heading') !!}</h4>
                            {!! Form::open(['route'=>['admin_comment.up_comment', 'id' => @$comment->comment_id],  'files'=>true, 'method' => 'comment'])  !!}

                            <!--END POST ID  -->

                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#home">
                                        {!! trans('comment::comment_admin.tab_overview') !!}
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">

                                <!--TEMPLATE OVERVIEW-->
                                <div id="home" class="tab-pane fade in active">
                                    
                                    <!-- POST TEXT-->
                                    @include('comment::comment.elements.text', [
                                    'content' => 'comment_content',
                                    'user_id' => 'comment_user_id',
                                    'id_parrent' => 'comment_id_parrent',
                                    'post_id' => 'comment_post_id'])
                                    <!-- /END POST TEXT -->

                                </div>
                            </div>

                            
                            {!! Form::hidden('id',@$comment->comment_id) !!}

                            <!-- DELETE BUTTON -->
                            <a href="{!! URL::route('admin_comment.delete',['id' => @$comment->id, '_token' => csrf_token()]) !!}"
                               class="btn btn-danger pull-right margin-left-5 delete">
                                Delete
                            </a>
                            <!-- DELETE BUTTON -->

                            <!-- SAVE BUTTON -->
                            {!! Form::submit('Save', array("class"=>"btn btn-info pull-right ")) !!}
                            <!-- /SAVE BUTTON -->

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='col-md-4'>
            @include('comment::comment.admin.comment_search')
        </div>

    </div>
</div>
@stop