<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;"  scrollamount="15">
	<?php
	$ads=$Ad->all(['sh'=>1]);
    foreach($ads as $ad){
        echo $ad['text'];
        echo "&nbsp;&nbsp;&nbsp;";
    }
    ?> 
	</marquee>
	<div style="height:32px; display:block;">
	
</div>
	<!--正中央-->
	
	
	
		<?php
			$all=$News->count(['sh'=>1]);
			$div=5;
			$pages=ceil($all/$div);
			$now=$_GET['p']??1;
			$start=($now-1)*$div;//起始頁
			$rows=$News->all(['sh'=>1],"limit $start,$div");
			echo "<ol start='".($start+1)."'>";
			foreach($rows as $idx => $row){
					echo "<li class='sswww'>";
					// echo $start+$idx+1 . ". ";
					echo mb_substr($row['text'],0,25);
					echo "<span class='all' style='display:none;'>";
					echo $row['text'];
					echo "</span>";
					echo "</li>";
				}
			echo "</ol>";
				?>
		<div style="text-align:center;">
		<?php
		if(($now-1)>0){
		?>
			<a class="bl" style="font-size:30px;" href="?do=news&p=<?=($now-1)?>">&lt;&nbsp;</a>
		<?php }	?>

		<?php
		for($i=1;$i<=$pages;$i++){
			$size=($i==$now)?"36px":"30px";
		?>
		<a class="bl" style="font-size:30px;" href="?do=news&p=<?=($now-1)?>">&lt;&nbsp;</a>
		<?php }	?>

		<?php
		if(($now+1)<=$pages){
		?>
		<a class="bl" style="font-size:30px;" href="?do=news&p=<?=($now+1)?>">&nbsp;&gt;</a>
		<?php }	?>
	</div>
</div>
<!-- 原本在index區 -->
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
			<script>
				$(".sswww").hover(
					function() {
						$("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
							"top": $(this).offset().top - 50
						})
						$("#alt").show()
					}
				)
				$(".sswww").mouseout(
					function() {
						$("#alt").hide()
					}
				)
			</script>