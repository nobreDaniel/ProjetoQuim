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

	$('#settings').validate({
		rules:{
			first_name:{
				required:true,
				rangelength: [5,32]
			},
			last_name:{
				required:true,
				rangelength: [3,32]
			},
			email{
				required: true,
				email: true
			}
		},
		messages:{
			first_name:{
				required:"Este campo é obrigatório",
				rangelength: "Este vampo deve conter no mínimo 3 caracteres"
			},
			last_name:{
				required:"Este campo é obrigatório",
				rangelength: "Este vampo deve conter no mínimo 3 caracteres"
			},
			email{
				required: "Este campo é obrigatório",
				email: "Este vampo deve conter no mínimo 3 caracteres"
			}
		}
	});

	$('#registerForm').validate({
		rules:{
			username:{
				required:true,
				rangelength: [5,32]
			},
			first_name:{
				required:true,
				rangelength: [3,32]
			},
			last_name:{
				required:true,
				rangelength: [3,32]
			},
			password:{
				required:true,
				rangelength: [5,32]
			},
			password_again:{
				required: true,
			    equalTo: "#password"
			},
			email:{
				required: true,
				email: true
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
			},
			first_name:{
				required:"Este campo é obrigatório",
				minlength: "O nome deve conter no minímo 3 caracteres"
			},
			last_name:{
				required:"Este campo é obrigatório",
				minlength: "O sobrenome deve conter no mínimo 3 carácteres"
			},
			password_again:{
				required: "Este campo é obrigatório",
				equalTo: "As senhas não estão iguais"
			},
			email:{
				required: "Este campo é obrigatório",
				email: "Insira um endereço de email válido."
			}
		}
	});

	$('#changePass').validate({
		rules:{
			old_pass:{
				required:true,
				rangelength: [3,32]
			},
			new_pass:{
				required:true,
				rangelength: [3,32]
			},
			new_pass_again:{
				required:true,
				equalTo: "#new_pass"
			}
		},
		messages:{
			old_pass:{
				required:"Este campo é obrigatório",
				rangelength: "O nome de usuário deve conter entre 5 e 32 caracteres"
			},
			new_pass:{
				required:"Este campo é obrigatório",
				rangelength: "A sua senha deve conter entre 3 e 32 caracteres"
			},
			new_pass_again:{
				required:"Este campo é obrigatório",
				equalTo:"As senhas não são iguais"
			}
		}
	});
});