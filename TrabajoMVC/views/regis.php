<!DOCTYPE html>


<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
        <title>TecnoProject</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" media="" rel="stylesheet" />
	    <link href="css/estilos.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <header>
            <div class="container-fluid">
            <div class="row">
            <div class="col-lg-2"><a href="https://tecn0project.com/"><img align="left" height="200" src="img/LOGOTECNOPROJECT.ico" width="350" /></a></div>

            <div class="col-lg-8">
            <h1><strong>TecnoProject</strong></h1>
            </div>
            </div>
            </div>
            </header>
        <div></div>
            <h2></h2>
            <form action="../controllers/registrar.php" method="post" class="form-register">
                <h2 class="form__titulo">CREA TU CUENTA AHORA</h2>
                <div class="contenedor-inputs">
                    <input type="text" name="nombre" placeholder="Name" class="input-48" required>
                    <input type="text" name="apellido" placeholder="Last Name" class="input-48" required>
                    <input type="text" name="correo" id="correo" placeholder="Email antes del @" class="input-48" required>
                    <div class="caja">
                    <select name="correo2" id="correo2" placeholder="Adjunte su correo" class="select-css" requiered >
                      <option value="value1">Seleccionar</option> 
                      <option value="@usbbog.edu.co">@usbbog.edu.co</option> 
                      <option value="@academia.usbbog.edu.co">@academia.usbbog.edu.co</option>
                    </select>
                    </div>
                    <input type="text" name="documento" placeholder="Documento" class="input-48" required>
                    <input type="date" name="edad" placeholder="AGE" class="input-date1" required>
                    <input type="password" name="password" placeholder="Password" class="input-48" required>
                    <input type="submit" value="Registrar" class="btn-enviar">
                    <p class="form__link">多Ya tienes una cuenta? <a href="login"> Ingresa aqui</a></p>
                    <p class="form__link">多Quieres generar un correo y una contraseña con tus datos? <a href="aleatorio.html"> Ingresa aqui</a></p>
                </div>

            </form> 
                               
             
    </body>
</html>