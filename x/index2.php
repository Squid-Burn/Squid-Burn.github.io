<body>
    <button onclick="fullScreen()">浏览器全屏</button>
</body>
<script type="text/javascript">
    //实现全屏
    function fullScreen() {
      // documentElement 属性以一个元素对象返回一个文档的文档元素
        var el = document.documentElement;
        el.requestFullscreen||el.mozRequestFullScreen||el.webkitRequestFullscreen||el.msRequestFullScreen?
        el.requestFullscreen()||el.mozRequestFullScreen()|| el.webkitRequestFullscreen()||el.msRequestFullscreen():null;
    }

</script>
