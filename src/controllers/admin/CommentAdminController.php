<?php namespace Group\Comment\Controllers\Admin;

use Illuminate\Http\Request;
use Group\Comment\Controllers\Admin\Controllers;
use URL;
use Route,
    Redirect;
use Group\Comment\Models\Comments;
use Group\Comment\Models\Users;

/**
 * Validators
 */
use Group\Comment\Validators\CommentAdminValidator;

class CommentAdminController extends Controllers {

    public $data_view = array();

    private $obj_comment = NULL;
    private $obj_users = NULL;

    private $obj_validator = NULL;

    public function __construct() {
        $this->obj_comment = new Comments();
    }

    /**
     *
     * @return type
     */
    public function index(Request $request) {

         $params =  $request->all();

        $list_comment = $this->obj_comment->get_comments($params);

        $this->data_view = array_merge($this->data_view, array(
            'comments' => $list_comment,
            'request' => $request,
            'params' => $params
        ));
        return view('comment::comment.admin.comment_list', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function edit(Request $request) {

        $comment = NULL;
        $comment_id = (int) $request->get('id');
        if (!empty($comment_id) && (is_int($comment_id))) {
            $comment = $this->obj_comment->find($comment_id);

        }
        $obj_users = new Users;


        $this->data_view = array_merge($this->data_view, array(
            'comment' => $comment,
            'request' => $request,
            'users' => $this->obj_users->pluckSelect()
        ));
        var_dump($this->data_view);die();
        
        return view('comment::comment.admin.comment_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function up_comment(Request $request) {
        $this->obj_validator = new commentAdminValidator();

        $input = $request->all();

        $comment_id = (int) $request->get('id');

        $comment = NULL;

        $data = array();
        if (!$this->obj_validator->validate($input)) {

            $data['errors'] = $this->obj_validator->getErrors();

            if (!empty($comment_id) && is_int($comment_id)) {

                $comment = $this->obj_comment->find($comment_id);
            }

        } else {
            if (!empty($comment_id) && is_int($comment_id)) {

                $comment = $this->obj_comment->find($comment_id);

                if (!empty($comment)) {

                    $input['comment_id'] = $comment_id;
                    $comment = $this->obj_comment->update_comment($input);

                    //Message
                    $this->addFlashMessage('message', trans('comment::comment_admin.message_update_successfully'));
                    return Redirect::route("admin_comment.edit", ["id" => $comment->comment_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('comment::comment_admin.message_update_unsuccessfully'));
                }
            } else {

                $comment = $this->obj_comment->add_comment($input);

                if (!empty($comment)) {

                    //Message
                    $this->addFlashMessage('message', trans('comment::comment_admin.message_add_successfully'));
                    return Redirect::route("admin_comment.edit", ["id" => $comment->comment_id]);
                } else {

                    //Message
                    $this->addFlashMessage('message', trans('comment::comment_admin.message_add_unsuccessfully'));
                }
            }
        }

        $this->data_view = array_merge($this->data_view, array(
            'comment' => $comment,
            'request' => $request,
        ), $data);

        return view('comment::comment.admin.comment_edit', $this->data_view);
    }

    /**
     *
     * @return type
     */
    public function delete(Request $request) {

        $comment = NULL;
        $comment_id = $request->get('id');

        if (!empty($comment_id)) {
            $comment = $this->obj_comment->find($comment_id);

            if (!empty($comment)) {
                  //Message
                $this->addFlashMessage('message', trans('comment::comment_admin.message_delete_successfully'));

                $comment->delete();
            }
        } else {

        }

        $this->data_view = array_merge($this->data_view, array(
            'comment' => $comment,
        ));

        return Redirect::route("admin_comment");
    }

}