<div id="adminMain">
	<a class="mainbutton" href="/enterprisecontent/index.php/admin/edit/<?php echo $pagedata['page']; ?>"><button>Edit the <?php echo ucfirst(str_replace('_', ' ', $pagedata['page'])); ?> page</button></a>
	<br><br>
	<?php echo $pagedata['content']; ?>
</div>