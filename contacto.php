<?php

require 'includes/funciones.php';
incluirTemplate('header');

?>

    <main class="contenedor secccion">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen de contacto">
        </picture>

            <h2>Llene el formulario de contacto</h2>

            <form action="" class="formulario">
                <fieldset>
                    <legend>Información Personal</legend>
                    <label for="nombre">Nombre</label>
                    <input id="nombre" type="text" placeholder="Tu Nombre">

                    <label for="email">E-mail</label>
                    <input id="email" type="email" placeholder="Tu Email">

                    <label for="telefono">Teléfono</label>
                    <input id="telefono" type="tel" placeholder="Tu Teléfono">

                    <label for="mensaje">Mensaje:</label>
                    <textarea id="telefono" type="tel" placeholder="Tu Mensaje"></textarea>
                </fieldset>

                <fieldset>
                    <legend>Información sobre la Propiedad</legend>
                    <label for="opciones">Vende o Compra:</label>
                    <select name="opciones" id="opciones">
                        <option value="" disabled selected>--Seleccione--</option>
                        <option value="compra">Compra</option>
                        <option value="vende">Venta</option>
                    </select>
                    <label for="presupuesto">Precio o Presupuesto</label>
                    <input id="presupuesto" type="number" placeholder="Tu Precio o Presupuesto">
                </fieldset>

                <fieldset>
                    <legend>Contacto</legend>
                    <p>Cómo desea ser contactado</p>
                    <div class="forma-contacto">
                        <label for="contactar-telefono">Teléfono</label>
                        <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                        <label for="contactar-email">E-mail</label>
                        <input name="contacto" type="radio" value="email" id="contactar-email">

                    </div>
                    <p>Si eligió teléfono, elija la fecha y la hora</p>

                    <label for="fecha">Fecha:</label>
                    <input id="fecha" type="date">

                    <label for="hora">Hora:</label>
                    <input id="hora" type="time" min="9:00" max="18:00">
                </fieldset>
                <input type="submit" value="Enviar" class="boton-verde">
            </form>
    </main>

    
<?php
incluirTemplate('footer');
?>