<?php
if(!isset($_SESSION['id']))
{
  header('Location: ./login');
}
else 
{
  $user_manager = new UserManager();
  $user = $user_manager->getUser($_SESSION['id']);
}

$account_manager = new AccountManager();

if(isset($_POST['new']))
{
  if(in_array($_POST['name'], Account::TYPE_LIST))
  {
    if(!$account_manager->accountExist($_POST['name']))
    {
      $account_manager->createAccount($_POST['name']);
    }
  }
}

if(isset($_POST['payment']))
{
  $account_manager->creditAccount($_POST['balance'], $_POST['id']);
}

if(isset($_POST['debit']))
{
  $account_manager->deptAccount($_POST['balance'], $_POST['id']);
}

if(isset($_POST['transfer']))
{
  $account_manager->deptAccount($_POST['balance'], $_POST['idDebit']);
  $account_manager->creditAccount($_POST['balance'], $_POST['idPayment']);
}

if(isset($_POST['delete']))
{
  $account_manager->deleteAccount($_POST['id']);
}

$accounts = $account_manager->getAccount();

include "./views/indexView.php";
