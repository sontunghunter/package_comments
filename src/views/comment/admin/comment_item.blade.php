<!--ADD SAMPLE CATEGORY ITEM-->
<div class="row margin-bottom-12">
    <div class="col-md-12">
        <a href="{!! URL::route('admin_comment.edit') !!}" class="btn btn-info pull-right">
            <i class="fa fa-plus"></i>{{trans('comment::comment_admin.comment_add_button')}}
        </a>
    </div>
</div>
<!--/END ADD SAMPLE CATEGORY ITEM-->

@if( ! $comments->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td style='width:5%'>
                {{ trans('comment::comment_admin.order') }}
            </td>

            <th style='width:10%'>
                {{ trans('comment::comment_admin.comment_id') }}
            </th>

            <th style='width:25%'>
                {{ trans('comment::comment_admin.comment_title') }}
            </th>
            
            <th style='width:10%'>
                {{ trans('comment::comment_admin.user_id') }}
            </th>

            <th style='width:10%'>
                {{ trans('comment::comment_admin.user_id_assigned') }}
            </th>

            <th style='width:10%'>
                {{ trans('comment::comment_admin.user_id_reviewer') }}
            </th>

            <th style='width:10%'>
                {{ trans('comment::comment_admin.operations') }}
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
            $nav = $comments->toArray();
            $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($comments as $comment)
        <tr>
            <!--COUNTER-->
            <td>
                <?php echo $counter; $counter++ ?>
            </td>
            <!--/END COUNTER-->

            <!--POST ID-->
            <td>
                {!! $comment->comment_id !!}
            </td>
            <!--/END POST ID-->

            <!--POST TITLE-->
            <td>
                {!! $comment->comment_title !!}
            </td>
            <!--/END POST TITLE-->

            <!--USER ID-->
            <td>
                {!! $comment->user_id !!}
            </td>
            <!--/END USER ID-->

            <!--ASSIGNED ID-->
            <td>
                {!! $comment->user_id_assigned !!}
            </td>
            <!--/END ASSIGNED ID-->

            <!--REVIEWER ID-->
            <td>
                {!! $comment->user_id_reviewer !!}
            </td>
            <!--/END REVIEWER ID-->

            <!--OPERATOR-->
            <td>
                <a href="{!! URL::route('admin_comment.edit', ['id' => $comment->comment_id]) !!}">
                    <i class="fa fa-edit fa-2x"></i>
                </a>
                <a href="{!! URL::route('admin_comment.delete',['id' =>  $comment->comment_id, '_token' => csrf_token()]) !!}"
                   class="margin-left-5 delete">
                    <i class="fa fa-trash-o fa-2x"></i>
                </a>
                <span class="clearfix"></span>
            </td>
            <!--/END OPERATOR-->
        </tr>
        @endforeach
    </tbody>
</table>
@else
    <!-- FIND MESSAGE -->
    <span class="text-warning">
        <h5>
            {{ trans('comment::comment_admin.message_find_failed') }}
        </h5>
    </span>
    <!-- /END FIND MESSAGE -->
@endif
<div class="paginator">
    {!! $comments->appends($request->except(['page']) )->render() !!}
</div>