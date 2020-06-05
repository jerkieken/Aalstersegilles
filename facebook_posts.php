<?php
$page_title = "Facebook page posts";
?>

<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title><?php echo $page_title; ?></title>
 
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
 
</head>
<body>
 
<div class="container">
    <div class='col-lg-12'>
 
    <!-- page feed code will be here -->
            <?php
        echo "<h1 class='page-header'>{$page_title}</h1>";
         
        $fb_page_id = "MoedenvolhardingAtom";
        $profile_photo_src = "https://graph.facebook.com/{$fb_page_id}/picture?type=square";
        $access_token = "EAAIJYDxNvLsBAPEGY8pbJBYxLEEP1FtMZBY2hfLZANIv53aHtRmXPaDt2OKeSsfq1ZCXvGSEHORz42IvrnAcZCjPS5zYZBagTMhVEaZCkoAGa3CeZADEK2GI3mhHb7BvM3OyqjBY6eIuVDS7XJGZAE3ax0yLjpiBf1RE0yfBL1160AZDZD";
        $fields = "id,message,picture,link,name,description,type,icon,created_time,from,object_id";
        $limit = 5;
        
        //7.0 Get json contents
        
        $json_link = "https://graph.facebook.com/{$fb_page_id}/feed?access_token={$access_token}&fields={$fields}&limit={$limit}";
$json = file_get_contents($json_link);

//<!-- DECODE JSON -->
$obj = json_decode($json, true);
$feed_item_count = count($obj['data']);
        
 
 //Loop through the post
 for($x=0; $x<$feed_item_count; $x++){
 
    // to get the post id
    $id = $obj['data'][$x]['id'];
    $post_id_arr = explode('_', $id);
    $post_id = $post_id_arr[1];
 
    // user's custom message
    $message = $obj['data'][$x]['message'];
 
    // picture from the link
    $picture = $obj['data'][$x]['picture'];
    $picture_url_arr = explode('&url=', $picture);
    $picture_url = urldecode($picture_url_arr[1]);
 
    // link posted
    $link = $obj['data'][$x]['link'];
 
    // name or title of the link posted
    $name = $obj['data'][$x]['name'];
 
    $description = $obj['data'][$x]['description'];
    $type = $obj['data'][$x]['type'];
 
    // when it was posted
    $created_time = $obj['data'][$x]['created_time'];
    $converted_date_time = date( 'Y-m-d H:i:s', strtotime($created_time));
    $ago_value = time_elapsed_string($converted_date_time);
 
    // from
    $page_name = $obj['data'][$x]['from']['name'];
 
    // useful for photo
    $object_id = $obj['data'][$x]['object_id'];
}

//format time
// to get 'time ago' text
function time_elapsed_string($datetime, $full = false) {
 
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
 
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
 
    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }
 
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

//get post details
echo "<div class='col-md-8'>";
    echo "<a href='{$link}' target='_blank' class='post-link'>";
 
        echo "<div class='post-content'>";
 
            if($type=="status"){
                echo "<div class='post-status'>";
                    echo "View on Facebook";
                echo "</div>";
            }
 
            else if($type=="photo"){
                echo "<img src='https://graph.facebook.com/{$object_id}/picture' />";
            }
 
            else{
                if($picture_url){
                    echo "<div class='post-picture'>";
                        echo "<img src='{$picture_url}' />";
                    echo "</div>";
                }
 
                echo "<div class='post-info'>";
                    echo "<div class='post-info-name'>{$name}</div>";
                    echo "<div class='post-info-description'>{$description}</div>";
                echo "</div>";
            }
 
        echo "</div>";
    echo "</a>";
echo "</div>";


?>
<style>
.profile-info{
    overflow:hidden;
}
 
.profile-photo{
    float:left;
}
 
.profile-photo img{
    width:40px; height:40px;
}
 
.profile-name{
    float:left; margin:0 0 0 .5em;
}
 
.time-ago{
    color:#999;
}
 
.profile-message{
    margin:1em 0;
}
 
.post-link{
    text-decoration:none;
}
 
.post-content{
    background: #f6f7f9; border: 1px solid #d3dae8; overflow:hidden;
}
 
.post-content img{
    width:100%;
}
 
.post-status{
    margin:.5em; font-weight:bold;
}
 
.post-picture{
    width:25%; float:left;
}
 
.post-info{
    width:70%; float:left; margin:.5em;
}
 
.post-info-name{
    font-weight:bold;
}
 
.post-info-description{
    color:#999;
}
</style>
    </div>
</div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
 
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
 
</body>
</html>