<?php

/**
 * Clase para gestionar el pie de página de la página web.
 * 
 * Esta clase genera el pie de página, que incluye un texto con derechos de autor,
 * los enlaces a los scripts necesarios para Bootstrap, y un script personalizado 
 * para activar el carrusel en la página.
 */
class Footer {

   /**
    * Muestra el pie de página de la página web.
    * 
    * Este método genera el HTML necesario para el pie de página, que incluye:
    * 1. El contenido del pie de página con un mensaje de derechos de autor.
    * 2. Los enlaces a los scripts de Bootstrap desde su repositorio remoto.
    * 3. Un script JavaScript personalizado para inicializar el carrusel utilizando Bootstrap.
    * 4. El cierre de las etiquetas HTML `</body>` y `</html>`.
    * 
    * @return void
    */
   public function mostrarFooter() {
        // Imprime el HTML del pie de página
        echo '<div class="footer text-center bg-dark text-white py-2">
                <p>&copy; 2023 CIFP Pau Casesnoves · Centro de Formación Profesional</p>
              </div>';

        // Imprime los scripts de Bootstrap desde su repositorio remoto y el script personalizado para activar el carrusel
        echo '<!-- Scripts de Bootstrap desde su repositorio remoto y script personalizado para activar el carrusel -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener(\'DOMContentLoaded\', function () {
        // Inicializar el carrusel utilizando Bootstrap
        var myCarousel = new bootstrap.Carousel(document.getElementById(\'carrusel\'), {
            interval: 2000, // Cambiar la velocidad del carrusel (en milisegundos)
            wrap: true // Repetir el carrusel al llegar al final
        });
    });
</script>';
        
        // Cierra la etiqueta </body> y </html>
        echo '</body></html>';
    }
}

// Crea una instancia de la clase Footer y llama al método mostrarFooter
$footer = new Footer();
$footer->mostrarFooter();

?>
