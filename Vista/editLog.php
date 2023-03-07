<?php
    include("layout/header.php")
?>


<main role="main" class="container">
    <div class="row">
        <!-- Lista todos los log que vayamos creando -->
        <div class="col-12">
            <h1>Gestión de Logs</h1>
            <div class="table-responsive">
                <table class="table table-striped table-light table-bordered table-hover">
                    <form action="saveLog.php" method="POST">
                        <?php 
                        //Pedimos todos los datos de la tabla
                        if(isset($_GET['id'])){
                        $_SESSION['id'] = $_GET['id'];
                        }
                         
                        #Pedimos todos los datos de la tabla
                        //Accedemos al controlador
                        require_once("../controlador/controlador.php");
                        $metodo = 'muestro';
                        $vacio = '';
                        if(method_exists("logController",$metodo)):
                            //llamámos al método
                            $results=logController::{$metodo}('id',$_SESSION['id']);


                        // $results tiene todas los vuelos guardads, Con el foreach los recorremos para poder pintarlos
                        // Con el primer bucle foreach obtenemos el valor de las key del array multidimensional $results
                       foreach ($results as $key => $dato)
                        // Con este segundo bucle foreach obtenemos el valor de las keys
                        foreach($dato as $result) {?>
                        <!-- por cada recorrido obtenemos una fila  -->
                        <!-- por cada recorrido obtenemos una fila  -->


                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Log Source Type</th>
                        </tr>
                        <tr>
                            <!-- El ID no puede ser modificado-->
                            <td> <?php echo $_SESSION['id'] ?> </td>
                            <td> <input type="text" name="name" placeholder="<?php echo $result['name'] ?>"> </td>
                            <td> <input type="text" name="type" placeholder="<?php echo $result['logSourceType'] ?>"> </td>
                        </tr>
                        <tr>
                            <th>Creation Date</th> 
                            <th>Last Event</th> 
                            <th>Enabled</th> 
                        </tr>
                        <tr>
                            <td> <input type="datetime" name="creationDate" placeholder="<?php echo$result['creationDate']?> "readonly="readonly"> </td>
                            <td> <input type="datetime" name="last" placeholder="<?php echo $result['LastEvent'] ?>" value="<?php echo date("Y-m-d H:i:s");?>"  readonly="readonly"> </td>
                             <?php if ($result['Enabled']){?>
                                    <td >
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="enabled1" checked>
                                            <label class="form-check-label">On</label>
                                        </div>
                                    </td>
                                    <?php }else{?>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox"  name="enabled">
                                            <label class="form-check-label">Off</label>
                                        </div>
                                    </td>
                                    <?php };?>
                        </tr>
                        

                        <?php }endif;?>
                        <!-- Ejecuta el formulario indica a php que hay datos para editar -->
                        <input type="submit" class="btn btn-success btn-block" name="editar" value="Editar Log">
                    </form>
                </table>
            </div>
        </div>
    </div>
</main>
<?php
    include("layout/footer.php")
?>