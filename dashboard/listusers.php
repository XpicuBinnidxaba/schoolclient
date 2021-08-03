<?php require_once "vistas/parte_superior.php"?>

<?php
    $url = 'http://localhost:8080/api/user/all';
    $ch = curl_init($url);
    
    // Set the content type to application/json
    //curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    
    // Return response instead of outputting
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // Execute the POST request
    $result = curl_exec($ch);
    
    // Close cURL resource
    curl_close($ch);
    
    $data = json_decode($result, TRUE);

?>
<div class="container">
    <h1>Consultar Alumnos</h1>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <!--th>Id</th-->
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Sexo</th>
                                <th>Grado Escolar</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($data['data'] as $student) {
                            ?>
                                <tr>
                                    <!--td><?php echo $student['id'] ?></td-->
                                    <td><?php echo $student['name'] ?></td>
                                    <td><?php echo $student['lastnamef'] . " " . $student['lastnamef'] ?></td>
                                    <td><?php echo date("d-m-Y", strtotime( $student['birthday']) ); ?></td>
                                    <td><?php echo $student['gender'] ?></td>
                                    <td><?php echo $student['studygrade'] ?></td>
                                    <td><?php echo $student['email'] ?></td>
                                    <td><?php echo $student['phone'] ?></td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!--/div-->
<?php require_once "vistas/parte_inferior.php"?>