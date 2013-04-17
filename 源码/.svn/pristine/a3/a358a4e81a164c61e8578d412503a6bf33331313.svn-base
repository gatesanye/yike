<?php
include_once '../../base.php';
$username = array_map('trim', $_POST);
$isOkay = Model\User::checkUserIsAvailable($username);

echo $isOkay;