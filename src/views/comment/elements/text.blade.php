<!-- POST NAME -->
<div class="form-group">
	<!-- GET DATA IF EXIST -->
    <?php 
    // GET POST TITLE
    $comment_content = $request->get('comment_content') ? $request->get('comment_content') : @$comment->comment_content;

    /*======================================================================*/
    // GET POST OVERVIEW
    $comment_user_id  = $request->get('comment_user_id ') ? $request->get('comment_user_id ') : @$comment->comment_user_id ;
    
    /*======================================================================*/
    // GET POST DESCRIPTION
    $comment_id_parrent = $request->get('comment_id_parrent') ? $request->get('comment_id_parrent') : @$comment->comment_id_parrent;
    
    /*======================================================================*/
    // GET POST NOTES
    $comment_post_id = $request->get('comment_post_id') ? $request->get('comment_post_id') : @$comment->comment_post_id;
    
    ?>

    <!--===================================================================-->
    <!--===================================================================-->
    <!-- CREATE FORM -->
    <!--===================================================================-->

    <!-- CREATE TEXT TITLE -->
    {!! Form::label($content, trans('comment::comment_admin.content').':') !!}
    {!! Form::text($content, $comment_content, ['class' => 'form-control', 'placeholder' => trans('comment::comment_admin.content').'']) !!}

    <!--===================================================================-->
    <!-- CREATE TEXT OVERVIEW -->
    {!! Form::label($id_parrent, trans('comment::comment_admin.id_parrent').':') !!}
    {!! Form::text($id_parrent, $comment_id_parrent, ['class' => 'form-control', 'placeholder' => trans('comment::comment_admin.id_parrent').'']) !!}

    <!--===================================================================-->
    <!-- CREATE TEXT DESCRIPTION -->
    {!! Form::label($user_id, trans('comment::comment_admin.user_id').':') !!}
    {!! Form::text($user_id, $comment_user_id, ['class' => 'form-control', 'placeholder' => trans('comment::comment_admin.user_id').'']) !!}
    
    <!--===================================================================-->
    <!-- CREATE TEXT NOTES -->
    {!! Form::label($post_id, trans('comment::comment_admin.post_id').':') !!}
    {!! Form::text($post_id, $comment_post_id, ['class' => 'form-control', 'placeholder' => trans('comment::comment_admin.post_id').'']) !!}
    
    <!--===================================================================-->

</div>
<!-- /POST NAME -->