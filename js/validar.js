function validarlogin()
{
	var mail = document.getElementById("mail").value;
	var pass = document.getElementById("password").value;

	var expregmail = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
	var expregpass = /^[A-Za-z0-9]{6,10}$/;

	//alert(mail);
	//alert(pass);

	if(!expregmail.test(mail))		
		return false;

	if(!expregpass.test(pass))
		return false;

	//alert("envio");

	return true;
}

/*****************************************************************/

function validar_imagen_usuario()
{
	var imagen;

	imagen = document.getElementById('pic').value;

	//alert(imagen.substring(imagen.lastIndexOf('.')).toLowerCase());

	switch(imagen.substring(imagen.lastIndexOf('.')).toLowerCase())
	{
        case '.jpg': 
        case '.jpeg':
        case '.png':
        	return true;
        default:
        	return false;
	}

    return false;
}

function validar_registro()
{
	var correcto;

	if(!validar_imagen_usuario())
	{
		false;
	}

	return true;
}