<?php
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

$accounts = $account_manager->getAccount();

include "./views/indexView.php";
