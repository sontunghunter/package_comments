<?php
    $nav = $comments->toArray();
    $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
?>

@foreach($comments as $comment)
<!-- START: Comment -->
    <div class="nk-comment">
        <div class="nk-comment-meta">
            <img src="comments/img/avatar.png" alt="{!! $comment->user_id !!}" class="img-circle" width="35"> by <a href="#">{!! $comment->user_id !!}</a> in 20 September, 2016
            <a href="#" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 pull-right">Reply</a>
        </div>
        <div class="nk-comment-text">
            <p>{!! $comment->comment_content !!}</p>
        </div>
    </div>                    
<!-- END: Comment -->
@endforeach