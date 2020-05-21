<?php
    class Usuarios{
    private $con;
	private $dbhost="localhost";
	private $dbuser="KillerPoio28";
	private $dbpass="loslibros321";
	private $dbname="TrabajoMVC";
	
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexion a la base de datos fallo " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
		
		public function create($nombre,$apellido,$correo,$correo2,$documento,$edad,$password,$Rol){
		    $full=$correo.$correo2;
		    $com=$nombre." ".$apellido;
			$sql ="INSERT INTO Usuarios (Id,Nombre,Apellido,Completo,Email,FecNac,Password,IdRol) VALUES ('$documento','$nombre','$apellido','$com','$full','$edad','$password','$Rol')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		
		public function verifica($documento){
		    $sql = "SELECT * FROM Usuarios where Id='$documento'";
		    $res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res);
			return $return;
		}
		
		public function ingresa($email){
		    $sql = "SELECT * FROM Usuarios WHERE Email='$email'";
		    $res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res);
			return $return ;
		}
		
		public function valida($ses){
		    $sql = "SELECT * FROM Usuarios where Completo='$ses'";
		    $res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res);
			return $return;
		}
		
		public function recupera($email){
		   $sql = "SELECT * FROM Usuarios WHERE Email='$email'";	
		   $res = mysqli_query($this->con, $sql);
		   $return = mysqli_fetch_object($res);
		   return $return ;
		}
    }

	class Proyectos{
	private $con;
	private $dbhost="tecn0project.com";
	private $dbuser="tecnproj";
	private $dbpass="polopagaelserver1234";
	private $dbname="tecnproj_General";
	
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexion a la base de datos fallo " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
		
		public function sanitize($var){
			$return = mysqli_real_escape_string($this->con, $var);
			return $return;
		}
		
		public function Subida_proyectos($nombre,$destino,$descri,$IdTec,$Seme){
		    $sql ="INSERT INTO Proyectos (Nompro,Logo,Descripcion,IdTec,Seme) VALUES ('$nombre','$destino','$descri','$IdTec','$Seme')";
		    $res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		
		public function read(){
			$sql = "SELECT * FROM Proyectos";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function single_record($IdPro){
			$sql = "SELECT * FROM Proyectos where IdPro='$IdPro'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res);
			return $return ;
		}
		
		public function individual($ses){
		    $sql = "SELECT * FROM Proyectos p join Repositorios r on p.IdPro=r.IdPro join Usuarios u on u.Id=r.Id where u.Completo='$ses'";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function update($nom, $destino, $descripcion,$IdTec,$Seme,$IdPro){
			$sql = "UPDATE Proyectos SET Nompro='$nom', Logo='$destino', Descripcion='$descripcion', IdTec='$IdTec', Seme='$Seme' WHERE IdPro='$IdPro'";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		
		public function delete($IdPro){
			$sql = "DELETE FROM Proyectos WHERE IdPro=$IdPro";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		
		public function repositorio($cod){
		    $sql="INSERT INTO Repositorios (Id) VALUES('$cod')";
		    $res= mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		
		public function repositorio2($cod){
		    $lectura="select * from Proyectos ORDER BY IdPro DESC LIMIT 1";
		    $conecta=mysqli_query($this->con, $lectura);
		    $return= mysqli_fetch_object($conecta);
		    $IdPro=$return->IdPro;
		    $sql="update Repositorios set IdPro='$IdPro' where Id='$cod' ORDER BY IdPro ASC LIMIT 1";
		    $res= mysqli_query($this->con, $sql);
		    if($res){
				return true;
			}else{
				return false;
			}
		}
	}
	
	

?>	
