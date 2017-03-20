
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i><?php echo trans('comment::comment_admin.page_search') ?></h3>
    </div>
    <div class="panel-body">

        {!! Form::open(['route' => 'admin_comment','method' => 'get']) !!}

        
         <!-- POST TITLE TEXT-->
        @include('comment::comment.elements.select', ['name' => 'post_title'])
        <!-- /END POST TITLE TEXT -->


        {!! Form::submit(trans('comment::comment_admin.search').'', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>




