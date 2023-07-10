<?php 
ob_start();
session_start();
if (isset($_SESSION['ID'])){
   if($_SESSION['ACTIVATED']==0){
	header('Location: ActivateUser?UID='.$_SESSION['ID'].'');
	session_destroy();
   }	
}
else{
	session_destroy();
	header('Location: Index');
} 
?> 