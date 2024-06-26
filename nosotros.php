<?php

require 'includes/funciones.php';
incluirTemplate('header');

?>
<main class="contenedor secccion">
    <h1>Conoce Sobre Nosotros</h1>
    <div class="contenido-nosotros">
        <div class="imagen">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
            </picture>
        </div>
        <div class="texto-nosotros">
            <blockquote>25 años de experiencia</blockquote>
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
    </div>
</main>
<section class="contenedor secccion">
    <h1>Más sobre nosotros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla consequatur reprehenderit, repellat
                dignissimos numquam aperiam velit fugit quod nemo a suscipit possimus facilis esse cumque asperiores
                exercitationem. Velit, possimus maiores.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla consequatur reprehenderit, repellat
                dignissimos numquam aperiam velit fugit quod nemo a suscipit possimus facilis esse cumque asperiores
                exercitationem. Velit, possimus maiores.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
            <h3>Tiempo</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla consequatur reprehenderit, repellat
                dignissimos numquam aperiam velit fugit quod nemo a suscipit possimus facilis esse cumque asperiores
                exercitationem. Velit, possimus maiores.</p>
        </div>
    </div>
</section>


<?php
incluirTemplate('footer');
?>