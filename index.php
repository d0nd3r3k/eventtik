<?php include_once('header.php'); ?>
<?php
include('inc/config.php');
include('inc/db.php');

$db = new edb();

$events = $db->getEvents();
?>
<div class="container-fluid">
    <?php include('sidemenu.php'); ?>

    <div id="stage" class="span10">
        <div class="hero-unit stage">
            <h2>Events</h2>
        </div>


        <div id="listEvents">

            <?php
            foreach ($events as $key => $value) {

                $rows = (int) $value->rows;
                $cols = (int) $value->columns;
                $seats = $rows * $cols;

                $block = "<div class='event-block'>";
                $block .= "<h4>" . $value->name . "</h4>";
                $block .= "<img src='admin/uploads/" . $value->img . "' />";
                $block .= "<div class='info'></div>";
                $block .= "<ul>";
                $block .= "<li>Locations: <span>" . $value->location . "</span></li>";
                $block .= "<li>Date: <span>" . $value->date . "</span></li>";
                $block .= "<li>Type: <span>" . $value->type . "</span></li>";
                $block .= "<li>Seats: <span>" . $seats . "</span></li>";
                $block .= "<li>Status: <span> Available</span></li>";
                $block .= "</ul>";
                $block .= "</div>";


                echo $block;
            }
            ?>

        </div>
    </div>




    <hr>
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
    <!-- Sign Up Modal -->
    <div id="signUpModal" class="modal-signup modal hide fade" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Sign-up</h3>
        </div>
        <div class="modal-body">
            <div>
                <form class="form-horizontal signup-form">
                    <div class="control-group fullName-group">
                        <label class="control-label" for="inputPassword">Full Name</label>
                        <div class="controls">
                            <input type="text" name="inputName" class="required" id="inputName" placeholder="Full Name" required>
                        </div>
                    </div>
                    <div class="control-group email-group">
                        <label class="control-label" for="inputEmail">Email</label>
                        <div class="controls">
                            <input type="email" id="inputEmail" name="inputEmail" id="inoutEmail" class="required" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="control-group password-group">
                        <label class="control-label" for="inputPassword">Password</label>
                        <div class="controls">
                            <input type="password" id="inputPassword" name="inputPassword" class="required" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="control-group repassword-group">
                        <label class="control-label"  for="inputPassword">Confirm Password</label>
                        <div class="controls">
                            <input type="password" id="reinputPassword" name="reinputPassword" class="required" placeholder="Confirm Password" required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button id="submitSignupForm"class="btn btn-primary">Sign up!</button>
        </div>
    </div>
    <?php
    include_once('footer.php');



    