$(document).ready(function(){
    //Data from db
/*    var zone1 = {
        "rows":6,
        "columns":12,
        "price":40,
        "zone":'A'
    }
    var zone2 = {
        "rows":4,
        "columns":12,
        "price":20,
        "zone":'B'
    };
                
    function createStage(stage){
        $("#stage").append("<h2>Zone-"+stage.zone+"</h2>");
        //console.log(stage);
        var html = "";
        for(var i = 1; i <= stage.rows; i++){
            var chr = String.fromCharCode(96 + i);
            html += "<div  class='show-grid'>";
            for(var j = 1; j <= stage.columns; j++){
                html += "<div class='span1 available' data-toggle='tooltip' title='Price: $"+stage.price+"'>"+chr+j+"</div>";
            }
            html += "</div>";
                    
        }
        $("#stage").append(html);
    }
    createStage(zone1);
    createStage(zone2);
    $('.show-grid .available').tooltip();
    $(".show-grid .available").click(function(){
                    
        if($(this).hasClass('clicked') == false){
            $(this).addClass('clicked');
            $(this).removeClass('available');
        }
                        
        else
            $(this).removeClass('clicked');
    });
    */
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

    
});
