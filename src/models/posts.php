<?php

namespace Group\Comment\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model {

    protected $table = 'posts';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'user_id_assigned',
        'user_id_reviewer',
        'catelogy_id',
        'level_id',
        'status_id',
        'post_title',
        'post_overview',
        'post_description',
        'post_notes',
        'post_likes',
        'post_cache_page',
        'post_views',
        'post_attachment',
        'post_points'
    ];
    protected $primaryKey = 'post_id';


    public function pluckSelect($post_id = NULL) {
        if ($post_id) {
            $user = self::where('post_id', '!=', $post_id)
                    ->orderBy('post_title', 'ASC')
                ->pluck('post_title', 'post_id');
        } else {
            $user = self::orderBy('post_title', 'ASC')
                ->pluck('post_title', 'post_id');
        }
        return $user;
    }

}
