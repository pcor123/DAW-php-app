<?php

require_once('Connexio.php');
require_once('Header.php');

/**
 * Clase para gestionar la visualización de la lista de productos en la página principal.
 * 
 * Esta clase permite mostrar todos los productos registrados en la base de datos, con sus detalles como nombre,
 * descripción, precio y categoría. Además, ofrece opciones para modificar o eliminar productos existentes.
 */
class Principal {
    
    /**
     * Muestra la lista de productos en formato tabla.
     * 
     * Este método realiza los siguientes pasos:
     * 1. Consulta la base de datos para obtener la lista de productos con la categoría asociada.
     * 2. Muestra una tabla con los productos encontrados, incluyendo su ID, nombre, descripción, precio y categoría.
     * 3. Ofrece botones para agregar, modificar o eliminar productos.
     * 4. Si no se encuentran productos, muestra un mensaje indicativo.
     * 
     * @return void
     */
    public function mostrarProductes() {
        // Obtiene la conexión a la base de datos
        $conexionObj = new Connexio();
        $conexion = $conexionObj->obtenirConnexio();

        // Consulta para obtener la lista de productos con información de categorías
        $consulta = "SELECT p.id, p.nom, p.descripció, p.preu, c.nom as categoria
                     FROM productes p
                     INNER JOIN categories c ON p.categoria_id = c.id";
        $resultado = $conexion->query($consulta);

        // Estructura HTML de la página
        echo '<!DOCTYPE html>
              <html lang="es">
              <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title>Llista de productes</title>
                <!-- Enlace a Bootstrap desde su repositorio remoto -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
              </head>
              <body>
                <div class="container mt-5" style="margin-bottom: 100px">';

        // Verifica si hay productos en la base de datos
        if ($resultado->num_rows > 0) {
            // Botón para agregar un nuevo producto
            echo '<hr><a href="Nou.php" class="btn btn-primary">Nou producte</a><hr>';
            // Tabla para mostrar la lista de productos
            echo '<table class="table table-striped">';
            echo '<thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Descripció</th>
                        <th>Preu</th>
                        <th>Categoria</th>
                        <th colspan="2">Accions</th>
                    </tr>
                  </thead>';
            echo '<tbody>';
            $i = 1;
            // Itera sobre los resultados y muestra cada producto en una fila de la tabla
            while ($fila = $resultado->fetch_assoc()) {
                echo '<tr>
                        <td>' . $i . '</td>
                        <td>' . 'prod-' . $fila['id'] . '</td>
                        <td>' . $fila['nom'] . '</td>
                        <td>' . $fila['descripció'] . '</td>
                        <td>' . $fila['preu'] . '</td>
                        <td>' . $fila['categoria'] . '</td>
                        <td><a href="Modificar.php?id=' . $fila['id'] . '" class="btn btn-warning">Modificar</a></td>
                        <td><a href="Eliminar.php?id=' . $fila['id'] . '" class="btn btn-danger">Eliminar</a></td>
                      </tr>';
                $i++;
            }
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
            // Incluye el pie de página
            require_once('Footer.php');
        } else {
            // Mensaje si no hay productos
            echo '<p>No hi ha productes.</p>';
        }

        // Cierra la conexión a la base de datos
        $conexion->close();
    }
}

// Crea una instancia de la clase Principal y llama al método mostrarProductes
$listaProductos = new Principal();
$listaProductos->mostrarProductes();

?>
