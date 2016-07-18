<?php
//include config
require_once('../ArtGlom/includes/config.php');

//log user out
$user->logout();
header('Location: index.php'); 

?>