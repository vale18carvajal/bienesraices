<?php

require 'includes/funciones.php';
incluirTemplate('header');

?>

<main class="contenedor secccion">
    <h2>Casas y Depas en venta</h2>
    <?php
    $limite = 10;
    include 'includes/templates/anuncios.php';
    ?>
</main>


<?php
incluirTemplate('footer');
?>