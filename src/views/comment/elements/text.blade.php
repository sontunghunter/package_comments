<!-- POST NAME -->
<div class="form-group">
	<!-- GET DATA IF EXIST -->
    <?php 
    // GET POST TITLE
    $comment_content = $request->get('comment_content') ? $request->get('comment_content') : @$comment->comment_content;

    /*======================================================================*/
    // GET POST OVERVIEW
    $user_id = $request->get('user_id') ? $request->get('user_id') : @$comment->user_id;
    
    /*======================================================================*/
    // GET POST DESCRIPTION
    $id_parrent = $request->get('comment_id_parrent') ? $request->get('comment_id_parrent') : @$comment->id_parrent;
    
    /*======================================================================*/
    // GET POST NOTES
    $post_id = $request->get('post_id') ? $request->get('post_id') : @$comment->post_id;
    
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
    {!! Form::label($user_id, trans('comment::comment_admin.user_id').':') !!}
    {!! Form::text($user_id, $user_id, ['class' => 'form-control', 'placeholder' => trans('comment::comment_admin.user_id').'']) !!}
    
    <!--===================================================================-->
    <!-- CREATE TEXT DESCRIPTION -->
    {!! Form::label($id_parrent, trans('comment::comment_admin.id_parrent').':') !!}
    {!! Form::text($id_parrent, $id_parrent, ['class' => 'form-control', 'placeholder' => trans('comment::comment_admin.id_parrent').'']) !!}
    
    <!--===================================================================-->
    <!-- CREATE TEXT NOTES -->
    {!! Form::label($post_id, trans('comment::comment_admin.post_id').':') !!}
    {!! Form::text($post_id, $post_id, ['class' => 'form-control', 'placeholder' => trans('comment::comment_admin.post_id').'']) !!}
    
    <!--===================================================================-->

</div>
<!-- /POST NAME -->