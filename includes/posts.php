<?php 

foreach($objFeed as $obj) {

    // Post ID
    $id = $obj['id'];
    $post_id_arr = explode('_', $id);
    if (!isset($post_id_arr[1])){
        $post_id_arr[1] = null;
    }
    $postId = $post_id_arr[1];

    // Post Message
    if (!isset($obj['message'])){
        $obj['message'] = null;
    }
    $message = $obj['message'];

    // Post Picture
    if (!isset($obj['full_picture'])){
        $obj['full_picture'] = null;
    }
    $picture = $obj['full_picture'];
    $picture_url_arr = explode('&url=', $picture);
    if (!isset($picture_url_arr[1])){
        $picture_url_arr[1] = null;
    }
    $picture_url = urldecode($picture_url_arr[1]);

    // Link to Facebook Post
    if (!isset($obj['link'])){
        $obj['link'] = null;
    }
    $link = $obj['link'];

    // Post Name
    if (!isset($obj['name'])){
        $obj['name'] = null;
    }
    $name = $obj['name'];

    if (!isset($obj['description'])){
        $obj['description'] = null;
    }
    $description = $obj['description'];
    $type = $obj['type'];

    // Post Date
    $created_time = $obj['created_time'];
    $converted_date_time = date( 'Y-m-d H:i:s', strtotime($created_time));
    $ago_value = time_elapsed_string($converted_date_time);

    // Post Author
    if (!isset($obj['from']['name'])){
        $obj['from']['name'] = null;
    }
    $page_name = $obj['from']['name'];

    // Object ID
    if (!isset($obj['object_id'])){
        $postCover = $picture;
    } else {
        $postCoverId = $obj['object_id'];

        // Event Cover Picture
        $jsonLinkPostCover = "https://graph.facebook.com/{$postCoverId}/?fields=cover&access_token={$token}";
        if(!$jsonPostCover = @file_get_contents($jsonLinkPostCover)){
            $postCover = $picture;
        } else {
            $jsonPostCover = file_get_contents($jsonLinkPostCover);
            $objPostCover = json_decode($jsonPostCover, true);
            if (!isset($objPostCover['cover']['source'])){
                $postCover = $picture;
            } else {
                $postCover = $objPostCover['cover']['source'];
            }
        }
    }

    // Post Comments
    if (!isset($obj['comments']['data'])){
        $obj['comments']['data'] = null;
    }
    $comments = $obj['comments']['data'];
    $comments_count = count($comments);

?>

<div class="container-box content-section container-post cf">

    <div class='post-message'><?php echo $message; ?></div>

    <img src="<?php echo $postCover; ?>" width="100%" class="post-image">

    <div class="post-comments">
        <?php 
            if($comments_count < 1){
                    echo "No comments to show.";
            } else {

                for ($y = 0; $y < $comments_count; $y++) { ?>
                    <i class="far fa-comment"></i>
                    <span>▸ <?php echo $comments[$y]['message']; ?></span>
                    <br>
                <?php }          
            }
        ?> 
    </div>

    <div class="post-info">
        <?php if ($type == "status") {
                $link = "https://www.facebook.com/{$pageId}/posts/{$postId}";
        } ?>
        <span>
            <a href="#" class="btn-comments"><i class="fas fa-comments"></i> Show comments</a> | <?php echo $ago_value; ?> | <a href='<?php echo $link; ?>' target='_blank'>Facebook post</a>
        </span>
    </div>

</div>

<?php } ?>