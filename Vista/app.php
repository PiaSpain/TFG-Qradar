
<?php 
require "layout/header.php" 
?>


<main role="main" class="container">
    <div class="row">
    <div class="col-md-4">
        <!-- Si existe dentro de la sesión la variable sesión significa que hay un dato modificado
                    Quiere decir que se ha rellenado algún formulario 
                    Con esto modificamos el color del div que funciona como alert a través de bootstap -->
        <?php if(isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dimissible fade show" role="alert">
            <!-- Muestra desde sesión el mensaje que tenemos guardado -->
            <?= $_SESSION['message'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- Una vez estmos mostrando este mensaje eliminamos las variables de la sesión -->
        <?php unset ( $_SESSION['message'], $_SESSION['message_type']); }?>
        <!-- Limpia los datos que tenemos en las variables para diferentes tipos de alerts futuros -->
        </div>
        <!-- Lista todos los vuelos que vayamos creando -->
        <div class="col-12">
            <h1>Log Source Management</h1>
            <div class="table-responsive">
                <table class="table table-striped table-light table-bordered table-hover">
                    <!-- CABECERA -->
                    <thead>
                        <!-- Título -->
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Log Source Type</th>
                            <th>Creation Date</th> 
                            <th>Last Event</th> 
                            <th>Enable</th>
                            <th>Edit / Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        #Pedimos todos los datos de la tabla
                        //Accedemos al controlador
                        require_once("../controlador/controlador.php");
                        $metodo = 'muestro';
                        // Generamos una variable vacía para la llamada a la función muestroDatos y muestre todos los datos de la tabla
                        $vacio="";
                        if(method_exists("logController",$metodo)):
                            //llamámos al método
                            $results=logController::{$metodo}($vacio,$vacio);

                        // $results tiene todas los vuelos guardads, Con el foreach los recorremos para poder pintarlos
                        // Con el primer bucle foreach obtenemos el valor de las key del array multidimensional $results
                        foreach ($results as $key => $dato)
                        // Con este segundo bucle foreach obtenemos el valor de las keys
                        foreach($dato as $result) {?>
                        <!-- por cada recorrido obtenemos una fila  -->
                        <tr>
                            <td><?php echo $result['id'] ?></td>
                            <td><?php echo $result['name']?></td>
                            <td><?php echo $result['logSourceType']?></td>
                            <td><?php echo $result['creationDate']?></td>
                            <td><?php echo $result['LastEvent']?></td>
                            <td><?php echo $result['Enabled']?></td>
                            <td>
                                <!-- son enlaces pero lucen como botones por la clase de bootstrap  -->
                                <!-- Le paso a las páginas los nVuelos de los vuelos -->
                                <a href="editLog.php?id=<?php echo $result['id']?>" class="btn btn-secondary"><i
                                        class="fas fa-marker"></i></a>
                                <a href="deleteLog.php?id=<?php echo $result['id']?>" class="btn btn-danger"><i
                                        class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php }endif;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <!-- FORMULARIO envio de nuevo vuelo mediante post -->
            <form action="addLog.php" method="POST">
                <input type="submit" class="btn btn-success btn-block" name="addLog" value="Añadir nuevo vuelo">
            </form>
        </div>
    </div>
</main>


<?php
#require "modal/ventana.php"  
require "layout/footer.php" 
?>