$(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        //   alert( "Form successful submitted!" );
          const data = {
            action: 'validateLogin',
            user: $('#email').val(), 
            pass: $('#password').val(),
          }
          console.log(data);
          $.ajax('../controllers/login/loginController.php', {
              type: 'POST',
              data: data,
              cache: false,
              success: function (data) {
                  console.log(data)
                  if(data.status === false){
                    $("div#msgResponse").append(function(n){
                        $("span#errorMessage").empty();
                            return "<span id='errorMessage'>"+data.message+"</span>";
                    });
                    $("span#errorMessage").addClass('animate__animated').addClass('animate__fadeIn');
                  } else {
                    window.location.href = "../";
                  }
                
              }
          });
      }
    });
    $('#formLogin').validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 5
        }
      },
      messages: {
        email: {
          required: "Please enter a email address",
          email: "Please enter a valid email address"
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        },
        terms: "Please accept our terms"
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.input-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });