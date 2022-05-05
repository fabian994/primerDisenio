<?php
	session_start();
	session_destroy();
	// Cierra sesion y Redirigue al Login
	header('Location: index.html');
?>