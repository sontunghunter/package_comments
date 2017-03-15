<!-- POST NAME -->
<div class="form-group">
	<!-- GET DATA IF EXIST -->
    <?php 
    // GET POST TITLE
    $comment_title = $request->get('comment_title') ? $request->get('comment_title') : @$comment->comment_title;

    /*======================================================================*/
    // GET POST OVERVIEW
    $comment_overview = $request->get('comment_overview') ? $request->get('comment_overview') : @$comment->comment_overview;
    
    /*======================================================================*/
    // GET POST DESCRIPTION
    $comment_description = $request->get('comment_description') ? $request->get('comment_description') : @$comment->comment_description;
    
    /*======================================================================*/
    // GET POST NOTES
    $comment_notes = $request->get('comment_notes') ? $request->get('comment_notes') : @$comment->comment_notes;
    
    ?>

    <!--===================================================================-->
    <!--===================================================================-->
    <!-- CREATE FORM -->
    <!--===================================================================-->

    <!-- CREATE TEXT TITLE -->
    {!! Form::label($title, trans('comment::comment_admin.title').':') !!}
    {!! Form::text($title, $comment_title, ['class' => 'form-control', 'placeholder' => trans('comment::comment_admin.title').'']) !!}

    <!--===================================================================-->
    <!-- CREATE TEXT OVERVIEW -->
    {!! Form::label($overview, trans('comment::comment_admin.overview').':') !!}
    {!! Form::text($overview, $comment_notes, ['class' => 'form-control', 'placeholder' => trans('comment::comment_admin.overview').'']) !!}
    
    <!--===================================================================-->
    <!-- CREATE TEXT DESCRIPTION -->
    {!! Form::label($description, trans('comment::comment_admin.description').':') !!}
    {!! Form::text($description, $comment_description, ['class' => 'form-control', 'placeholder' => trans('comment::comment_admin.description').'']) !!}
    
    <!--===================================================================-->
    <!-- CREATE TEXT NOTES -->
    {!! Form::label($notes, trans('comment::comment_admin.notes').':') !!}
    {!! Form::text($notes, $comment_notes, ['class' => 'form-control', 'placeholder' => trans('comment::comment_admin.notes').'']) !!}
    
    <!--===================================================================-->

</div>
<!-- /POST NAME -->