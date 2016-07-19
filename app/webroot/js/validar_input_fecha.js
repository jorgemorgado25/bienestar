$(document).ready(function()
{
	$("#fecha_nac").alpha({
		allowNumeric : 'true',
		disallow: 'qwertyuiopasdfghjklzxcvbnmñQWERTYUIOPASDFGHJKLZXCVBNMÑ/',
		allow: '-'
	});
});
