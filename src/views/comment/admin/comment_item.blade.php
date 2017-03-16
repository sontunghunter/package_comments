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

            <th style='width:30%'>
                {{ trans('comment::comment_admin.comment_content') }}
            </th>
            
            <th style='width:10%'>
                {{ trans('comment::comment_admin.user_id') }}
            </th>

            <th style='width:15%'>
                {{ trans('comment::comment_admin.user_id_parrent') }}
            </th>

            <th style='width:10%'>
                {{ trans('comment::comment_admin.post_id') }}
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
                {!! $comment->comment_content !!}
            </td>
            <!--/END POST TITLE-->

            <!--USER ID-->
            <td>
                {!! $comment->user_id !!}
            </td>
            <!--/END USER ID-->

            <!--ASSIGNED ID-->
            <td>
                {!! $comment->comment_id_parrent !!}
            </td>
            <!--/END ASSIGNED ID-->

            <!--REVIEWER ID-->
            <td>
                {!! $comment->post_id !!}
            </td>
            <!--/END REVIEWER ID-->
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