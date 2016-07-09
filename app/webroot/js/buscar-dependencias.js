$(document).ready(function() {
	$('#sel-nucleo').change(function() {
		var route = Host + 'becados/buscar_dependencia/'+ $("#sel-nucleo").val();
		$.get(route,function(res){
			res=JSON.parse(res);
			$("#sel-dependencia").empty();
			var option = new Option("","");
			$("#sel-dependencia").append(option);
			for (index = 0; index < res.length; ++index) {
				var option = new Option(res[index]['Dependencia']['nombre'], res[index]['Dependencia']['id']);
				$("#sel-dependencia").append(option);
			}
		});
	});
});