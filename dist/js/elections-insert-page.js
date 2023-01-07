fillSelects();
$('.searchSelect').select2();

function fillSelects() {
    const politicalParty = [
        'democrat',
        'republic',
        'other'
    ]

    for (let index = 2000; index <= 2023; index++) {
        $("#year").append("<option value='"+index+"'>"+index+"</option>");
    }

    for (let index = 0; index < politicalParty.length; index++) {
        $("#political_party").append("<option value='"+politicalParty[index]+"'>"+politicalParty[index]+"</option>");
    }

    $.get('./controllers/elections/electionsController.php?action=getCounty',function(data){
        data.result.forEach(county => {
            $("#county").append("<option value='"+county.code_county+"'>"+county.county+"</option>");
        });
    });
}

$(function () {
    $.validator.setDefaults({
      submitHandler: function () {
          const data = {
            action: 'insertData',
            year: $('#year').val(),
            political_party: $('#political_party').val(),
            county: $('#county').val(),
            vote_count: $('#vote_count').val(),
          }
          console.log(data);
          $.ajax('./controllers/elections/electionsController.php', {
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
                    // window.location.href = "./list/";
                    $("div#content").load('./pages/elections/list/');
                  }
                
              }
          });
      }
    });
    $('#formElection').validate({
      rules: {
        year: {
          required: true,
        },
        political_party: {
          required: true,
        },
        county: {
            required: true,
        },
        vote_count: {
            required: true,
        },
      },
      messages: {
        year: {
          required: "Please select a year"
        },
        political_party: {
          required: "Please select a political party"
        },
        county: {
          required: "Please select a County"
        },
        vote_count: {
          required: "Please insert a count of votes"
        }
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });