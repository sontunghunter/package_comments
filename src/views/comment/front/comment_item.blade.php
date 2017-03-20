<?php
    $nav = $comments->toArray();
    $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
?>

@foreach($comments as $comment)
<!-- START: Comment -->
    @if ($comment->comment_id_parrent == 0)
        <div class="nk-comment">
            <div class="nk-comment-meta">
                <img src="comments/img/avatar.png" alt="{!! $comment->user_id !!}" class="img-circle" width="35"> by <a href="#">{!! $comment->user_id !!}</a> in 20 September, 2016
                <div id ="btnClick" class=" nk-btn nk-btn-rounded nk-btn-color-dark-3 pull-right">Reply</div>
            </div>
            <div class="nk-comment-text">
                <p>{!! $comment->comment_content !!}</p>
            </div>
                @foreach($comments as $parent)
                    @if ($parent->comment_id_parrent == $comment->comment_id)
                    ---------------------------------
                        <div class="nk-comment">
                            <div class="nk-comment-meta">
                                <img src="comments/img/avatar.png" alt="{!! $comment->user_id !!}" class="img-circle" width="35"> by <a href="#">{!! $parent->user_id !!}</a> in 20 September, 2016
                            </div>
                            <div class="nk-comment-text">
                                <p>{!! $parent->comment_content !!}</p>
                            </div>
                        </div>           
                    @endif
                @endforeach
        </div>                    
    @endif
<!-- END: Comment -->
@endforeach