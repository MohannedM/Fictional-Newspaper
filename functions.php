<?php 

require get_theme_file_path('/includes/likes-route.php');

add_action('wp_enqueue_scripts', 'news_files');

function news_files(){
    wp_enqueue_style('main_styles', get_stylesheet_uri());
    wp_enqueue_script('jquery', get_theme_file_uri('/js/jquery/jquery-2.2.4.min.js'), NULL, '2.2.4', true);
    wp_enqueue_script('bobberjs', get_theme_file_uri('/js/bootstrap/popper.min.js'), NULL, '1.0', true);
    wp_enqueue_script('bootstrap', get_theme_file_uri('/js/bootstrap/bootstrap.min.js'), NULL, '4.1', true);
    wp_enqueue_script('plugins', get_theme_file_uri('/js/plugins/plugins.js'), NULL, '1.0', true);
    wp_enqueue_script('active', get_theme_file_uri('/js/active.js'), NULL, '1.0', true);
    wp_localize_script('active', 'newsData', [
       'root_url'=>site_url('/'),
       'nonce'=>wp_create_nonce('wp_rest') 
    ]);
}

add_action('after_setup_theme', 'university_features');

function university_features(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('potrait', '255 ', '312', true);
    register_nav_menu('Main-Menu', 'mainMenu');
}


add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

add_action('login_enqueue_scripts', 'login_styles');

function login_styles(){
    wp_enqueue_style('main_styles', get_stylesheet_uri());
}

add_action('login_headertext', 'changeHeader');

function changeHeader(){
    return 'Fictional Magaznie';
}

add_action('login_headerurl', 'changeLink');

function changeLink(){
    return esc_url(site_url('/'));
}



add_action('wp_loaded', 'removeAdminBar');

function removeAdminBar(){
    $currentUser = wp_get_current_user();
    if(count($currentUser->roles) == 1 && $currentUser->roles[0] == 'subscriber'){
        show_admin_bar(false);
    }
}

add_action('admin_init', 'redirectToHome');

function redirectToHome(){
    $currentUser = wp_get_current_user();
    if(count($currentUser->roles) == 1 && $currentUser->roles[0] == 'subscriber'){
        wp_redirect(esc_url(site_url('/')));
    }
}

function likesOfPost($post_id){
    $likesOfPost = new WP_Query([
       'post_type'=>'like',
       'post_per_page'=>-1,
       'meta_query'=>[
           [
               'key'=>'related_post_id',
               'compare'=>'=',
               'value'=>$post_id
           ]
       ] 
    ]);
    return $likesOfPost;
}

function userLikes($post_id){
    if(is_user_logged_in()){
        $userLikes = new WP_Query([
            'author'=>get_current_user_id(),
            'post_type'=>'like',
            'meta_query'=>[
                [
                    'key'=>'related_post_id',
                    'compare'=>'=',
                    'value'=>$post_id
                ]
            ] 
         ]);
         return $userLikes;
    }
    return false;
}