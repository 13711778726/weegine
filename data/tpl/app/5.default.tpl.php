<?php defined('IN_IA') or exit('Access Denied');?><div style="height:568px"><div class="panes"><div class="pane"></div></div></div><script type="text/javascript"> var scale = 1, marginLeft, marginTop; var width = window.screen.width; var height = window.screen.height; width / height > 320 / 568 ? (scale = height / 568,  marginLeft = (width / scale - 320) / 2, width = "320px") : (scale = width / 320, marginTop = (height / scale - 568) / 2, width = "100%"); window != window.top && $(".container").css({width: "100%", height: "100%", overflow: "hidden", "transform-origin": "top left", transform: "scale(" + scale + ")"}); $(".container div").eq(0).css({"width" : width, "marginTop" : marginTop, "marginLeft": marginLeft}); $("meta[name='viewport']").attr("content", "width=320, initial-scale=" + scale + ", maximum-scale=" + scale + ", user-scalable=no"); </script>