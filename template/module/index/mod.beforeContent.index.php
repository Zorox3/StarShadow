<?php
	$db = new db;
	
	Db::setAutoMergeFollow();
	$top = $db->select("news");


?>

<div id="news">
	<div class="news" id="img1" style='background: transparent url("../../images/top_images/<?php echo $top['image']; ?>") no-repeat scroll 50% center / auto 1080px;' >
		<div id="vid1_div"></div>
		<div class="text">
			<h1 id="title1"><?php echo $top['title']; ?></h1>
			<?php if($top['link'] != null){ ?>
			<div id="link1">
				<a id="alink1" href="<?php echo Navigation::getLink($top['link']); ?>"><?php echo $top['linkText']; ?></a>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

