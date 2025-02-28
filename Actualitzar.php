<?php

/**
 * Clase para actualizar productos en la base de datos.
 * 
 * Esta clase se encarga de actualizar la información de un producto en la base de datos,
 * utilizando los datos proporcionados a través de un formulario. Se valida que todos los
 * campos requeridos estén presentes y se realiza la actualización utilizando una consulta SQL.
 */
class Actualitzar {
    
    /**
     * Actualiza un producto en la base de datos.
     *
     * Este método actualiza el producto identificado por su ID con los nuevos valores
     * proporcionados para el nombre, descripción, precio y categoría. Si la actualización
     * es exitosa, redirige a la página principal. En caso contrario, muestra un mensaje de error.
     *
     * @param int $id El ID del producto a actualizar.
     * @param string $nom El nuevo nombre del producto.
     * @param string $descripcio La nueva descripción del producto.
     * @param float $preu El nuevo precio del producto.
     * @param int $categoria El ID de la nueva categoría del producto.
     * 
     * @return void
     */
    public function actualizar($id, $nom, $descripcio, $preu, $categoria) {
        // Verifica si todos los campos requeridos están presentes
        if (!isset($id) || !isset($nom) || !isset($descripcio) || !isset($preu) || !isset($categoria)) {
            echo '<p>Se requieren todos los campos para actualizar el producto.</p>';
            return;
        }

        // Crea una instancia de la clase de conexión
        $conexionObj = new Connexio();
        // Obtiene la conexión a la base de datos
        $conexion = $conexionObj->obtenirConnexio();

        // Escapa las variables para prevenir SQL injection
        $id = $conexion->real_escape_string($id);
        $nom = $conexion->real_escape_string($nom);
        $descripcio = $conexion->real_escape_string($descripcio);
        $preu = $conexion->real_escape_string($preu);
        $categoria = $conexion->real_escape_string($categoria);

        // Construye la consulta SQL de actualización
        $consulta = "UPDATE productes
                     SET nom = '$nom', descripció = '$descripcio', preu = '$preu', categoria_id = '$categoria'
                     WHERE id = '$id'";

        // Ejecuta la consulta y redirige a la página principal si tiene éxito
        if ($conexion->query($consulta) === TRUE) {
            header('Location: Principal.php');
            exit();
        } else {
            // Muestra un mensaje de error si la consulta falla
            echo '<p>Error al actualizar el producto: ' . $conexion->error . '</p>';
        }

        // Cierra la conexión a la base de datos
        $conexion->close();
    }
}

// Obtiene los valores del formulario (si existen)
/** 
 * @var int|null $id El ID del producto.
 * @var string|null $nom El nombre del producto.
 * @var string|null $descripcio La descripción del producto.
 * @var float|null $preu El precio del producto.
 * @var int|null $categoria El ID de la categoría del producto.
 */
$id = isset($_POST['id']) ? $_POST['id'] : null;
$nom = isset($_POST['nom']) ? $_POST['nom'] : null;
$descripcio = isset($_POST['descripcio']) ? $_POST['descripcio'] : null;
$preu = isset($_POST['preu']) ? $_POST['preu'] : null;
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;

// Crea una instancia de la clase Actualitzar y llama al método actualizar
$actualizarProducto = new Actualitzar();
$actualizarProducto->actualizar($id, $nom, $descripcio, $preu, $categoria);

?>
