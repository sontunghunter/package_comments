<?php

namespace Group\Comment\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model {

    protected $table = 'comments';
    public $timestamps = false;
    protected $fillable = [
        'comment_content',
        'comment_id_parrent',
        'user_id',
        'comment_date',
        'comment_status',
        'post_id'
    ];
    protected $primaryKey = 'comment_id';

    /**
     *
     * @param type $params
     * @return type
     */
    public function get_comments($params = array()) {
        $eloquent = self::orderBy('comment_id');

        //comment_content
        if (!empty($params['comment_content'])) {
            $eloquent->where('comment_content',
        'like',
        '%'. $params['comment_content'].'%');
        }

        $comments = $eloquent->paginate(10);//TODO: change number of item per page to configs

        return $comments;
    }



    /**
     *
     * @param type $input
     * @param type $comment_id
     * @return type
     */
    public function update_comment($input,
        $comment_id = NULL) {

        if (empty($comment_id)) {
            $comment_id = $input['comment_id'];
        }

        $comment = self::find($comment_id);

        if (!empty($comment)) {

            $comment->comment_content = $input['comment_content'];
            $comment->comment_id_parrent = $input['comment_id_parrent'];
            $comment->user_id = $input['user_id'];
            $comment->comment_date = $input['comment_date'];
            $comment->comment_status = $input['comment_status'];
            $comment->post_id = $input['post_id'];
            
            $comment->save();

            return $comment;
        } else {
            return NULL;
        }
    }

    /**
     *
     * @param type $input
     * @return type
     */
    public function add_comment($input) {

        $comment = self::create([
            'comment_content' => $input['comment_content'],
            'comment_id_parrent' => $input['comment_id_parrent'],
            'user_id' => $input['user_id'],
            'comment_date' => $input['comment_date'],
            'comment_status'=> $input['comment_status'],
            'post_id' => $input['post_id'],
        ]);
        return $comment;
    }
}
