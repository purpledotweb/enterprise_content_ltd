<div id="adminMain">
	<form action="/enterprisecontent/index.php/admin/updated/<?php echo $pagedata['page']; ?>" method="post">
		<textarea id="editBox" class="textbox" name="content"><?php echo $pagedata['content'] ?></textarea>
		<input type="hidden" value="<?php echo $pagedata['page']; ?>" name="page">
		<input class="mainbutton" type="submit" value="Save changes to the <?php echo ucfirst(str_replace('_', ' ', $pagedata['page'])); ?> page."><br>
	</form>
</div>