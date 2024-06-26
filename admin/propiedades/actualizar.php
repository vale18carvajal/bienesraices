<?php
require '../../includes/funciones.php';
$auth = estaAutenticado();

if(!$auth){
    header('Location: /bienesraices/index.php');
}


//VALIDAR QUE SE UN ID VÁLIDO
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if (!$id) {
    header("Location: /bienesraices/admin/index.php");
}



//base de datos
require '../../includes/config/database.php';
$db = conectarDB();
//Obtener los datos de la propiedad
$consulta = "SELECT * FROM propiedades WHERE id={$id};";
$llamarPropiedad = mysqli_query($db, $consulta);
$propiedad = mysqli_fetch_assoc($llamarPropiedad);

//Consultar para obtener los vendedores de la bd
$consulta = "SELECT * FROM vendedores;";
$llamarVendedores = mysqli_query($db, $consulta);

//ARREGLO CON MENSAJES DE ERRORES
$errores = [];

$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedor_id'];
$imagenPropiedad = $propiedad['imagen'];


//EJECUTAR EL CÓDIGO DESPUÉS DE QUE EL USUARIO ENVIA EL FORMULARIO
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    //mysqli_real_escape_string() evita la inyección sql
    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');

    //Asignar files a una variable
    $imagen = $_FILES['imagen'];


    if (!$titulo) {
        $errores[] = "Debes añadir un titulo";
    }
    if (!$precio) {
        $errores[] = "Debes añadir un precio";
    }

    if (strlen($descripcion) < 50) {
        $errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
    }
    if (!$habitaciones) {
        $errores[] = "El número de habitaciones es obligatorio";
    }

    if (!$wc) {
        $errores[] = "El número de baños es obligatorio";
    }

    if (!$estacionamiento) {
        $errores[] = "El número de lugares de estacionamiento es obligatorio";
    }

    if (!$vendedorId) {
        $errores[] = "Elige un vendedor";
    }

    /*if ($imagen['error'] !== UPLOAD_ERR_OK) {
        $errores[] = "Hubo un error al subir la imagen";
    }*/

    //Validar por tamaño 1 MB máximo
    $medida = 1000 * 1000; //1 MB ya que la imagen viene en bytes
    if ($imagen['size'] > $medida) {
        $errores[] = "La imagen es muy pesada, 1MB máximo";
    }

    // echo "<pre>";
    // var_dump($errores);
    // echo "</pre>";

    //Revisar que el arreglo de errores esté vacío

    if (empty($errores)) {
        //CREAR CARPETA
        $carpetaImagenes = '../../imagenes';

        //CREAR UN DIRECTORIO CON mkdir();
        if (!is_dir($carpetaImagenes)) { //Si no existe la crea
            mkdir($carpetaImagenes);
        }
        $nombreImagen = '';

        if ($imagen['name']) {
            //si hay una nueva imagen: Eliminar la imagen previa con el método unlink
            unlink($carpetaImagenes . '/' . $propiedad['imagen']);

            //Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

            //SUBIR IMAGEN
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . '/' . $nombreImagen);

        }else{
            $nombreImagen = $propiedad['imagen'];
        }

        //Insertar en la base de datos
        $query = "UPDATE propiedades
                SET titulo = '$titulo',
                precio = $precio,
                imagen = '$nombreImagen',
                descripcion = '$descripcion',
                habitaciones = $habitaciones,
                wc = $wc,
                estacionamiento = $estacionamiento,
                vendedor_id = $vendedorId
                WHERE id = $id";

        //echo $query;
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            //echo "guardado correctamente!";
            header("Location: /bienesraices/admin/index.php?resultado=2");
        }
    }
}


incluirTemplate('header');

?>

<main class="contenedor secccion">
    <h1>Actualizar Propiedad</h1>

    <a href="../index.php" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>

    <?php endforeach; ?>

    <!-- enctype="multipart/form-data" permite el envío de archivos al servidor -->
    <form method="POST" class="formulario" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Título propiedad" value="<?php echo $titulo ?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $precio ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

            <img src="../../imagenes/<?php echo $imagenPropiedad; ?>" alt="imagen de la propiedad" class="imagen-small">

            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion"><?php echo $descripcion ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información propiedad</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="3 propiedad" min="1" max="9" value="<?php echo $habitaciones ?>">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" placeholder="3 propiedad" min="1" max="9" value="<?php echo $wc ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="3 propiedad" min="1" max="9" value="<?php echo $estacionamiento ?>">


        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor" id="vendedor">
                <option value="">--selecione--</option>
                <?php while ($vendedor = mysqli_fetch_assoc($llamarVendedores)) { ?>
                    <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : '' ?> value="<?php echo $vendedor['id'] ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido'] ?></option>
                <?php } ?>
            </select>
        </fieldset>
        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>

</main>


<?php
incluirTemplate('footer');
?>