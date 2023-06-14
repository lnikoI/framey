<!DOCTYPE html>
<html>
<head>
<title>
	Welcome
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {background-color:#ffffff;background-repeat:no-repeat;background-position:top left;background-attachment:fixed;}
h1{font-family:Arial, sans-serif;color:#000000;background-color:#ffffff;}
p {font-family:Georgia, serif;font-size:14px;font-style:normal;font-weight:normal;color:#000000;background-color:#ffffff;}
</style>
</head>
<body>
<h1>Welcome page</h1>
<form action="<?php $_SERVER['HTTP_HOST'] ?>/create-user" method="POST">
	<label for="name">Name:</label>
	<input type="text" name="name">
	<br><br>
	<label for="name">Email:</label>
	<input type="email" name="email">
	<br><br>
	<label for="name">Pass:</label>
	<input type="password" name="password">
	<br><br>
	<button type="submit">Submit</button>
</form>
</body>
</html>