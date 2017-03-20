
@if( ! $comments->isEmpty() )
<table class="table table-hover">
    <thead>
        
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
            
            <!--STATUS-->
            <td>
                {!! $comment->comment_status !!}
            </td>
            <!--/END STATUS-->

            <!--COMMENT DATE-->
            <td>
                {!! $comment->comment_date !!}
            </td>
            <!--/END COMMENT DATE-->
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