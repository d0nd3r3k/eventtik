<?php
include_once('header.php');
include('inc/config.php');
include('inc/db.php');

$id = $_GET['id'];

$db = new edb();

$event = $db->getEventsByID($id);

//print_r($event[0]);
?>
<div class="hide fError alert alert-error">
  Must select at least 1 seat to reserve
</div>

<div class="hide fSuccess alert alert-success">
  Reservation Successful... 
</div>
<div class="container-fluid">
    <?php include('sidemenu.php'); ?>
    <div class="span10 event-wrapper" data-event="<?php echo $id;?>">
        <h2><?php echo $event[0]->name ?> <button id="reserve" class="btn btn-primary">Reserve Now!</button></h2>
        <p class='event-info'> <span class='date'><?php echo $event[0]->date ?></span> at <span class='location'><?php echo $event[0]->location ?></span></p>
        
        <hr />
        <div class='event-desc'>
            <img src='admin/uploads/<?php echo $event[0]->img ?>'/>
            <p class='description'> <?php echo $event[0]->description ?></p>
            
        </div>

    </div>
    <div class="row stage-wrapper">
        <div class="span12">
            <div id="stage">

            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="reserveModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Reserve</h3>
    </div>
    <div class="modal-body">
        <p>You Selected the following seats:</p>
        <ul class="reservationList">
        </ul>
        <p>Your total price is: $<span class="totalPrice"></span></p>
        <p>Select Your Payment Method:</p>
        <select value="Payment Method">
            <option>Western Union</option>
            <option>Credit Card</option>
        </select>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button id="submitReservation" class="btn btn-primary">Reserve Now!</button>
    </div>
</div>  
<?php include_once('footer.php'); ?>
<script>
    var theater = <?php echo $event[0]->theater ?>;    
    var jsonObj = [];
    
    $.each(theater[0], function(i, rows){
        var zone = {
            "rows": rows,
            "columns": theater[1][i],
            "price": theater[3][i],
            "zone": theater[2][i]
        };
        createStage(zone);
       
    });


    function createStage(stage){
        $("#stage").append("<h2>Zone-"+stage.zone+"</h2>");
        //console.log(stage);
        var html = "";
        for(var i = 1; i <= stage.rows; i++){
            var chr = String.fromCharCode(96 + i);
            html += "<div  class='show-grid'>";
            for(var j = 1; j <= stage.columns; j++){
                html += "<div id='"+chr+j+stage.price+"' class='span1 available' data-price='"+stage.price+"' data-id='"+chr+j+"' data-toggle='tooltip' title='Price: $"+stage.price+"'>"+chr+j+"</div>";
            }
            html += "</div>";
    
        }
        $("#stage").append(html);
    }
    
    //GET Booked Events
    var event_id = $(".event-wrapper").data('event');
    var eventUrl = "controller/getEvents.php";
    $.ajax({
        type : "POST",
        url : eventUrl,
        data : "event_id="+event_id,
        cache : false
    }).done(function( response ) {
        var reservations = JSON.parse(response);
        $(reservations).each(function(item, value){
            $(JSON.parse(value['reservation'])).each(function(i, v){
                $("#"+v['seat'].id+v['seat'].price).removeClass('available').addClass('booked');
            });
        })
    });
    
    
    $('.show-grid .available').tooltip();
    $(".show-grid .available").click(function(){
        $(".alert").hide();
        if($(this).hasClass('clicked') == false){
            $(this).addClass('clicked');
            $(this).removeClass('available');
        }
    
        else
            $(this).removeClass('clicked');
    });
    $("#reserve").on('click', function(){
        var spots = $(".stage-wrapper").find(".clicked"),
            price = 0;
        jsonObj = [];
        $(".reservationList").html("");
        if (spots.length === 0){
            $(".fError").fadeIn();
        } else {
            $(spots).each(function(item){
                var seat_id = $(this).data('id');
                var seat_price = $(this).data('price');
                
                $(".reservationList").append("<li>Seat Number: "+seat_id+" for $"+seat_price+"</li>");
                price += $(this).data('price');
                jsonObj.push({"seat": {"id":seat_id, "price":seat_price}});
            });
            
            
            $(".totalPrice").html(price);
            $("#reserveModal").modal('toggle');
            
        }
    });
    $("#submitReservation").on('click', function(){
        var data = JSON.stringify(jsonObj),
            event_id = $(".event-wrapper").data('event');
            console.log(event_id);
        var url = 'controller/reserve.php'
        $.ajax({
            type : "POST",
            url : url,
            data : "event_id="+event_id+" & jsonData="+data,
            cache : false
        }).done(function( response ) {
            if( response == 1){
                $("#reserveModal").modal('toggle');
                $(".clicked").removeClass('clicked').addClass('booked');
                $(".fSuccess").fadeIn();
                setTimeout(function() {
                $(".fSuccess").fadeOut('fast');
            }, 3000);
            }
        });
    });
        

</script>



