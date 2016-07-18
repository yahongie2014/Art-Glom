<?php
include("../ArtGlom/includes/config.php");

$id =$_REQUEST['id'];


// sending query
mysql_query("DELETE FROM arts WHERE id = '$id'")
or die(mysql_error());

header("Location: admin.php");
?>