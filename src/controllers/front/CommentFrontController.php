<?php namespace Group\Comment\Controllers\Front;

use Illuminate\Http\Request;
use Group\Comment\Controllers\Front\Controllers;
use URL;
use Route,
    Redirect;
use Group\Comment\Models\Comments;
use Group\Comment\Models\Users;

/**
 * Validators
 */
use Group\Comment\Validators\CommentFrontValidator;

class CommentFrontController extends Controllers {

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

        return view('comment::comment.front.comment_index', $this->data_view);
    }
    /**
     *
     * @return type
     */
    public function add(Request $request) {
        $this->obj_validator = new commentFrontValidator();

        $input = $request->all();
        $comment_content = $request->get('comment_content');

        $comment = NULL;

        $data = array();
        if (!$this->obj_validator->validate($input)) {
            $data['errors'] = $this->obj_validator->getErrors();

            if (empty($comment_content)) {

                $this->addFlashMessage('message', trans('comment::comment_front.message_add_unsuccessfully'));
                return Redirect::route("comment");
            }

        } else {
            $comment = $this->obj_comment->add_comment($input);

            if (!empty($comment)) {
                //Message
                $this->addFlashMessage('message', trans('comment::comment_front.message_add_successfully'));
                return Redirect::route("comment");
            } else {
                //Message
                $this->addFlashMessage('message', trans('comment::comment_front.message_add_unsuccessfully'));
                return Redirect::route("comment");
            }
        }
    }
}