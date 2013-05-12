<?php
include_once('header.php');
include('inc/config.php');
include('inc/db.php');

$id = $_GET['id'];

$db = new edb();

$event = $db->getEventsByID($id);

//print_r($event[0]);
?>
<div class="container-fluid">
    <?php include('sidemenu.php'); ?>
    <div class="span10 event-wrapper">
        <h2><?php echo $event[0]->name ?></h2>
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
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Reserve</h3>
    </div>
    <div class="modal-body">
        <p>You Selected the following seats:</p>
        <ul>
            <li>A1 - $20</li>
            <li>A2 - $20</li>
            <li>A3 - $20</li>
        </ul>
        <p>Your total price is: $60</p>
        <p>Select Your Payment Method:</p>
        <select value="Payment Method">
            <option>Western Union</option>
            <option>Credit Card</option>
        </select>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary">Reserve Now!</button>
    </div>
</div>  
<?php include_once('footer.php'); ?>
<script>
    var theater = <?php echo $event[0]->theater ?>;    
    
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
                html += "<div class='span1 available' data-toggle='tooltip' title='Price: $"+stage.price+"'>"+chr+j+"</div>";
            }
            html += "</div>";
    
        }
        $("#stage").append(html);
    }
    $('.show-grid .available').tooltip();
    $(".show-grid .available").click(function(){
    
        if($(this).hasClass('clicked') == false){
            $(this).addClass('clicked');
            $(this).removeClass('available');
        }
    
        else
            $(this).removeClass('clicked');
    });
        

</script>



