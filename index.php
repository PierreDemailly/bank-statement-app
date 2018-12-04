<?php
spl_autoload_register(function ($classname) 
{
	if (file_exists('./models/' . $classname . '.php'))
	{
		require './models/' . $classname . '.php';
	} 
	elseif (file_exists('./entities/' . $classname . '.php')) 
	{
		require './entities/' . $classname . '.php';
	}
});

require './controllers/index.php';
