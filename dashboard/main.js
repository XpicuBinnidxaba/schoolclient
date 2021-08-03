$(document).ready(function(){
    tablaPersonas = $("#tablaPersonas").DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });

$('#birthday').datepicker({
    uiLibrary: 'bootstrap4'
});

$('#formPersonas').bootstrapValidator({
    feedbackIcons: {
      valid: 'glyphicon glyphicon-ok',
      invalid: 'glyphicon glyphicon-remove',
      validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        name: {
            validators: {
                notEmpty: {
                    message: 'El Nombre es requerido'
                }
            }
        },
        lastnamef: {
            validators: {
                notEmpty: {
                    message: 'El Apellido Paterno es requerido'
                }
            }
        },
        lastnamem: {
            validators: {
                notEmpty: {
                    message: 'El Apellido Materno es requerido'
                }
            }
        },
        birthday: {
            validators: {
                notEmpty: {
                    message: 'La Fecha de Nacimiento es requerida'
                },
                date: {
                    format: 'DD/MM/YYYY',
                    message: 'Formato requerido DD/MM/YYYY'
                }
            }
        },
        studygrade: {
            validators: {
                notEmpty: {
                    message: 'El Grado de Estudio es requerido'
                }
            }
        },
        email: {
            validators: {
                notEmpty: {
                    message: 'El Email es requerido'
                }
            }
        },
        phone: {
            validators: {
                digits: {
                    message: 'Solo puede contener dígitos'
                },
                notEmpty: {
                    message: 'El Teléfono es requerido'
                }
            }
        }
    }
});
$('#birthday').change(function(e) {
    $('#formPersonas').bootstrapValidator('revalidateField', 'birthday');
});
    
$("#formPersonas").submit(function(e){
    e.preventDefault();

    var name = $.trim($("#name").val());
    var lastnamef = $.trim($("#lastnamef").val());
    var lastnamem = $.trim($("#lastnamem").val());
    var birthday = $("#birthday").val();
    var gender = $.trim($("#gender").val());
    var studygrade = $.trim($("#studygrade").val());
    var email = $.trim($("#email").val());
    var phone = $.trim($("#phone").val());

    if ( name.length == "" || lastnamef.length == "" || lastnamem.length == "" || birthday.length == "" || gender.length == "" || studygrade.length == "" || email.length == "" || phone.length == "" ) {
        Swal.fire({
            type:'warning',
            title:'Debe completar el formulario',
        });
        return false;
    }

    var dateMomentObject;
    try {
        dateMomentObject = moment(birthday,"MM-DD-YYYY").format("YYYY-MM-DD HH:mm:ss");
      } catch (error) {
        Swal.fire({
            type:'warning',
            title:'Verifique su información'
        });
        return false;
      }

    $.ajax({
        url:"http://localhost:8080/api/user",
        type:"POST",
        dataType: "json",
        contentType: "application/json",
        data: JSON.stringify( { name:name, lastnamef:lastnamef, lastnamem:lastnamem, birthday:dateMomentObject,
                                gender:gender, studygrade:studygrade, email:email, phone:phone,
                                password:"123", roles: [{"id":2}]
                            } ),
        success: function(response){
            if(response == "null"){
                Swal.fire({
                    type:'error',
                    title:'Error al crear el usuario',
                });
            }else{
                if ( response.status === 'SUCCESS' ) {
                    Swal.fire({
                        type:'success',
                        title:'¡Usuario creado!'
                     }).then((result) => {
                         if(result.value){
                             //console.log("redirect to");
                             //window.location.href = "vistas/pag_inicio.php";
                             //window.location.href = "dashboard/adduser.php";
                         }
                     })
                 } else {
                     Swal.fire({
                         type:'error',
                         title:response.messageStatus,
                     });
                 }
            }
        }        
    });   

});    
    
});