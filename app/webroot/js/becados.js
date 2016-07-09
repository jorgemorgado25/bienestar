$(document).ready(function() {

	cargar_dependencia();
	cargar_activos();
	cargar_culminados();

	$("#frmDependencia").submit(function (e) {
		serializedForm = $("#frmDependencia").serialize();
		$.ajax({
			type: "POST",
			url: Host + "becados/update_dependencia",
			data: serializedForm,
			success: function(data)
			{
				cargar_dependencia();
				$("#modal-dependencia").modal('toggle');
			}
		});
		e.preventDefault();
	});

	$("#frmActivo").submit(function (e) {
		serializedForm = $("#frmActivo").serialize();
		$.ajax({
			type: "POST",
			url: Host + "becados/update_activo",
			data: serializedForm,
			success: function(data){
				cargar_activos();
				$("#modal-activo").modal('toggle');
				data = JSON.parse(data);
				$('#sel-status').empty();
				$('#observaciones').val("");
				if(data==0)
				{
					$('#sel-status').append('<option value=""></option><option value="1">Regular</option><option value="2">Reincorporado</option><option value="3">Otro</option>');					
					$('#hidden-activo').val(1);
				}else{
					$('#sel-status').append('<option value=""></option><option value="10">No renovó</option><option value="11">Egresó</option><option value="12">Beca Culminada</option><option value="13">Otro</option>');
					$('#hidden-activo').val(0);
				}

				//$(location).attr("href","<?php echo $this->webroot ?>becados" + '/index/' + <?php echo $becado['Becado'][''] ?>);
				location.reload();
			}
		});
		e.preventDefault();
	});

	$("#frmCulminado").submit(function (e) {
		serializedForm = $("#frmCulminado").serialize();
		$.ajax({
			type: "POST",
			url: Host + "becados/update_culminado",
			data: serializedForm,
			success: function(data){
				cargar_culminados();
				//cargar_activos();
				$("#modal-culminado").modal('toggle');
				data = JSON.parse(data);
				$('#sel-status').empty();
				$('#observaciones').val("");
				if(data==0)
				{
					$('#td-activo').hmtl('Sí');
					$('#sel-status').append('<option value=""></option><option value="1">Regular</option><option value="2">Reincorporado</option><option value="3">Otro</option>');					
					$('#hidden-activo').val(1);
				}else{
					$('#td-activo').hmtl('No');
					$('#sel-status').append('<option value=""></option><option value="10">No renovó</option><option value="11">Egresó</option><option value="12">Beca Culminada</option><option value="13">Otro</option>');
					$('#hidden-activo').val(0);
				}
			}
		});
		e.preventDefault();
	});

});

function cargar_dependencia()
{
	var tablaDatos = $("#datos-dependencia");
	tablaDatos.empty();
	var route = Host + 'becados/Hdep/'+ $("#becado_id").val();
	$.get(route,function(res){
		res=JSON.parse(res);
		for (index = 0; index < res.length; ++index) {
			tablaDatos.append("<tr><td>"+res[index]['Dependencia']['nombre']+"</td><td>"+res[index]['Hdependencia']['observaciones']+"</td><td>"+res[index]['Hdependencia']['created']+"</td></tr>");
		}
		$("#td-dependencia").html(res[0]['Dependencia']['nombre']);
	});
}

function cargar_activos()
{
	var tablaDatos = $("#datos-activo");
	tablaDatos.empty();
	var route = Host + 'becados/Hact/'+ $("#becado_id").val();
	$.get(route,function(res)
	{			
		console.log(res);
		res = JSON.parse(res);
		for (index = 0; index < res.length; ++index)
		{
			tablaDatos.append("<tr><td>"+res[index]['Activo']['activo']+"</td><td>"+res[index]['Activo']['status']+"</td><td>"+res[index]['Activo']['observaciones']+"</td><td>"+res[index]['Activo']['created']+"</td></tr>");
		}
		$("#td-activo").html(res[0]['Activo']['activo']);		
	});
}

function cargar_culminados()
{
	console.log('Cargar culminados');
	var tablaDatos = $("#datos-culminado");
	tablaDatos.empty();
	var route = Host + 'becados/Hculminado/'+ $("#becado_id").val();
	$.get(route,function(res)
	{			
		console.log(res);
		res = JSON.parse(res);
		for (index = 0; index < res.length; ++index)
		{
			tablaDatos.append("<tr><td>"+res[index]['Hculminado']['culminado']+"</td><td>"+res[index]['Hculminado']['status']+"</td><td>"+res[index]['Hculminado']['ano_fin']+"</td><td>"+res[index]['Hculminado']['observaciones']+"</td><td>"+res[index]['Hculminado']['created']+"</td></tr>");
		}
		$("#td-culminado").html(res[0]['Hculminado']['culminado']);
		$("#td-ano-fin").html(res[0]['Hculminado']['ano_fin']);
	});

}