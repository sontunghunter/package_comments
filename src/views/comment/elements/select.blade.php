<!-- CATEGORY LIST -->
<div class="form-group">

    <?php $comment_title = $request->get('comment_title') ? $request->get('comment_title') : @$comment->comment_title;
    
   	?>

    {!! Form::label('comment_title', trans('comment::comment_admin.comment_title').':') !!}
</div>
<!-- /CATEGORY LIST -->