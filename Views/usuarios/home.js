jQuery().ready(()=>{
    cargaCombo();
});
function init(){
    jQuery('#usuarios_form').on('submit', (e)=>{
        guardar(e);
    })
}

var guardar= (e)=>{
    e.preventDefault();
    var usuarios_form= new FormData(jQuery('#usuarios_form')[0]);
    var accion = '';
    jQuery.post(accion, {usuarios_form},(res)=>{
        if (res=='ok') {
            alert('Se guardo con exito')
        }else{
            alert('error al guardar')
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
init();