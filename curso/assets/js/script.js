
$(function () {

});

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
            html +='	<input type="text" class="form-control" id="titulo" name="titulo" value="'+obj.data.titulo+'" />';
            html +='</div>';
            
            html +='<div class="form-group">';
            html +='	<label for="marca">Descripciòn</label>';
            html +='	<input type="text" class="form-control" id="descripcion" name="descripcion" value="'+obj.data.descripcion+'" />';
            html +='</div>';
            
            html +='<div class="form-group">';
            html +='	<label for="modelo">Estado</label>';
            html +='	<input type="text" class="form-control" id="estado" name="estado" value="'+obj.data.estado+'" />';
            html +='</div>';

            $("#detalle").html(html);
            $("#btn_modifica").hide();
            $("#btn_guarda").hide();
        }
    });
}

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
                html +='	<input type="text" class="form-control" id="descripcion" name="descripcion" value="'+obj.data.descripcion+'" />';
                html +='</div>';
                
                html +='<div class="form-group">';
                html +='	<label for="modelo">Estado</label>';
                html +='	<input type="text" class="form-control" id="estado" name="estado" value="'+obj.data.estado+'" />';
                html +='</div>';

                $("#detalle").html(html);
                $("#btn_modifica").show();
                $("#btn_guarda").hide();
                
            }
        });
    }else{
        alert('No puede modificar curso')
        $("#exampleModal").modal('hide')
    }
}


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


const guardarCurso = (id)=>{

        //$("#detalle").html('')
        let html ='';
        
        html +=' <div class="form-group">';
        html +='	<label for="placa">Titulo</label>';
        html +='	<input type="text" class="form-control" id="titulo" name="titulo" value="" />';
        html +='</div>';
        
        html +='<div class="form-group">';
        html +='	<label for="marca">Descripciòn</label>';
        html +='	<input type="text" class="form-control" id="descripcion" name="descripcion" value="" />';
        html +='</div>';
        
        html +='<div class="form-group">';
        html +='	<label for="modelo">Estado</label>';
        html +='	<input type="text" class="form-control" id="estado" name="estado" value="" />';
        html +='</div>';

        $("#detalle").html(html);
        $("#btn_modifica").hide();
        $("#btn_guarda").show();
                
}



const guardaCurso = ()=>{
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