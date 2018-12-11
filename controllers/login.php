<?php 

if(isset($_POST['login']))
{
  $errors = array();
  
  if(empty($_POST['email']))
  $errors['email'] = "Veuillez entrer votre adresse mail";
  
  if(empty($_POST['password']))
  $errors['password'] = "Veuillez entrer votre mot de passe";
  
  if(empty($errors))
  {
    $user_manager = new UserManager();
    if($user_manager->checkPassword($_POST['email'], $_POST['password']))
    {
      $user = $user_manager->getUser($_POST['email']);
      $_SESSION['id'] = $user->getId();
      header('Location: ./me');
    }
    else 
    $errors['email'] = "Email ou mot de passe incorrect";
  }
}

include './views/includes/header.php';
include './views/loginView.php';
include './views/includes/footer.php';
