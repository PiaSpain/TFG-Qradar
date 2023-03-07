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
                                <td> <input type="text" name="name" placeholder="Name"> </td>
                                <td> <input type="text" name="type" placeholder="Log Source Type"> </td>
                            </tr>
                            <tr>
                                <th>Creation Date</th>
                                <th>Last Event</th> 
                                <th>Enabled</th> 
                            </tr>
                            <tr>
                                <td> <input type="datetime" name="creationDate"  value="<?php echo date("Y-m-d H:i:s");?>" readonly="readonly"></td>
                                <td> <input type="datetime" name="last" value="<?php echo date("Y-m-d H:i:s");?>" readonly="readonly"> </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="enabled1" value="1">
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