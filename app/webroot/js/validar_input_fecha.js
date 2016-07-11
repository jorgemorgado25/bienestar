$(document).ready(function()
{
	$("#fecha_nac").alpha({
		allowNumeric : 'true',
		disallow: 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM/',
		allow: '-'
	});
});
