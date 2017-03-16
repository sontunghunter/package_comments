<?php 
namespace Group\Comment\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Group\Comment\Models\Comments;
use Group\Comment\Controllers\Front\Controllers;
use URL,
    Route,
    Redirect;


class CommentFrontController extends Controller
{

    public $data = array();
    public function __construct() {
        $this->obj_comment = new Comments();
    }

    public function index(Request $request)
    {
        return view('comment::comment.front.comment_index');
    }

    public function add(Request $request)
    {
        //var_dump($request->get('comment_content'));die();
        $input = $request->all();

        $comment_id = (int) $request->get('comment_id');

        $comment = NULL;

        $data = array();

        $obj_comment = new Comments();

        $comment = $this->obj_comment->add_comment($input);
        var_dump($comment);die();
        
        $this->data_view = array_merge($this->data_view, array(
            'comment' => $comment,
            'request' => $request,
        ), $data);


        return view('comment::comment.front.comment_index', $this->data);
    }
}