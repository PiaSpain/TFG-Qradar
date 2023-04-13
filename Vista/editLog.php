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
                            <td> <select name="name" id="name">
                                        <label for="name">name</label>
                                        <option value="<?php echo $result['name'] ?>"><?php echo $result['name'] ?></option>
                                        <option value="A10@10.60.0.38">A10@10.60.0.38</option>
                                        <option value="ACK Alert @ Cerved CMGVS00CO2">ACK Alert @ Cerved CMGVS00CO2</option>
                                        <option value="FortiGate@10.10.10.1">FortiGate@10.10.10.1</option>
                                        <option value="LucartDNS@192.168.130.14">LucartDNS@192.168.130.14</option>
                                        <option value="ACK ALERT@192.168.244.31">ACK ALERT@192.168.244.31</option>
                                        <option value="FortiGate@10.20.1.1">FortiGate@10.20.1.1</option>
                                        <option value="MWS@sv3330.logista.local">MWS@sv3330.logista.local</option>
                                    </select>
                                </td>
                            <td> <select name="type" id="type">
                                        <label for="type">Log Source Type</label>
                                        <option value="<?php echo $result['logSourceType'] ?>"><?php echo $result['logSourceType'] ?></option>
                                        <option value="Microsoft Windows Security">Microsoft Windows Security</option>
                                        <option value="Aruba Mobility Controller">Aruba Mobility Controller</option>
                                        <option value="ACK ALERT">ACK ALERT</option>
                                        <option value="Linux OS">Linux OS</option>
                                        <option value="Cisco IOS">Cisco IOS</option>
                                        <option value="Cisco Aironet">Cisco Aironet</option>
                                        <option value="Fortinet FortiGate">Fortinet FortiGate</option>
                                        <option value="Cisco Meraki">Cisco Meraki</option>
                                        <option value="SIM Generic">SIM Generic</option>
                                        <option value="HP ProCurve">HP ProCurve</option>
                                    </select>
                                </td>
                        </tr>
                        <tr>
                                <th>Protocol Type</th>
                                <th>Extension</th>
                                <th>Targer Event Collector</th>
                            </tr>
                             <tr>
                                <td> <select name="protocol" id="protocol">
                                        <label for="protocol">Protocol Type</label>
                                        <option value="<?php echo $result['protocolType'] ?>"><?php echo $result['protocolType'] ?></option>
                                        <option value="Syslog">Syslog</option>
                                        <option value="WinCollect">WinCollect</option>
                                        <option value="Log File">Log File</option>
                                        <option value="JDBC">JDBC</option>
                                        <option value="WinCollect Microsoft">WinCollect Microsoft</option>
                                        <option value="OPSEC/LEA">OPSEC/LEA</option>
                                        <option value="TLS Syslog">TLS Syslog</option>
                                    </select>
                                </td> 
                                <td> <select name="extension" id="extension">
                                        <label for="extension">Extension</label>
                                        <option value="<?php echo $result['extension'] ?>"><?php echo $result['extension'] ?></option>
                                        <option value="none">None</option>
                                        <option value="CheckPoint_ext">CheckPoint_ext</option>
                                        <option value="F5APM_ext">F5APM_ext</option>
                                        <option value="IIS_ext">IIS_ext</option>
                                        <option value="FreeRADIUS_ext">FreeRADIUS_ext</option>
                                        <option value="CrowdStrike_ext">CrowdStrike_ext</option>
                                        <option value="CustomTrend_ext">CustomTrend_ext</option>
                                        <option value="KasperskyCloud_ext">KasperskyCloud_ext</option>
                                    </select>
                                </td>
                                <td> <select name="targeteventcollector" id="targeteventcollector">
                                        <label for="targeteventcollector">Target Event Collector</label>
                                        <option value="<?php echo $result['targeteventcollector'] ?>"><?php echo $result['targeteventcollector'] ?></option>
                                        <option value="EC::142">EC::142</option>
                                        <option value="EC::165">EC::782</option>
                                        <option value="EC::523">EC::523</option>
                                        <option value="EC::461">EC::461</option>
                                        <option value="EC::917">EC::917</option>
                                        <option value="EC::278">EC::278</option>
                                        <option value="EC::557">EC::557</option>
                                        <option value="EC::369">EC::369</option>
                                        <option value="EC::354">EC::354</option>
                                        <option value="EC::862">EC::862</option>
                                    </select>
                                </td>
                            </tr>
                        <tr>
                            <th>Creation Date</th> 
                            <th>Last Event</th> 
                            <th>Enabled</th> 
                        </tr>
                        <tr>
                            <td> <input type="datetime" name="creationDate" placeholder="<?php echo$result['creationDate']?> "readonly="readonly"> </td>
                            <td> <input type="datetime" name="last" placeholder="<?php echo $result['lastEvent'] ?>" value="<?php echo date("Y-m-d H:i:s");?>"  readonly="readonly"> </td>
                             <?php if ($result['enabled']){?>
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