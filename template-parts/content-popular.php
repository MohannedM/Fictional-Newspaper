<div class="popular-news-widget mb-30">
    <h3>5 Most Popular News</h3>

    <?php
if (function_exists('wpp_get_mostpopular')) {
    wpp_get_mostpopular(array(
        'limit' => 5, /* list up to 5 posts */
        'range' => 'last30days',
        'order_by' => 'views'
    ));
}

?>

    <!-- Single Popular Blog -->

</div>