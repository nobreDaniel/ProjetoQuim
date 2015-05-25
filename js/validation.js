$(document).ready(function(){
	$('#loginForm').validate({
		rules:{
			username:{
				required:true,
				rangelength: [5,32]
			},
			password:{
				required:true,
				rangelength: [3,32]
			}
		},
		messages:{
			username:{
				required:"Este campo é obrigatório",
				rangelength: "O nome de usuário deve conter entre 5 e 32 caracteres"
			},
			password:{
				required:"Este campo é obrigatório",
				rangelength: "A sua senha deve conter entre 3 e 32 caracteres"
			}

		}
	});
});