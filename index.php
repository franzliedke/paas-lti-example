<?php

include __DIR__.'/common.php';

use Franzl\LtiExample\TestProvider;
use Franzl\Lti\Storage\DummyStorage;

try {
	$tool = new TestProvider(new DummyStorage);
	$tool->handleRequest($request);
} catch (Exception $e) {
	echo '<h1>Exception!</h1>';
	echo '<pre>';
	echo $e->getMessage()."\n";
	echo $e->getTraceAsString();
	echo '</pre>';
	echo '<pre>';var_dump($tool);echo '</pre>';
	echo '<pre>';var_dump($request);echo '</pre>';
	exit;
}

$serialized = base64_encode(serialize($request));

?>
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
		<p class="intro">Hello <?= $tool->user->firstName ?>. Please solve the following task</p>

		<form action="submit.php" method="post">
			<label for="solution">Your solution</label>
			<input type="text" name="solution" id="solution" />
			<input type="hidden" name="payload" value="<?php echo $serialized; ?>" />
			<input type="submit" />
		</form>

	</div>
	<?php echo '<pre>';var_dump($tool);echo '</pre>'; ?>
</body>

</html>