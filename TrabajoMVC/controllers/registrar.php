<?php 
   include '../models/conection.php';
   $Usuarios = new Usuarios();
   
   $nombre=$_POST["nombre"];
   $apellido=$_POST["apellido"];
   $correo=$_POST["correo"];
   $correo2=$_POST["correo2"];
   $documento=$_POST["documento"];
   $edad=$_POST["edad"];
   $password=$_POST["password"];
   $usuario=$_POST["usuario"];
   $estudiantes=$_POST["estudiantes"];
   $profe=$_POST["profe"];
   $Rol=0;
   $full=$correo.$correo2;
   
   if($correo2 == '@usbbog.edu.co'){
       $Rol=1;
   }else{
       $Rol=2;
   }
	

   $compro=$Usuarios->verifica($documento);
   $Ides=$compro->Id;
   
   $ver=$Usuarios->ingresa($full);
   $cor=$ver->Email;
   
   //echo $Ides."hola".$documento;
   //echo $cor."hola".$full;
    if($Ides==$documento || $cor==$full){
        echo '<body>
        <script type="text/javascript">
        window.alert("Usuario Ya registrado");
        window.location="http://www.tecn0project.com/regis.php";
        </script>
        </body>';
    }else{
        $res=$Usuarios->create($nombre,$apellido,$correo,$correo2,$documento,$edad,$password,$Rol);
    }
    if($res){
        echo '<body>
        <script type="text/javascript">
        window.alert("Se registro satisfactoriamente");
        window.location="http://www.tecn0project.com/login.php";
        </script>
        </body>';
        }else if(!$res){
    //echo /*$nombre,$apellido,$correo,$correo2,$documento,$edad,$password,$Rol.*/ "Fallo al registrar " . mysqli_error($Usuarios);
        echo '<body>
        <script type="text/javascript">
        window.alert("Fallo en Insercion");
        window.location="http://www.tecn0project.com/regis.php";
        </script>
        </body>';
   }
 ?>