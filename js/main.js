$(document).ready(function(){
    /*Sign-Up Controller*/
    $("#submitSignupForm").on('click',function(e) {
        
        e.preventDefault();
            
        var full_name = $("#fullName").val();
        var password = $("#inputPassword").val();
        var rpassword = $("#reinputPassword").val();
        var email = $("#email").val();
        var error = false;
            
        var data = $(".signup-form").serialize();
          
        if (password != rpassword) {
            $(".password-group").addClass("error");
            $(".repassword-group").addClass("error");
            error = true;
        }

        if (error) {
            alert("Can't Submit Form");
            return false;
        } else {

            var url = "controller/signup.php";
            

            $.ajax({
                type : "POST",
                url : url,
                data : data,
                cache : false,
                complete : function(data) {
                    var response = data.responseText;
                    if (response == -1) {
                        alert("Error Submitting Form")
                    } else if (response == 1) {
                        
                        $("#inputName").val("");
                        $("#inputPassword").val("");
                        $("#reinputPassword").val("");
                        $("#inputEmail").val("");
                        $("#signUpModal").modal('hide');
                    }
                }
            });
            return false;
        }       
    });
    
    $(".event-block").on('click',function(e) {
        var id = $(this).data('id');
        window.location = 'http://localhost/eventik/events.php?id='+id;
    });
    $('#signinForm').on('submit', function(e){
        e.preventDefault();
        var data = $(this).serialize();
        
        var url = 'controller/authenticate.php'
        $.ajax({
                type : "POST",
                url : url,
                data : data,
                cache : false
            }).done(function( response ) {
                console.log(response);
                if(response == 0){  
                    alert("Wrong Username/Password");
                } else{  
                    $(".signin-form").html("Welcome " + response + " <a id='logout' href='#' > Logout</a>");
                }
            });
        
    })
    
});
