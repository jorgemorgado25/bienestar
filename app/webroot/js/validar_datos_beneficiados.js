$(document).ready(function()
{
	$("#btn-validar").click(function()
	{
		
		if($('#fecha_nac').val().length != 10)
		{
			console.log('No hay diez');
			$('#msj1,#msj2').removeClass('alert-success').addClass('alert-danger');
			$('#msj1').html('Complete la fecha de nacimiento');
			$('#msj1').show();
			$('#msj2').html('Complete la fecha de nacimiento');
			$('#msj2').show();
			return false;
		}else
		{
			console.log('Sí hay diez');
		}
		if(!validateDOB())
		{
			console.log('Error en la fecha');
			$('#msj1,#msj2').removeClass('alert-success').addClass('alert-danger');
			$('#msj1').html('Error en la fecha de nacimiento');
			$('#msj1').show();
			$('#msj2').html('Error en la fecha de nacimiento');
			$('#msj2').show();
			return false;
		}

		if(!validar_ano_nacimiento())
		{
			console.log('El alumno debe ser mayor de 15 años');
			$('#msj1,#msj2').removeClass('alert-success').addClass('alert-danger');
			$('#msj1').html('El alumno debe ser mayor de 15 años');
			$('#msj1').show();
			$('#msj2').html('El alumno debe ser mayor de 15 años');
			$('#msj2').show();
			return false;
		}

		if($('#n_materias').val().trim() == '')
		{
			$('#msj1,#msj2').removeClass('alert-success').addClass('alert-danger');
			$('#msj1').html('Ingrese el número de materias');
			$('#msj1').show();
			$('#msj2').html('Ingrese el número de materias');
			$('#msj2').show();
			return false;
		}

		if($('#n_aplazadas').val().trim() == '')
		{
			$('#msj1,#msj2').removeClass('alert-success').addClass('alert-danger');
			$('#msj1').html('Ingrese el número de materias aplazadas');
			$('#msj1').show();
			$('#msj2').html('Ingrese el número de materias aplazadas');
			$('#msj2').show();
			return false;
		}

		if (parseInt($('#n_aplazadas').val()) > parseInt($('#n_materias').val()))
		{
			$('#msj1, #msj2').removeClass('alert-success').addClass('alert-danger');
			$('#msj1').html('El número de materias aplazadas debe ser menor al número de materias');
			$('#msj1').show();
			$('#msj2').html('El número de materias aplazadas debe ser menor al número de materias');
			$('#msj2').show();
			return false;
		}
		
		console.log('Continúo con la lógica');
		$('#msj1').hide();
		$('#msj2').hide();
		$('#btnEnviar').click();
		
	});
});

function validateDOB()
{
    var dob = $('#fecha_nac').val();
    var pattern = /^([0-9]{2})-([0-9]{2})-([0-9]{4})$/;
    if (dob == null || dob == "" || !pattern.test(dob))
    {        
        return false;
    }
    else
    {
        return true
    }
}

function validar_ano_nacimiento()
{
	var fecha = new Date();
	var ano = parseInt(fecha.getFullYear());
	fecha = $('#fecha_nac').val();
	fecha = parseInt(fecha.substring(6,10));
	if((ano - fecha) > 15)
	{
		return true;
	}else
	{
		return false;
	}
}