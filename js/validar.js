function validar_email(email)
{
	var expregmail = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;

	if(!expregmail.test(email))		
		return false;

	return true;
}

function validar_password(pass)
{
	var expregpass = /^[A-Za-z0-9]{6,10}$/;

	if(!expregpass.test(pass))
		return false;

	return true;
}

function validarlogin()
{
	var email = document.getElementById("mail").value;
	var pass = document.getElementById("password").value;

	//alert(mail);
	//alert(pass);

	if(email == "")		
		return false;

	if(pass == "")
		return false;

	//alert("envio");

	return true;
}

/*****************************************************************/

function validar_imagen_usuario()
{	
	/*
	var input = document.getElementById('pic');
	var imagen = input.value;
	var file = input.files[0];

	alert(file.size);
	*/
	var imagen = document.getElementById('pic').value;
	if(imagen == "")
		return true;
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
	var nombre = document.getElementById("nombre").value;
	if(nombre.length<=0)
		return false;

	var apellidos = document.getElementById("apellidos").value;
	if(apellidos.length <= 0)
		return false;

	var email = document.getElementById("email").value;
	if(!validar_email(email))
		return false;

	var emailrep = document.getElementById("emailrep").value;
	if(email!=emailrep)
		return false;

	var pass = document.getElementById("pass").value;
	if(!validar_password(pass))
		return false;

	var passrep = document.getElementById("passrep").value;
	if(pass != passrep)
		return false;

	if(!validar_imagen_usuario())
	{
		return false;
	}



	return true;
}

function validarmaterial()
{
	var nombre = document.getElementById("nombre").value;
	if(nombre.length<=0)
		return false;
	
	return false;
}