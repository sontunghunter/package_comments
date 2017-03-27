<?php
    $nav = $comments->toArray();
    $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
?>

@foreach($comments as $comment)
<!-- START: Comment -->
    @if ($comment->comment_id_parrent == 0)

        <div class="nk-comment">
            <div class="nk-comment-meta">
                <img src="comments/img/avatar.png" alt="{!! $comment->name !!}" class="img-circle" width="35"> by <a href="#">{!! $comment->name !!}</a> in {{$comment->comment_date}}
                <div class="btnClick nk-btn nk-btn-rounded nk-btn-color-dark-3 pull-right" onclick="reply_click({{$comment->comment_id}})">Reply</div>
            </div>
            <div class="nk-comment-text">
                <p>{!! $comment->comment_content !!}</p>
            </div>
            @foreach($comments as $parent)
                @if ($parent->comment_id_parrent == $comment->comment_id)
                    <div class="nk-comment">
                        <div class="nk-comment-meta">
                            <img src="comments/img/avatar.png" alt="{!! $comment->name !!}" class="img-circle" width="35"> by <a href="#">{!! $parent->name !!}</a> in {{$parent->comment_date}}
                        </div>
                        <div class="nk-comment-text">
                            <p>{!! $parent->comment_content !!}</p>
                        </div>
                    </div>           
                @endif
            @endforeach
            <div id="reply_form_{{$comment->comment_id}}" style="display: none">
                {{ Form::open(['route'=>'comment.add', 'method' => 'get']) }}

                    {{ Form::textarea('comment_content', null, ['class' => 'form-control required', 'placeholder' => 'Comment']) }}
                    <div style="float: right; padding-top: 15px;">
                        {{ Form::submit('Post Comment', ['class' => 'nk-btn nk-btn-rounded nk-btn-color-main-1'])}}
                    </div>
                {{ Form::hidden("user_id", 2) }}
                {{ Form::hidden("post_id", 1) }}
                {{ Form::hidden("parent_id", $comment->comment_id) }}
                {{ Form::hidden("status_id", 1) }}
                {{ Form::hidden("comment_date", date('M d, Y')) }}
                {{ Form::close() }}
            </div>
        </div>                    
    @endif
<!-- END: Comment -->
@endforeach