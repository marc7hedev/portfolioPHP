<?php 
    include "cabecera.php"; 
    include "conexion.php"; 

    //Recepcion de datos del formulario e inserción a la BBDD
    if($_POST){

        //print_r($_POST);
        $nombre=$_POST["nombre"];
        $descripcion=$_POST["descripcion"];
        $imagen=$_FILES["archivo"]["name"];

        $objConexion = new Conexion();
        $sql="
            INSERT INTO proyectos (id, nombre, imagen, descripcion) VALUES (NULL, '$nombre', '$imagen', '$descripcion');
        ";
        
        $objConexion->ejecutar($sql);
    }    

    // Botón de borrado
    if($_GET){
        $id = $_GET["borrar"];
        $objConexion = new Conexion();
        $sql = "DELETE FROM proyectos WHERE proyectos.id = '$id';";
        $objConexion->ejecutar($sql);

    }

    $objConexion = new Conexion();
    $proyectos = $objConexion->consultar("SELECT * FROM proyectos;");
    //print_r($proyectos);

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
                        Descripción: <textarea class="form-control" name="descripcion" rows="3"></textarea>
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
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    
                    <?php
                        foreach($proyectos as $proyecto){
                            echo "<tr>";
                                echo "<td>",$proyecto["id"],"</td>";
                                echo "<td>",$proyecto["nombre"],"</td>";
                                echo "<td>",$proyecto["imagen"],"</td>";
                                echo "<td>",$proyecto["descripcion"],"</td>";
                                echo "<td>
                                    <a class='btn btn-danger' href='?borrar=",$proyecto['id'],"'>Eliminar</a>
                                </td>";
                                
                            echo "</tr>";
                            
                        }
                    ?>    

                    
                </tbody>
            </table>
            
        </div>
        
    </div>
</div>








<?php include "pie.php"; ?>