
$(function () {

});
/**
 * Funcion que realiza registro usuario
 * @returns 
 * 21/05/2024
 */

const registroUsuario = ()=>{

    let campos = $( "#registro" ).serializeArray();
    let flag = 0;
    campos.forEach(campo => {
        if(campo.value ==''){
            $("#"+campo.name+"_r").text('Campo obligatorio').addClass("sizeTextAlet")
            flag++;
        }else{
            $("#"+campo.name+"_r").text('')
        }
    });
    if(flag>0){
        return;
    }

    $.ajax({
        url: 'index.php?c=register&a=guarda',
        datatype: 'json',
        type: 'POST',
        data: {
                nombre:$("#nombre").val(),
                email: $("#email_register").val(),
                clave: $("#pwd_register").val()
            },
        success: (dataController) => {
            let obj = $.parseJSON(dataController );
            if(obj.data==0){
                $("#email_register_r").text('E-mail ya ingresado').addClass("sizeTextAlet")
            }else{
                $("#exampleModal").modal('hide')
            }
        }
    });

}

/**
 * Funcion que muestra modal con formulario para detalle curso
 * @returns 
 * 21/05/2024
 */
const detalleCurso = (id)=>{
    let html ='';
    $.ajax({
        url: 'index.php?c=cursos&a=detalle&id='+id,
        datatype: 'json',
        type: 'GET',
        success: (dataController) => {
            let obj = $.parseJSON(dataController );

            html +=' <div class="form-group">';
            html +='	<label for="placa">Titulo</label>';
            html +='	<input type="text" class="form-control" id="titulo" name="titulo" value="'+obj.data.titulo+'" disabled/>';
            html +='</div>';
            
            html +='<div class="form-group">';
            html +='	<label for="marca">Descripciòn</label>';
            html +='	<textarea maxlength="50" class="form-control" id="descripcion" name="descripcion" disabled>'+obj.data.descripcion+'</textarea>';
            html +='</div>';
            let estado = 'ACTIVO';
            if(obj.data.estado==0){
                estado = 'INACTIVO';
            }
            
            html +='<div class="form-group">';
            html +='	<label for="modelo">Estado</label>';
            html +='	<input type="text" class="form-control" id="estado" name="estado" value="'+estado+'" disabled/>';
            html +='</div>';

            $("#detalle").html(html);
            $("#btn_modifica").hide();
            $("#btn_guarda").hide();
        }
    });
}

/**
 * Funcion que muestra modal con formulario para modificar curso
 * @returns 
 * 21/05/2024
 */
const modificarCurso = (id, tipo)=>{

    if(tipo>0){

        $("#detalle").html('')
        let html ='';
        
        $.ajax({
            url: 'index.php?c=cursos&a=detalle&id='+id,
            datatype: 'json',
            type: 'GET',
            success: (dataController) => {

                let obj = $.parseJSON(dataController );

                html +=' <div class="form-group">';
                html +='<input type="hidden" id="id" name="id" value="'+obj.data.id_curso+'" />';
                html +='	<label for="placa">Titulo</label>';
                html +='	<input type="text" class="form-control" id="titulo" name="titulo" value="'+obj.data.titulo+'" />';
                html +='</div>';
                
                html +='<div class="form-group">';
                html +='	<label for="marca">Descripciòn</label>';
                html +='	<textarea maxlength="50" class="form-control" id="descripcion" name="descripcion">'+obj.data.descripcion+'</textarea>';
                html +='</div>';


              
                html +='<div class="form-group">';
                html +='	<label for="modelo">Estado</label>';
                //html +='	<input type="text" class="form-control" id="estado" name="estado" value="'+obj.data.estado+'" />';
              
                    html +='<select class="form-control" id="estado" name="estado">';
                    html +='<option value="">Seleccione Estado</option>';
                    html +='<option value="1">ACTIVO</option>';
                    html +='<option value="0">INACTIVO</option>';
                    html +='</select>';
                
                html +='</div>';

                $("#detalle").html(html);

                $("#estado option[value=" + obj.data.estado + "]").attr("selected", true);
                $("#btn_modifica").show();
                $("#btn_guarda").hide();
                
            }
        });
    }else{
        alert('No puede modificar curso')
        $("#exampleModal").modal('hide')
    }
}

/**
 * Funcion que realiza actualiza detalle del curso
 * @returns 
 * 21/05/2024
 */
const actualizarCurso = ()=>{
    $.ajax({
        url: 'index.php?c=cursos&a=actualizar',
        datatype: 'json',
        type: 'POST',
        data: {
            id:$("#id").val(),
            titulo:$("#titulo").val(),
            descripcion: $("#descripcion").val(),
            estado: $("#estado").val()
        },
        success: (dataController) => {
            
           $("#exampleModal").modal('hide')
           location.reload();
           
        }
    });
}

/**
 * Funcion que realiza elimina curso
 * @returns 
 * 21/05/2024
 */
const eliminarCurso = (id, tipo)=>{

    if(tipo>0){
        if (confirm("Desea eliminar este curso") == true) {
            $.ajax({
                url: 'index.php?c=cursos&a=eliminar',
                datatype: 'json',
                type: 'POST',
                data: {
                    id:id
                },
                success: (dataController) => {
                    
                   location.reload();
                   
                }
            });  
          }

    }else{
        alert("No puede eliminar curso")
    }
}

/**
 * Funcion que muestra modal con formulario para guarda curso
 * @returns 
 * 21/05/2024
 */
const guardarCurso = (id)=>{

        //$("#detalle").html('')
        let html ='';
        html +='<form name="registro" id="registro">';
        html +=' <div class="form-group">';
        html +='	<label for="placa">Titulo<span id="titulo_r"></span></label>';
        html +='	<input type="text" class="form-control" id="titulo" name="titulo" value="" />';
        html +='</div>';
        
        html +='<div class="form-group">';
        html +='	<label for="marca">Descripciòn<span id="descripcion_r"></span></label>';
        html +='	<textarea maxlength="50" class="form-control" id="descripcion" name="descripcion"></textarea>';
        html +='</div>';
        
        html +='<div class="form-group">';
        html +='	<label for="modelo">Estado<span id="estado_r"></span></label>';
        html +='<select class="form-control" id="estado" name="estado">';
        html +='<option value="">Seleccione Estado</option>';
        html +='<option value="1">ACTIVO</option>';
        html +='<option value="0">INACTIVO</option>';
        html +='</select>';
        html +='</div>';
        html +='</form>';
        $("#detalle").html(html);
        $("#btn_modifica").hide();
        $("#btn_guarda").show();
                
}


/**
 * Funcion que guarda curso
 * @returns 
 * 21/05/2024
 */
const guardaCurso = ()=>{
    let campos = $( "#registro" ).serializeArray();
    let flag = 0;
    campos.forEach(campo => {
        if(campo.value ==''){
            $("#"+campo.name+"_r").text('Campo obligatorio').addClass("sizeTextAlet")
            flag++;
        }else{
            $("#"+campo.name+"_r").text('')
        }
    });
    if(flag>0){
        return;
    }
    $.ajax({
        url: 'index.php?c=cursos&a=guarda',
        datatype: 'json',
        type: 'POST',
        data: {

            titulo:$("#titulo").val(),
            descripcion: $("#descripcion").val(),
            estado: $("#estado").val()
        },
        success: (dataController) => {
            
           $("#exampleModal").modal('hide')
           location.reload();
           
        }
    });
}