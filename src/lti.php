<?php

require_once __DIR__.'/lti/LTI_Tool_Provider.php';
require_once __DIR__.'/lti/LTI_Data_Connector_none.php';

date_default_timezone_set('UTC');

class TestProvider extends LTI_Tool_Provider
{

	function onLaunch()
	{
		var_dump($this);
		exit;
	}

}

$tool = new TestProvider(new LTI_Data_Connector_None, 'onLaunch');
return $tool;
