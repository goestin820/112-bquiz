<div class="di"
    style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <?php include "marquee.php";?>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    <h3 class="cent">更多最新消息顯示區</h3>
    <hr style="width:90%;margin:auto">
    <?php 
		$News->moreNews();
	?>
    <div style="text-align:center;">
        <?=$News->links();?>
    </div>
</div>

<div id="alt"
    style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">

</div>
<script>
$(".sswww").hover(
    function() {
        $("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({"top": $(this).offset().top - 50})
        $("#alt").show()
    }
)
$(".sswww").mouseout(
    function() {
        $("#alt").hide()
    }
)
</script>
