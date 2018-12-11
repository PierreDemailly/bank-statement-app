<?php 
$user_manager = new UserManager();

if (isset($_POST['register']))
{
  $errors = array();

  if (empty($_POST['firstname']))
    $errors['firstname'] = 'Veuillez renseigner votre prénom';

  elseif (strlen($_POST['firstname']) < 3 OR strlen($_POST['firstname']) > 30)
    $errors['firstname'] = 'Votre prénom doit faire entre 3 & 30 caractères';

  elseif (!preg_match('/^[a-zA-Z0-9]{1}[a-zA-Z\[\]-]*$/', $_POST['firstname']))
    $errors['firstname'] = 'Veuillez renseigner un prénom valide';


  if (empty($_POST['lastname']))
    $errors['lastname'] = 'Veuillez renseigner votre nom';

  elseif (strlen($_POST['lastname']) < 3 OR strlen($_POST['lastname']) > 30)
    $errors['lastname'] = 'Votre nom doit faire entre 3 et 30 caractères';

  elseif (!preg_match('/^[a-zA-Z0-9]{1}[a-zA-Z\[\]-]*$/', $_POST['lastname']))
    $errors['lastname'] = 'Veuillez renseigner un nom valide';


  if (empty($_POST['email']))
    $errors['email']= 'Veuillez renseigner votre adresse mail';
  
  elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    $errors['email'] = 'Veuillez renseigner une adresse mail valide';

  elseif($user_manager->registeredEmail($_POST['email']))
    $errors['email'] = 'Cette adresse email est déjà utilisé';

  if(empty($errors))
  {
    $user = new User($_POST);
    $user_manager->addUser($user);
    $_SESSION['id'] = $user_manager->getUser($_POST['email'])->getId();
    header('Location: ./');
  }
}

include './views/includes/header.php';
include './views/registerView.php';
include './views/includes/footer.php';
