<?php 
    include "cabecera.php"; 
    include "conexion.php"; 

    if($_POST){

        print_r($_POST);
        $nombre=$_POST["nombre"];

        $objConexion = new Conexion();
        $sql="
            INSERT INTO proyectos (id, nombre, imagen, descripcion) VALUES (NULL, '$nombre', 'imagen.jpg', 'Un proyecto de hace mucho tiempo');
        ";
        
        $objConexion->ejecutar($sql);

    }    

    $objConexion = new Conexion();
    $resultado = $objConexion->consultar("SELECT * FROM proyectos;");
    print_r($resultado);

?>

<!-- Contenedor del formulario y tabla -->
<div class="container">
    <div class="row">
        
        <!-- Columna de Formulario -->
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Datos del proyecto</div>
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">
                        Nombre del proyecto: <input class="form-control" type="text" name="nombre" id="">
                        <br>
                        Imagen del proyecto: <input class="form-control" type="file" name="archivo" id="">
                        <br>
                        <input class="btn btn-success" type="submit" value="Enviar">
                    </form>
                </div>
            </div>
            
        </div>
        
        <!-- Columna de Tabla -->
        <div class="col-md-7">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <td>1</td>
                        <td>Aplicación web</td>
                        <td>imagen.jpg</td>
                    </tr>
                    
                </tbody>
            </table>
            
        </div>
        
    </div>
</div>








<?php include "pie.php"; ?>