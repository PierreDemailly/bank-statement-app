<?php
if(isset($_POST['new']))
{
  $account_manager = new AccountManager();

  if(in_array($_POST['name'], Account::TYPE_LIST))
  {
    if(!$account_manager->accountExist($_POST['name']))
    {
      $account_manager->createAccount($_POST['name']);
    }
  }
}

include "./views/indexView.php";
