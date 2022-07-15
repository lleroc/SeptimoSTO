jQuery().ready(() => { // cargaCombo();
    cargatabla();
    var idUsuario = jQuery('$Usuarios_Id').val();
    var idUsuario = document.getElementById('Usuarios_Id').value;
    if (idUsuario == undefined || parseInt(idUsuario) == 0) {
        document.getElementById('titulomodal').value = "Editar Usuario";
    } else {
        document.getElementById('titulomodal').value = "Nuevo Usuario";
    }
});
function init() {
    jQuery('#usuarios_form').on('submit', (e) => {
        guardar(e);
    })
}

var guardar = (e) => {
    e.preventDefault();
    var formData = new FormData(jQuery('#usuarios_form')[0]);
    var idUsuario = document.getElementById('Usuarios_Id').value;
    if (idUsuario == undefined || parseInt(idUsuario) == 0) {
        var accion = "../../controllers/usuarios.controllers.php?op=insertar";
    } else {
        var accion = "../../controllers/usuarios.controllers.php?op=editar";
    }
    jQuery.ajax({
        url: accion,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        cache: false,
        success: (res) => {
            res = JSON.parse(res);
            console.log(res);
            if (parseInt(res) === 1) {
                Swal.fire('Usuarios', 'Se guardo con éxito', 'success');
                cargatabla();
                jQuery('#modalUsuarios').modal('hide');
                document.getElementById('Usuarios_Id').value = 0;
            } else {
                Swal.fire('Usuarios', 'Comuniquese con el administrador', 'error');
            }
        }
    });
}

var cargaCombo = () => {
    var accion = '../../controllers/roles.controllers.php?op=TodosRoles';
    jQuery.get(accion, (roles) => {
        roles = JSON.parse(roles);
        var html = '';
        jQuery.each(roles, (index, val) => {
            html += "<option value=" + val.Roles_Id + ">" + val.Roles_Detalle + "</option>";
        })
        jQuery('#Usuario_IdRoles').html(html);
    });
}

var cargatabla = () => {
    var accion = '../../controllers/usuarios.controllers.php?op=todos';
    var html = '';
    jQuery.get(accion, (usuarios) => {
        usuarios = JSON.parse(usuarios);
        jQuery.each(usuarios, (index, val) => {
            html += '<tr>' + '<td class="serial">' + (
                index + 1
            ) + '</td>' + '<td><span class="name">' + val.Usuarios_Nombres + '</span> </td>' + '<td><span class="name">' + val.Usuarios_Apellidos + '</span> </td>' + '<td> <span class="product">' + val.Usuarios_Correo + '</span> </td>' + '<td>' + '<button class="btn btn-outline-success" onclick="editar(' + val.Usuarios_Id + ')">' + '<span class="ti-pencil-alt"></span></span>' + '</button>' + '<button class="btn btn-outline-danger" onclick="eliminar(' + val.Usuarios_Id + ')">' + ' <span class="ti-trash"></span></span>' + '</button>' + '</td>';
        });
        jQuery('#tablaUsuarios').html(html);
    });
}

var editar = (Usuarios_Id) => {
    cargaCombo();
    jQuery.post("../../controllers/usuarios.controllers.php?op=uno", {
        Usuarios_Id: Usuarios_Id
    }, (unUsuario) => {
        unUsuario = JSON.parse(unUsuario);
        document.getElementById("Usuarios_Id").value = unUsuario[0].Usuarios_Id;
        document.getElementById("Usuarios_Nombres").value = unUsuario[0].Usuarios_Nombres;
        document.getElementById("Usuarios_Apellidos").value = unUsuario[0].Usuarios_Apellidos;
        document.getElementById("Usuario_IdRoles").value = unUsuario[0].Usuario_IdRoles;
        document.getElementById("Usuarios_Correo").value = unUsuario[0].Usuarios_Correo;
        document.getElementById("Usuarios_Contrasenia").value = unUsuario[0].Usuarios_Contrasenia;
        document.getElementById('titulomodal').value = "Editar Usuario";
        jQuery('#modalUsuarios').modal('show');
        return unUsuario;
    });
};

var eliminar = (Usuarios_Id) => {
var accion = "../../controllers/usuarios.controllers.php?op=eliminar";
    Swal.fire({
        title: 'Usuarios',
        text: "Desea eliminar al usuario ",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar'
    }).then((result) => {
        if (result.isConfirmed) {

            jQuery.post(accion, {
                Usuarios_Id: Usuarios_Id
            }, (res) => {
                res = JSON.parse(res);
                if (parseInt(res) === 1) {
                    Swal.fire('Usuarios', 'Se eliminó con éxito', 'success');
                    cargatabla();
                    document.getElementById('Usuarios_Id').value = 0;
                } else {
                    Swal.fire('Usuarios', 
                    'No se pudo eliminar, por favor comuniquese con el administrador', 
                    'error');
                }
            })
        }
    })
};
 init();
