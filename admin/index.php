<?php
require '../includes/funciones.php';
$auth = estaAutenticado();

if(!$auth){
    header('Location: /bienesraices/index.php');
}


//importatar la conexión
require '../includes/config/database.php';
$db = conectarDB();

//Escribir el query
$query = "SELECT * FROM propiedades;";

//consultar la bd
$resultadoConsulta = mysqli_query($db, $query);

$resultado = $_GET['resultado'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        //ELIMINAR EL ARCHIVO
        $query = "SELECT imagen FROM propiedades WHERE id = $id";
        $resultado = mysqli_query($db, $query);
        $propiedad = mysqli_fetch_assoc($resultado);

        unlink('../imagenes/' . $propiedad['imagen']);

        //ELIMINAR LA PROPIEDAD
        $query = "DELETE FROM propiedades WHERE id = $id";
        // echo $query;
        $resultado = mysqli_query($db, $query);

        if($resultado){
            header("Location: /bienesraices/admin/index.php?resultado=3");
        }
    }
}

//Incluye un template

incluirTemplate('header');

?>

<main class="contenedor secccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php 
        if ($resultado == 1) {?>
            <p class="alerta exito">Anuncio Creado Correctamente</p>
        <?php } ?>

        <?php 
        if ($resultado == 2) {?>
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
        <?php } ?>

        <?php 
        if ($resultado == 3) {?>
            <p class="alerta exito">Anuncio Eliminado Correctamente</p>
        <?php } ?>

    <a href="propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <!-- mostrar los resultados -->
        <tbody>
        <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)) {?>
            <tr>
                <td><?php echo $propiedad['id']; ?></td>
                <td><?php echo $propiedad['titulo']; ?></td>
                <td><img src="../imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla"></td>
                <td>$ <?php echo $propiedad['precio']; ?></td>
                <td>
                    <form action="" method="POST" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $propiedad['id'];?>">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                    <a href="propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</main>


<?php
//cerrar la conexión
mysqli_close($db);
incluirTemplate('footer');
?>