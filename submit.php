<?php

include __DIR__.'/common.php';

$solution = isset($_POST['solution']) ? $_POST['solution'] : '';


#var_dump($_POST['resource_link']);exit;
$_POST = unserialize(base64_decode($_POST['payload']));
#var_dump($_POST);exit;

use Franzl\LtiExample\TestProvider;
use Franzl\Lti\Storage\DummyStorage;

$tool = new TestProvider(new DummyStorage);
$tool->execute();

$user = $tool->user;



if ($solution === 'franzel') {
	$score = 1.0;
	echo 'Hurray!';
} else {
	$score = 0.0;
	echo 'Boo!';
}
exit('Score : '.$score);

$resource_link = $user->getResourceLink();

$outcome = new LTI_Outcome();
$outcome->setValue($score);
$ok = $resource_link->doOutcomesService(LTI_Resource_Link::EXT_WRITE, $outcome, $user);

