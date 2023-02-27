
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
            <h1>Gestión de vuelos</h1>
            <div class="table-responsive">
                <table class="table table-striped table-light table-bordered table-hover">
                    <!-- CABECERA -->
                    <thead>
                        <!-- Título -->
                        <tr>
                            <th>Numero vuelo</th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>ETD</th> <!-- Estimated Time of Departure-->
                            <th>ETA</th> <!-- Estimated Time of Arrival-->
                            <th>ATD</th> <!-- Actual Time of Departure-->
                            <th>ATA</th> <!-- Actual Time of Arrival-->
                            <th>Pasajeros</th>
                            <th>Editar / Eliminar</th>
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
                        if(method_exists("flightController",$metodo)):
                            //llamámos al método
                            $results=flightController::{$metodo}($vacio,$vacio);

                        // $results tiene todas los vuelos guardads, Con el foreach los recorremos para poder pintarlos
                        // Con el primer bucle foreach obtenemos el valor de las key del array multidimensional $results
                        foreach ($results as $key => $dato)
                        // Con este segundo bucle foreach obtenemos el valor de las keys
                        foreach($dato as $result) {?>
                        <!-- por cada recorrido obtenemos una fila  -->
                        <tr>
                            <td><?php echo $result['nVuelo'] ?></td>
                            <td><?php echo $result['Origen']?></td>
                            <td><?php echo $result['Destino']?></td>
                            <td><?php echo $result['ETD']?></td>
                            <td><?php echo $result['ETA']?></td>
                            <td><?php echo $result['ATD']?></td>
                            <td><?php echo $result['ATA']?></td>
                            <td><?php echo $result['pax']?></td>
                            <td>
                                <!-- son enlaces pero lucen como botones por la clase de bootstrap  -->
                                <!-- Le paso a las páginas los nVuelos de los vuelos -->
                                <a href="editFlight.php?nVuelo=<?php echo $result['nVuelo']?>" class="btn btn-secondary"><i
                                        class="fas fa-marker"></i></a>
                                <a href="deleteFlight.php?nVuelo=<?php echo $result['nVuelo']?>" class="btn btn-danger"><i
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
            <form action="addFlight.php" method="POST">
                <input type="submit" class="btn btn-success btn-block" name="addFlight" value="Añadir nuevo vuelo">
            </form>
        </div>
    </div>
</main>

<?php 
require "layout/footer.php" 
?>