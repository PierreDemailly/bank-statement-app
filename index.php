<?php

spl_autoload_register(function () 
{
	if (file_exists('./model/' . $classname . '.php'))
	{
		require './model/' . $classname . '.php';
	} 
	elseif(file_exists('./entities/' . $classname . '.php')) 
	{
		require './entities/' . $classname . '.php';
	}
});

require './controllers/index.php';
