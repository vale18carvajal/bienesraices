<?php

require 'includes/funciones.php';
incluirTemplate('header');

?>

    <main class="contenedor secccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>
        <p class="informacion-meta">Escrito el <span>20/10/2023</span> por: <span>Admin</span></p>
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen de la propiedad">
        </picture>

        <div class="resumen-propiedad">
            <p>
                Aenean ac dolor eleifend, fringilla felis a, gravida tellus. Aenean egestas, velit dignissim
                consequat semper, arcu ante dictum sem, vel pharetra elit lectus nec metus. Nulla facilisi. Nam
                sagittis placerat dolor, quis tempor massa blandit sit amet. Proin mattis cursus mauris, at feugiat
                nisl sagittis et. Vestibulum rutrum at ligula non rutrum. Donec ornare sem nisl, nec imperdiet
                sapien pharetra sed. Aliquam ut efficitur urna, sit amet ornare libero. Quisque consectetur dictum
                velit et euismod. Nunc lacus tortor, laoreet eleifend nunc id, varius tincidunt nulla. Nulla sed
                ante et lacus ullamcorper aliquam. Nam et purus sed sem congue fringilla. Etiam sodales tellus nec
                aliquam molestie. Quisque orci purus, laoreet eget sapien pellentesque, molestie volutpat odio.
            </p>
            <p>Mauris ac mollis lacus, id ultrices neque. Duis vel vulputate nulla. Praesent consectetur lobortis
                lacus nec dictum. In justo tellus, suscipit ac dui eu, aliquam auctor orci. Sed gravida fringilla
                lectus et pretium. Phasellus est leo, elementum vitae lectus sit amet, placerat facilisis tortor.
                Duis porttitor nisi a est volutpat, vel faucibus leo rutrum. Mauris eu tellus quis est fringilla
                convallis.</p>
        </div>

    </main>

    
<?php
incluirTemplate('footer');
?>