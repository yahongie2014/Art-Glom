<?php
require_once('../ArtGlom/includes/config.php');
require_once('../ArtGlom/add-post.php');

 if(isset($_POST['submit']))
 {
   mysql_connect('localhost','root','1210');
   mysql_select_db('artglom');
   $postImg=$_FILES['file']['name'];
   $type=$_FILES['file']['type'];

     $target_path = $target_path . basename( $_FILES['file']['name']);
     if($type=='image/jpeg' || $type=='image/png' || $type=='image/gif' || $type=='image/pjpeg' ||  $type=='image/tiff')
   {
if(file_exists(dirname($_SERVER['DOCUMENT_ROOT']).'../htdocs/ArtGlom/pic/'.$postImg))
     {
      echo'file is already present';
     }
     else
     {
      $up=move_uploaded_file($_FILES['file']['tmp_name'],dirname($_SERVER['DOCUMENT_ROOT']).'../htdocs/ArtGlom/pic/'.$postImg);


         if($up && $q)
  {
   echo'image uploaded and stored';
  }
  elseif(!$up)
  {
   echo'image not uploaded';
  }
  elseif(!$q)
  {
   echo'image not stored';
  }
 }
   }
   else
   {
    echo'Invalid file type';
   }
 }

