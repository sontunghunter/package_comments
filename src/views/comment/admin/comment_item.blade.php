@if( ! $comments->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>

            <th style='width:5%'>
                {{ trans('comment::comment_admin.comment_id') }}
            </th>

            <th style='width:25%'>
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
            <th style='width:20%'>
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
            <td>
                <a href="{!! URL::route('admin_comment.delete',['id' =>  $comment->comment_id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                <span class="clearfix"></span>
            </td>
            
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