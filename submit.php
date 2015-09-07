<?php

include __DIR__.'/common.php';

$solution = isset($_POST['solution']) ? $_POST['solution'] : '';


#var_dump($_POST['resource_link']);exit;
$previousRequest = unserialize(base64_decode($_POST['payload']));
#var_dump($_POST);exit;

use Franzl\LtiExample\TestProvider;
use Franzl\Lti\Action\WriteResult;
use Franzl\Lti\Outcome;
use Franzl\Lti\Storage\DummyStorage;

try {
	$tool = new TestProvider(new DummyStorage);
	$tool->handleRequest($previousRequest);
} catch (Exception $e) {
	echo '<h1>Exception!</h1>';
	echo '<pre>';
	echo $e->getMessage()."\n";
	echo $e->getTraceAsString();
	echo '</pre>';
	echo '<pre>';var_dump($tool);echo '</pre>';
	echo '<pre>';var_dump($previousRequest);echo '</pre>';
	exit;
}

$user = $tool->user;



if ($solution === 'franzel') {
	$score = 1.0;
	echo 'Hurray!';
} else {
	$score = 0.0;
	echo 'Boo!';
}
#exit('Score : '.$score);

$link = $user->getResourceLink();

$outcome = new Outcome(null, $score);
$ok = $link->doOutcomesService(
	new WriteResult($outcome, $user),
	$user
);

