<div class="form-group">
    <?php $comment_name = $request->get('comment_titlename') ? $request->get('comment_name') : @$comment->comment_name ?>


    {!! Form::label($name, trans('comment::comment_admin.post_name').':') !!}

    {!! Form::select($name, @$posts, @$posts->post_id, ['class' => 'form-control']) !!}

</div>