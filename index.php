<?php
session_start();

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

if(isset($_GET['page']))
{
	switch($_GET['page'])
	{
		case 'me':
			require './controllers/index.php';
			break;
		case 'login':
			require './controllers/login.php';
			break;
		case 'register':
			require './controllers/register.php';
			break;
		case 'logout':
			require './controllers/logout.php';
			break;
		default:
			require './controllers/index.php';
			break;
	}
}
else 
{
	require './controllers/index.php';
}
