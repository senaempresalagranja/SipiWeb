<?php
include ("Function_Backup.php");

echo backup_tables("localhost","root","","restaurante");


include("sendemail.php");

				$mail_username="jsreyes048@gmail.com";//Correo electronico saliente ejemplo: tucorreo@gmail.com
				$mail_userpassword="minombreesJOAQUIN";//Tu contraseña de gmail
				$mail_addAddress="jsreyes048@misena.edu.co";//correo electronico que recibira el mensaje
				$template="../../../include/plantilla_copias.html";//Ruta de la plantilla HTML para enviar nuestro mensaje
				
				// Inicio captura de datos enviados por $_POST para enviar el correo 
				$mail_setFromEmail='SistemadeCopiasLabarramarina@gmail.com';
				$mail_setFromName='Servicio de Respaldo Autoamtico JERR';
				$txt_message='Buen Dia copia de seguridad de hoy';
				$mail_subject='Copia automatica de su informacion';
			

	

		sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);
