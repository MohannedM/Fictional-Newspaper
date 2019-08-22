<?php 

add_action('rest_api_init', 'likeRoute');

function likeRoute(){
    register_rest_route('newspaper/v1', 'likes', [
       'methods'=>'POST',
       'callback'=>'createLike' 
    ]);

    register_rest_route('newspaper/v1', 'likes', [
        'methods'=>'DELETE',
        'callback'=>'removeLike' 
     ]);
}

function createLike($data){
    $postId = sanitize_text_field($data['post_id']);
    if(is_user_logged_in()){
        if($postId && get_post_type($postId) == 'post'){
            return wp_insert_post([
                'post_type'=>'like',
                'post_title'=>'Like',
                'post_status'=>'publish',
                'meta_input'=>[
                    'related_post_id'=>$postId
                ]
            ]);
        }else{
            die('Invalid Post ID!');
        }
    }
    die('Only logged in users can like posts!');
}

function removeLike($data){
    $likeId = sanitize_text_field($data['like_id']);
    if(is_user_logged_in()){
        if(get_post_field('post_author', $likeId) == get_current_user_id() && get_post_type($likeId) == 'like'){
            return wp_delete_post($likeId, true);
        }else{
            die('Invalid Like ID!');
        }
    }
    die('Only logged in users can remove like from posts!');
}
