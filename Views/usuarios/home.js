jQuery().ready(()=>{
    cargaCombo();
    cargatabla();
    
});
function init(){
    jQuery('#usuarios_form').on('submit', (e)=>{
        guardar(e);
    })
}

var guardar= (e)=>{
    e.preventDefault();
    var usuarios_form= new FormData(jQuery('#usuarios_form')[0]);
    var accion = '../../controllers/usuarios.controllers.php?op=insertar';
    jQuery.post(accion, {usuarios_form},(res)=>{
        if (res=='ok') {
           Swal.fire('Usuarios','Se guardo con éxito','success');
        }else{
            Swal.fire('Usuarios','Comuniquese con el administrador','error');
        }
    })
}

var cargaCombo = () => {
    var accion = '../../controllers/roles.controllers.php?op=TodosRoles';
    jQuery.get(accion, (roles)=>{
        roles = JSON.parse(roles);
        
        var html ='';
        jQuery.each(roles, (index, val)=>{
            html += "<option value="+ val.Roles_Id +">" + val.Roles_Detalle + "</option>";
        })
        jQuery('#Usuario_IdRoles').html(html);
    });
}

var cargatabla = ()=>{
    var accion ='../../controllers/usuarios.controllers.php?op=todos';
    var html = '';
    jQuery.get(accion, (usuarios)=>{
        usuarios = JSON.parse(usuarios);
        jQuery.each(usuarios, (index, val)=>{
            html +='<tr>' +
            '<td class="serial">' + (index + 1) + '</td>' + 
            '<td><span class="name">'+ val.Usuarios_Nombres +'</span> </td>'+
            '<td><span class="name">'+ val.Usuarios_Apellidos +'</span> </td>'+
            '<td> <span class="product">'+val.Usuarios_Correo+'</span> </td>'+
            '<td>'+
            '<button class="btn btn-outline-success" onclick="editar('+val.Usuarios_Id+')">'+
            '<span class="ti-pencil-alt"></span></span>'+
            '</button>' + 
            '<button class="btn btn-outline-danger" onclick="eliminar('+val.Usuarios_Id+')">'+
            ' <span class="ti-trash"></span></span>'+
            '</button>' + 
            '</td>';
        });
        jQuery('#tablaUsuarios').html(html);
    });
}

init();