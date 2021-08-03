<?php require_once "vistas/parte_superior.php"?>

<div class="container">
    <h1>Agregar Alumno</h1>
    <br>

    <div id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1cc88a; color: white">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Alumnno</h5>
                </div>

                <form id="formPersonas" data-toggle="validator">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="lastnamef" class="col-form-label">Apellido Paterno:</label>
                            <input type="text" class="form-control" id="lastnamef" name="lastnamef">
                        </div>
                        <div class="form-group">
                            <label for="lastnamem" class="col-form-label">Apellido Materno:</label>
                            <input type="text" class="form-control" id="lastnamem" name="lastnamem">
                        </div>
                        <div class="form-group date">
                            <label for="birthday" class="col-form-label">Fecha de Nacimiento:</label>
                            <input type="text" class="form-control" id="birthday" name="birthday">
                        </div>
                        <div class="form-group">
                            <label for="gender">Sexo:</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="studygrade" class="col-form-label">Grado de estudios actual:</label>
                            <input type="text" class="form-control" id="studygrade" name="studygrade">
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-form-label">Teléfono:</label>
                            <input type="number" class="form-control" id="phone" name="phone">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>