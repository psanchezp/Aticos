<?php
  if (isset($_POST["submit"])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];
    $humano = intval($_POST['humano']);
    $from = "Pagina Aticos"; 
    $to = "mauro.amarante94@gmail.com"; 
    $subject = "Pagina Aticos - Mensaje de $nombre";
    
    $body ="De: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";

    // revisar si el nombre se escribio
    if (!$_POST['nombre']) {
      $errNombre = 'Porfavor escribe tu nombre';
    }
    
    // Revisar si correo es valido y se escribio uno
    if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $errEmail = 'Porfavor esribe un correo valido';
    }
    
    //Revisar si se escribio un mensaje
    if (!$_POST['mensaje']) {
      $errMensaje = 'Porfavor escribe tu mensaje';
    }
    //Revisr si el antispam fue correcto
    if ($humano !== 5) {
      $errHumano = 'La respuesta anti-spam es incorrecta';
    }

// Si no hay errores mandar correo
if (!$errNombre && !$errEmail && !$errMensaje && !$errHumano) {
  if (mail ($to, $subject, $body, $from)) {
    $resultado='<div class="alert alert-success">Muchas gracias. Nos pondremos en contacto pronto.</div>';
  } else {
    $resultado='<div class="alert alert-danger">Lo siento, hubo un error. Favor de intentar mas tarde.</div>';
  }
}
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="Aticos" content="">
    <meta name="Mauro Bros" content="">
    <link rel="icon" href="img/favicon.ico">

    <title>Aticos</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <a href="index.html"><img class="masthead-brand logo" src="img/LogoAticosnegro.jpg"/></a>
              <nav>
                <ul class="nav masthead-nav">
                  <li class="nav-left"><a href="nosotros.html">Nosotros</a></li>
                  <li class="nav-left"><a href="servicios.html">Servicios</a></li>
                  <li class="nav-right">
                    <ul class="nav" id="telefonos">
                      <li>(81)83474244</li>
                      <li>(81)83474344</li>
                    </ul>
                  </li>
                  <li class="nav-right" id="telefono_icon"><p><span class="glyphicon glyphicon-earphone" aria-hidden="true"></p></span></li>
                  <li class="nav-right"><a href="contacto.php"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover contact">
            <div class="row">
              <div class="col-md-2 col-md-offset-1">
              <img id="contact_img" src="img/banner_somos.jpg"/>
              </div>
              <div class="col-md-5 col-md-offset-3">
                <h1 class="text-center">Contacto</h1>
                <form class="form-horizontal" role="form" method="post" action="index.php">
                  <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre y Apellido" value="<?php echo htmlspecialchars($_POST['nombre']); ?>">
                      <?php echo "<p class='text-danger'>$errNombre</p>";?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Correo Electronico</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@google.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                      <?php echo "<p class='text-danger'>$errEmail</p>";?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="mensaje" class="col-sm-2 control-label">Mensaje</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" rows="4" name="mensaje"><?php echo htmlspecialchars($_POST['mensaje']);?></textarea>
                      <?php echo "<p class='text-danger'>$errMensaje</p>";?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                      <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                      <?php echo $resultado; ?> 
                    </div>
                  </div>
                </form> 
              </div>
            </div>
          </div>

          <div class="container-fluid mastfoot mastfoot_index">
              <div class="row">
                <div class="col-md-2">
                  <a href="https://www.facebook.com"><img id="link_social" src="img/facebook.png"/></a>
                  <a href="https://www.twitter.com"><img id="link_social" src="img/twitter.png"/></a>
                </div>
                <div class="col-md-2 col-md-offset-7">
                  <p id="footer_mail">E-mail: ventas@aticos.com.mx</p>
                </div>
              </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
