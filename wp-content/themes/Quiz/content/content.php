
<script type="text/javascript">
	
</script>
<a href="<?php print get_permalink($post->ID) ?>">

	<div class="descon">

<div class="destitle">
	
	<h1><a href="<?php print get_permalink($post->ID) ?>"><?php print get_the_title(); ?></a></h1>

</div>
<figure>
	<div class="overlaydesign"></div>
		<?php echo the_post_thumbnail('sparkling-featured'); ?>
</figure>

</div>
</a>

<h4>Please Log in To see your Results</h4>
<button onclick="login()" id="login">Login With facebook</button>
	<div id="status"></div>
	<div id="status2"></div>
	<canvas id="myCanvas" width="180" height="180" style="border:1px solid #d3d3d3;">