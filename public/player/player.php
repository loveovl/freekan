<?php
$url = isset($_GET['url'])?$_GET['url']:'';
if($url==''){
    exit('请输入视频地址');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>播放器</title>
    <script></script>
    <script src="/public/static/player/ckplayer/ckplayer.js"></script>
    <script src="/public/static/player/js/jquery-3.2.1.min.js"></script>
</head>
<body>
<div class="video" style="width: 100%;height: 100%;"></div>
</body>
<script type="text/javascript">
    var videoObject = {
        container: '.video',//“#”代表容器的ID，“.”或“”代表容器的class
        variable: 'player',//该属性必需设置，值等于下面的new chplayer()的对象
        autoplay:true,//自动播放
        video:"<?php echo $url?>"//视频地址
    };
    var player=new ckplayer(videoObject);
</script>
</html>