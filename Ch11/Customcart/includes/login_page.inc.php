<h2>Login</h2>
<form action="login.php" method="post">
	<p><label class="label" for="email">Email Address:</label>
	<input id="email" type="text" name="email" size="30" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>
		<p><label class="label" for="psword">Password:</label>
	<input id="psword" type="password" name="psword" size="12" maxlength="12" value="<?php if (isset($_POST['psword'])) echo $_POST['psword']; ?>" ></p>
	<br><br><p><input id="submit" type="submit" name="submit" value="Login"></p>
</form>