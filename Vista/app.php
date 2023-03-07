
<?php 
require "layout/header.php" 
?>


<main role="main" class="container2">
    
        <div class="row contenedor">
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
                <div class="col-sm-2 verticalmenu">
                    <div class="row encabezado">
                        <p class="col-sm-10">Filter</p>
                        <i class="fas fa-times col-sm-2"></i>
                    </div>
                    <p class="fw-bold">Status (5)</p>
                    <input class="form-check-input" type="checkbox" /> OK <br />
                    <input class="form-check-input" type="checkbox" /> Warning <br />
                    <input class="form-check-input" type="checkbox" /> Error <br />
                    <input class="form-check-input" type="checkbox" /> Not Available <br />
                    <input class="form-check-input" type="checkbox" /> Disabled <br />
                    <p class="fw-bold">Enabled (2)</p>
                    <input class="form-check-input" type="checkbox" /> Yes <br />
                    <input class="form-check-input" type="checkbox" /> No <br />
                    <p class="fw-bold">Log Surce Type (181)</p>
                    <input class="form-check-input" type="checkbox" /> Microsoft Windows Security <br />
                    <input class="form-check-input" type="checkbox" /> Aruba Mobility Controller <br />
                    <input class="form-check-input" type="checkbox" /> Linux OS <br />
                    <input class="form-check-input" type="checkbox" /> WinCollect <br />
                    <input class="form-check-input" type="checkbox" /> Cisco IOS <br />
                    <input class="form-check-input" type="checkbox" /> Cisco Aironet <br />
                    <input class="form-check-input" type="checkbox" /> Fortinet FortiGate <br />
                    <input class="form-check-input" type="checkbox" /> Cisco Meraki <br />
                    <input class="form-check-input" type="checkbox" /> SIM Generic <br />
                    <input class="form-check-input" type="checkbox" /> HP ProCurve <br />
                    <a href="#" class="fs-6">View more (171)</a><br />
                    <p class="fw-bold">Protocol Type (33)</p>
                    <input class="form-check-input" type="checkbox" /> Syslog <br />
                    <input class="form-check-input" type="checkbox" /> WinCollect <br />
                    <input class="form-check-input" type="checkbox" /> Log File <br />
                    <input class="form-check-input" type="checkbox" /> JDBC <br />
                    <input class="form-check-input" type="checkbox" /> WinCollect Microsoft <br />
                    <input class="form-check-input" type="checkbox" /> OPSEC/LEA <br />
                    <input class="form-check-input" type="checkbox" /> TLS Syslog <br />
                    <a href="#" class="fs-6">View more (23)</a><br />
                    <p class="fw-bold">Extension (20)</p>
                    <input class="form-check-input" type="checkbox" /> None <br />
                    <input class="form-check-input" type="checkbox" /> CheckPoint_ext <br />
                    <input class="form-check-input" type="checkbox" /> F5APM_ext <br />
                    <input class="form-check-input" type="checkbox" /> IIS_ext <br />
                    <input class="form-check-input" type="checkbox" /> FreeRADIUS_ext <br />
                    <input class="form-check-input" type="checkbox" /> CrowdStrike_ext <br />
                    <input class="form-check-input" type="checkbox" /> CustomTrend_ext <br />
                    <input class="form-check-input" type="checkbox" /> KasperskyCloud_ext <br />
                    <a href="#" class="fs-6">View more (10)</a><br />
                    <p class="fw-bold">Target Event Collector (76)</p>
                    <input class="form-check-input" type="checkbox" /> Not Set <br />
                    <input class="form-check-input" type="checkbox" /> eventcollector::142 <br />
                    <input class="form-check-input" type="checkbox" /> eventcollector::165 <br />
                    <input class="form-check-input" type="checkbox" /> eventcollector::782 <br />
                    <input class="form-check-input" type="checkbox" /> eventcollector::523 <br />
                    <input class="form-check-input" type="checkbox" /> eventcollector::461 <br />
                    <input class="form-check-input" type="checkbox" /> eventcollector::278 <br />
                    <input class="form-check-input" type="checkbox" /> eventcollector::557 <br />
                    <input class="form-check-input" type="checkbox" /> eventcollector::369 <br />
                    <p class="fw-bold">Internal (2)</p>
                    <input class="form-check-input" type="checkbox" /> Yes <br />
                    <input class="form-check-input" type="checkbox" /> No <br />
                    <p class="fw-bold">Deployed (2)</p>
                    <input class="form-check-input" type="checkbox" /> Yes <br />
                    <input class="form-check-input" type="checkbox" /> No <br />
                </div>
            
            
            <!-- Lista todos los logs que vayamos creando -->
            <div class="col-sm-10 Log-Source">
                <div class="row ">
                    <div class="filter col-sm-1 bg-white border-1  text-center">
                        <i class="fa fa-filter"></i>
                    </div>
                    <div class="search col-sm-10">
                        <form action="addLog.php" method="POST" class="d-flex">
                            <i class="fas fa-search"></i>
                            <input class="form-control me-2 border-2 border-primary w-75" type="search" placeholder=" Search" aria-label="Search">
                            <button class="btn text-white bg-primary" type="submit" name="addLog"  value="Add new Log">+ New Log source</button>
                            <button class="btn text-dark bg-primary" type="submit" name="addLog"  value="Add new Log"><i class="fas fa-caret-down"></i></button>
                        </form>
                    </div>
                </div>
                <div class="row encabezado">
                    <h3 class="fs-4 col-sm-10">Log Sources </h3>
                    <i class="fas fa-cog col-sm-2"></i>
                </div>
                                
                <!-- FORMULARIO envio de nuevo vuelo mediante post -->
                <div class="table-responsive col-11 tabla-logs">
                    <table class="table table-bordered table-hover ">
                        <!-- CABECERA -->
                        <thead class="table-secondary  text-black">
                            <!-- Título -->
                            <tr>
                                <th><input type="checkbox"></th>
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

                                // $results tiene todas los logs guardads, Con el foreach los recorremos para poder pintarlos
                                // Con el primer bucle foreach obtenemos el valor de las key del array multidimensional $results
                                foreach ($results as $key => $dato)
                                // Con este segundo bucle foreach obtenemos el valor de las keys
                                foreach($dato as $result) {?>
                                <!-- por cada recorrido obtenemos una fila  -->
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><?php echo $result['id'] ?></td>
                                    <td><?php echo $result['name']?></td>
                                    <td><?php echo $result['logSourceType']?></td>
                                    <td><?php echo $result['creationDate']?></td>
                                    <td><?php echo $result['LastEvent']?></td>
                                    <?php if ($result['Enabled']){?>
                                    <td >
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" checked>
                                            <label class="form-check-label">On</label>
                                        </div>
                                    </td>
                                    <?php }else{?>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" disabled>
                                            <label class="form-check-label">Off</label>
                                        </div>
                                    </td>
                                    <?php };?>
                                    <td>
                                        <!-- son enlaces pero lucen como botones por la clase de bootstrap  -->
                                        <!-- Le paso a las páginas los nlogs de los logs -->
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

        </div>
    
</main>


<?php
#require "modal/ventana.php"  
require "layout/footer.php" 
?>