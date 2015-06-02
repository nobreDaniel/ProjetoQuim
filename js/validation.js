$(document).ready(function(){
    $("#change_pass").validate({

 
        rules: {
            old_pass:{ 
            	required:true,
                
            },
            new_pass: {
                required: true,
                minlength: 6
            },
            new_pass_again: {
        		required: true,
                equalTo: "#new_pass"
            }
        },
        messages: {
            old_pass:{ 
            	required:"Este campo é obrigatório"
            },
            new_pass: {
                required: "Este campo é obrigatório",
                minlength: "Sua nova senha deve conter no mínimo 6 caractéres"
            },
            new_pass_again: {
        		required: "Este campo não pode ser vázio",
                equalTo: "As senhas não condizem"
            }
       }
    });

    $("#login-form-validate").validate({
        rules: {
            username:{ 
                required:true,
                
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            username:{ 
                required:"Este campo é obrigatório"
            },
            password: {
                required: "Este campo é obrigatório",
                minlength: "Sua nova senha deve conter no mínimo 6 caractéres"
            }
       }
    });

     $("#register-form").validate({
        rules: {
            username:{ 
                required:true
            },

            first_name:{
                required:true
            },

            last_name:{
                minlength: 3
            },

            email:{
                required: true,
                email: true
            },

            password: {
                required: true,
                minlength: 6
            },

            password_again:{
                equalTo: "#password"
            }
        },

        messages: {
            username:{ 
                required:"O nome de usuário é obrigatório"
            },

            first_name:{
                required:"O nome não pode ser vazio"
            },

            last_name:{
                minlength: "O sobrenome deve conter no minimo 3 caractéres"
            },

            email:{
                required: "O campo de email é obrigatório",
                email: "Insira um emal válido"
            },

            password: {
                required: "A senha é obrigatória",
                minlength: "A senha deve conter no mínimo 6 caractéres"
            },

            password_again:{
                equalTo: "As senhas não condizem"
            }
       }
    });
}); 