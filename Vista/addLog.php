<?php
    include("layout/header.php")
?>
<main role="main" class="container">
     <div class="row">
        <div class="col-12">
            <h1>New Log</h1>
            <div class="table-responsive">
                <table class="table table-striped table-light table-bordered table-hover">

                        <form action="saveLog.php" method="POST">

                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Log Source Type</th>
                            </tr>
                            <tr>
                                <td> <input type="text" name="id" placeholder="ID" autofocus> </td> 
                                <td> <select name="name" id="name">
                                        <label for="name">name</label>
                                        <option value="name">Name</option>
                                        <option value="A10@10.60.0.38">A10@10.60.0.38</option>
                                        <option value="ACK Alert @ Cerved">ACK Alert @ Cerved</option>
                                        <option value="FortiGate@10.10.10.1">FortiGate@10.10.10.1</option>
                                        <option value="LucartDNS@192.168.130.14">LucartDNS@192.168.130.14</option>
                                        <option value="ACK ALERT@192.168.244.31">ACK ALERT@192.168.244.31</option>
                                        <option value="FortiGate@10.20.1.1">FortiGate@10.20.1.1</option>
                                        <option value="MWS@sv3330.logista.local">MWS@sv3330.logista.local</option>
                                    </select>
                                </td>
                               <!-- <td> <input type="text" name="name" placeholder="Name"> </td>-->
                                <td> <select name="type" id="type">
                                        <label for="type">Log Source Type</label>
                                        <option value="Log Source Type">Log Source Type</option>
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
                                <!-- <td> <input type="text" name="type" placeholder="Log Source Type"> </td>-->
                            </tr>

                            <tr>
                                <th>Extension</th>
                                <th>Creation Date</th>
                                <th>Last Event</th> 
                                <th>Enabled</th> 
                            </tr>
                            <tr>
                                <td> <select name="extension" id="extension">
                                        <label for="extension">Extension</label>
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
                                <td> <input type="datetime" name="creationDate"  value="<?php echo date("Y-m-d H:i:s");?>" readonly="readonly"></td>
                                <td> <input type="datetime" name="last" value="<?php echo date("Y-m-d H:i:s");?>" readonly="readonly"> </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="enabled1" id="enabled1" value="1">
                                        <label class="form-check-label">ON</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox"  name="enabled0" value="0">
                                        <label class="form-check-label">OFF</label>
                                    </div>
                                </td>
                            </tr>

                            <!-- Ejecuta el formulario - save task indica a php que hay datos para guardar -->
                            <input type="submit" class="btn btn-primary btn-block" name="Guardar" value="Guardar Log">
                        </form>
                </table>

            </div>
        </div>
    </div>
</main>
<?php
    include("layout/footer.php")
?>