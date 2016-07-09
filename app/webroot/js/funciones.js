$(document).ready(function() {

	$('#cedula, #cedula-edit, #telefono, #codigo').numeric("integer");
	$('#promedio').numeric();

	$('#n_materias, #n_aplazadas').numeric("integer");

	/*$("#nombres, #apellidos").alphanum({
    	allowNumeric  : false
	});*/

	$("#nombres, #apellidos").alpha();

	/********** ADD ***************/
	$("#cedula").focusout(function() {
		cedula_registrada();
	});

	$("#codigo").focusout(function() {
		codigo_registrado();
	});

	$("#email").focusout(function() {
		email_registrado();
	});

	/******** EDIT **************/

	$("#cedula-edit").focusout(function() {
		cedula_registrada_edit();
	});

	$("#codigo-edit").focusout(function() {
		codigo_registrado_edit();
	});

	$("#email-edit").focusout(function() {
		email_registrado_edit();
	});

	/***************************************/

	$("#cedula, #codigo, #email, #cedula-edit, #codigo-edit, #email-edit").keypress(function() {
		desactivar_boton();
	});

	$("#chkdiscapacidad").click(function()
	{
		if ($("#chkdiscapacidad").is(':checked')) {
			$("#des_discapacidad").attr("required", true);
		}else{
			$("#des_discapacidad").attr("required", false);
			$("#des_discapacidad").val('');
		}
	});

	$("#chketnia").click(function()
	{
		if ($("#chketnia").is(':checked')) {
			$("#nombre_etnia").attr("required", true);
		}else{
			$("#nombre_etnia").attr("required", false);
			$("#nombre_etnia").val('');
		}
	});

});

function desactivar_boton()
{
	$('#btnEnviar').prop("disabled", true);
}

function activar_boton(){
	$('#btnEnviar').prop("disabled", false);
}

function show_msj_error(msj){
	$('#msj1,#msj2').html(msj);
	$('#msj1,#msj2').fadeIn();
	$('#msj1,#msj2').removeClass('alert-success').addClass('alert-danger');
}
function show_msj_success(msj){
	$('#msj1,#msj2').html(msj);
	$('#msj1,#msj2').removeClass('alert-danger').addClass('alert-success');
	$('#msj1,#msj2').fadeIn();
}

function parent_add_error(input){
	input.parent().addClass('has-error');
}

function parent_remove_error(input){
	input.parent().removeClass('has-error');
}

/******** ADD *************/

function cedula_registrada(){
	if ($('#cedula').val()!=''){
		var route = Host + 'solicitantes/buscar_cedula/'+ $('#cedula').val();
		$.get(route,function(res){
			if(res != '0'){
				console.log(res);
				parent_add_error($('#cedula'));
				desactivar_boton();
				show_msj_error('La cédula se encuentra registrada. Status: ' + res);
			}else{
				parent_remove_error($('#cedula'));
				activar_boton();
				show_msj_success('Cédula disponible');
			}
		});
	}
}

function codigo_registrado(){
	if ($('#codigo').val()!=''){
		var route = Host + 'solicitantes/buscar_codigo/'+ $('#codigo').val();
		$.get(route,function(res){
			if(res != 'null'){
				parent_add_error($('#codigo'));
				desactivar_boton();
				show_msj_error('El código se encuentra registrado');
				desactivar_boton();
			}else{
				parent_remove_error($('#codigo'));
				activar_boton();
				show_msj_success('Código disponible');
			}
		});
	}
}

function email_registrado(){
	if ($('#email').val()!=''){
		var route = Host + 'solicitantes/buscar_email/'+ $('#email').val();
		$.get(route,function(res){
			if(res != 'null'){
				parent_add_error($('#email'));
				show_msj_error('El correo electrónico se encuentra registrado');
				desactivar_boton();
			}else{
				parent_remove_error($('#email'));
				activar_boton();
				show_msj_success('Correo electrónico disponible');
			}
		});
	}
}

/******* EDIT ******/

function cedula_registrada_edit(){
	if ($('#cedula-edit').val()!=''){
		var route = Host + 'solicitantes/buscar_cedula_edit/'+ $('#estudiante_id').val() +'/'+ $('#cedula-edit').val();
		$.get(route,function(res){
			if(res != 'null'){
				parent_add_error($('#cedula-edit'));
				desactivar_boton();
				show_msj_error('La cédula se encuentra registrada');
			}else{
				parent_remove_error($('#cedula-edit'));
				activar_boton();
				show_msj_success('Cédula disponible');
			}
		});
	}
}

function codigo_registrado_edit(){
	if ($('#codigo-edit').val()!=''){
		var route = Host + 'solicitantes/buscar_codigo_edit/'+ $('#estudiante_id').val() +'/'+ $('#codigo-edit').val();
		$.get(route,function(res){
			if(res != 'null'){
				parent_add_error($('#codigo-edit'));
				desactivar_boton();
				show_msj_error('El código se encuentra registrado');
			}else{
				parent_remove_error($('#codigo-edit'));
				activar_boton();
				show_msj_success('Código disponible');
			}
		});
	}
}

function email_registrado_edit(){
	if ($('#email-edit').val()!=''){
		var route = Host +  'solicitantes/buscar_email_edit/'+ $('#estudiante_id').val() +'/'+ $('#email-edit').val();
		$.get(route,function(res){
			if(res != 'null'){
				parent_add_error($('#email-edit'));
				desactivar_boton();
				show_msj_error('El correo electrónico se encuentra registrado');
			}else{
				parent_remove_error($('#email-edit'));
				activar_boton();
				show_msj_success('Correo electrónico disponible');
			}
		});
	}
}