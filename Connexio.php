<?php

/**
 * Clase para gestionar la conexión a la base de datos.
 * 
 * Esta clase contiene los detalles de la conexión a la base de datos 'la_meva_botiga'
 * y proporciona un método para obtener la conexión a dicha base de datos.
 */
class Connexio {
    
    /**
     * @var string $host Dirección del servidor de la base de datos.
     * 
     * Esta propiedad contiene la dirección del servidor donde se aloja la base de datos.
     * En este caso, está configurada como 'localhost' para una base de datos local.
     */
    private $host = "localhost";

    /**
     * @var string $usuario El nombre de usuario de la base de datos.
     * 
     * Esta propiedad contiene el nombre de usuario para conectarse a la base de datos.
     * En este caso, se utiliza 'root' como usuario por defecto.
     */
    private $usuario = "root";

    /**
     * @var string $contraseña La contraseña del usuario de la base de datos.
     * 
     * Esta propiedad contiene la contraseña para el usuario configurado en la base de datos.
     * En este caso, está configurada como una cadena vacía, lo que podría indicar
     * que no se requiere contraseña.
     */
    private $contraseña = "";

    /**
     * @var string $baseDatos Nombre de la base de datos a la que se conecta.
     * 
     * Esta propiedad contiene el nombre de la base de datos a la que se realizará la conexión.
     * En este caso, está configurada como 'la_meva_botiga'.
     */
    private $baseDatos = "la_meva_botiga";

    /**
     * Obtiene una conexión a la base de datos.
     *
     * Este método establece la conexión con la base de datos utilizando los parámetros
     * definidos en las propiedades de la clase. Si la conexión es exitosa, se devuelve
     * el objeto de conexión. Si hay un error de conexión, se detiene la ejecución
     * y muestra un mensaje de error.
     *
     * @return mysqli Devuelve el objeto de conexión a la base de datos.
     * 
     * @throws Exception Si la conexión a la base de datos falla, se lanza una excepción.
     */
    public function obtenirConnexio() {
        // Establece la conexión a la base de datos
        $conexion = new mysqli($this->host, $this->usuario, $this->contraseña, $this->baseDatos);

        // Verifica si hay errores en la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        return $conexion;
    }
}

?>
