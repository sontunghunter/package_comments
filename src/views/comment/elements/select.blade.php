<!-- CATEGORY LIST -->
<div class="form-group">

    <?php $comment_title = $request->get('comment_title') ? $request->get('comment_title') : @$comment->comment_title;
    
   	?>

    {!! Form::label('comment_title', trans('comment::comment_admin.comment_title').':') !!}
    {!! Form::select('comment_title', @$comments, @$comment->comment_title, ['class' => 'form-control'])!!}
</div>
<!-- /CATEGORY LIST -->