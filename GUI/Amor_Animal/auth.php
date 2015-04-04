<?php
include ("settings.php");
include ("common.php");
if(isset($_COOKIE['casaculturalamon_id']))
{
   $conex=mysql_connect(HOST,USER,PASS);
   @mysql_select_db(DB,$conex) or die("Error en la seleccion, '$php_errormsg'");
   $username = $_COOKIE['casaculturalamon_id'];
   $pass = $_COOKIE['casaculturalamon_key'];
   $administrador = $_COOKIE['casaculturalamon_admin'];
   $check = mysql_query("SELECT * FROM Funcionario WHERE nick = '$username'")or die(mysql_error());
   mysql_close();
   while($info = mysql_fetch_array( $check ))
   {
      if ($pass != $info['password']){
         header("Location: index.php");
         //print "Error de contraseña";
      }
      else
      {
         actualizar_cookie($username,$pass,$administrador);
      }
   }
}
else

{
//   print "No esta conectado";
//   print "\n <a href=index.php>Ingresar</a>";
//   sleep(10);
   header("Location: index.php");
}
?>
