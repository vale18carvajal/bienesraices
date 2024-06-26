<?php
    //Importar la base de datos
    require __DIR__ . '/../config/database.php';
    $db = conectarDB();

    //Consultar
    $query= "SELECT * FROM propiedades LIMIT $limite;";
    
    //Obtener los resultados
    $resultado = mysqli_query($db,$query);
?>

<div class="contenedor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)):?>
    <div class="anuncio">
            <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="Anuncio">
        <div class="contenido-anuncio">
            <h3><?php echo $propiedad['titulo']; ?></h3>
            <p><?php echo $propiedad['descripcion']; ?></p>
            <p class="precio">$<?php echo $propiedad['precio']; ?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento']; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p><?php echo $propiedad['habitaciones']; ?></p>
                </li>
            </ul>

            <a class="boton-amarillo-block" href="anuncio.php?id=<?php echo $propiedad['id']; ?>">Ver Propiedad</a>
        </div>
        <!--Conetenido anuncio -->
    </div>
    <?php endwhile; ?>
</div>
<!--Conetenedor anuncios -->

<?php
    //Cerrar la conexión

    mysqli_close($db);
?>