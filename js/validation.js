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
   }); 