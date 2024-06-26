<?php
require 'includes/config/database.php';

$db = conectarDB();

$errores = [];


//Autenticar el usuarioa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "<pre>";
    // var_dump($_POST);
    // echo "<pre>";

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = "El email es obligatorio o no es válido";
    }

    if (!$password) {
        $errores[] = "El password es obligatorio";
    }

    // echo "<pre>";
    // var_dump($errores);
    // echo "</pre>";

    if (empty($errores)) {
        //Revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '$email';";
        $resultado = mysqli_query($db, $query);
        // echo "<pre>";
        // var_dump($resultado);
        // echo "</pre>";

        if ($resultado->num_rows) { //Si num_rows es 1
            //Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);
            //Verificar si el password es correcto o no

            $autenticado = password_verify($password, $usuario['password']); //Retorna true o false;
            if ($autenticado) {
                //El usuario está autenticado
                session_start(); //Iniciar session para tener acceso a $_SESSION

                //Lenar el arreglo de la sesión
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;
                header('location: admin/index.php');
                
            } else {
                $errores[] = "El password es incorrecto";
            }
        } else {
            $errores[] = "El usuario no existe";
        }
    }
}


//Incluye el header
require 'includes/funciones.php';
incluirTemplate('header');

?>

<main class="contenedor secccion contenido-centrado">
    <h1>Iniciar Sesión</h1>
    <?php foreach ($errores as $error) { ?>
        <div class="alerta error"> <?php echo $error; ?></div>
    <?php } ?>
    <form method="POST" class="formulario">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Tu email" id="email">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Tu password" id="password">
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>


<?php
incluirTemplate('footer');
?>