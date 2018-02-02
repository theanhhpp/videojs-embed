<?php
error_reporting(0);
include "curl_gd.php";

if($_GET['url'] != ""){
	$gid = $_GET['url'];
	$original_id = my_simple_crypt($gid, 'd');
	$title = fetch_value(file_get_contents_curl('https://drive.google.com/get_video_info?docid='.$original_id), "title=", "&");
	$url = 'https://drive.google.com/file/d/'.$original_id.'/view';
	$linkdown = Drive($url);
	$file = '[{"type": "video/mp4", "label": "HD", "file": "'.$linkdown.'"}]';
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
	<title>Embed Video</title>

    <link href="http://vjs.zencdn.net/6.6.3/video-js.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">


    <!-- If you'd like to support IE8 -->
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

</head>
<body>
	<div>
	  <video id="uniqueID" class="video-js vjs-fluid" controls preload="auto" data-setup='{"fluid":true,"aspectRatio":"16:9"}'>
	    <source src="<?php echo $linkdown?>" type='video/mp4'>
	    <p class="vjs-no-js">
	      To view this video please enable JavaScript, and consider upgrading to a web browser that
	      <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
	    </p>
	  </video>
        <script src="http://vjs.zencdn.net/6.6.3/video.js"></script>
    </div>


</body>
</html>
