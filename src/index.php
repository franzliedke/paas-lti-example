<!DOCTYPE html>
<html>

<head>
	<title>PaaS Test</title>

	<style type="text/css">
		.container {
			max-width: 20em;
			margin: 5em auto;
			text-align: center;
			border: 2px solid #dddddd;
		}

		.intro {
			font-weight: bold;
		}
	</style>
</head>

<body>
	<div class="container">
		<h1>Welcome</h1>
		<p class="intro">Please solve the following task</p>

		<form action="submit.php" method="post">
			<label for="solution">Your solution</label>
			<input type="text" name="solution" id="solution" />
			<input type="submit" />
		</form>
	</div>
</body>

</html>