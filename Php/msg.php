<?php require "header.php";?>
<section class="chat">
	<div class="msg">
		<span class="date">22</span>
		<span class="author">mwa</span>
		<span class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </span>
		
	</div>
		<div class="msg">
		<span class="date">22</span>
		<span class="author">mwa</span>
		<span class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </span>
		
	</div>
		<div class="msg">
		<span class="date">22</span>
		<span class="author">mwa</span>
		<span class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed </span>
		
	</div>
	
	<div class="user">
		<form action="handler.php?task=write" method="POST">
		<input type="text" name="author"  placeholder="pseudo">
		<input type="text" name="content" placeholder="type here">
		<button type="submit">e</button>
		</form>
	</div>
</section>
<script type="text/javascript" href="<?php echo $CONFIG["root_path"] ?>js/app.css"></script>
<?php require "footer.php"?>