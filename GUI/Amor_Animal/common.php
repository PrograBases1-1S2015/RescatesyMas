<?php
function actualizar_cookie($usuario, $contrasena, $admin)
{
   $hour = time() + 60;
   setcookie('id', $usuario, $hour);
   setcookie('key', $contrasena, $hour);
   setcookie('admin', $admin);
}
function cerrar_sesion($pagina)
{
   $past = time() + 60;
   setcookie(casaculturalamon_id, nouser, $past);
   setcookie(casaculturalamon_key, 'nopass', $past);
   setcookie(casaculturalamon_admin, 0);
	header("Location: $pagina");
}
?>
