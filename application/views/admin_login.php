<form action="" method="post">
	<input type="text" name="username" placeholder="username">
	<input type="password" name="password" placeholder="password">
	<input type="submit" value="Log in!">
</form>

<?php
if(isset($error))
{
	echo $error;
}

?>