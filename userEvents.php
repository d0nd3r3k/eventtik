<?php include_once('header.php'); ?>
<?php
include('inc/db.php');

$db = new edb();
$user_events = $db->getUserEvents($_SESSION['id']);
$events = array();

foreach($user_events as $key => $value){
	$e = $db->getEventsByID($value->event_id);
	array_push($events,$e);
}
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
				
				$seats = $rows * $cols;

				$block = "<div class='event-block' data-id='".$value[0]->id."'>";
				$block .= "<h4>" . $value[0]->name . "</h4>";
				$block .= "<img src='admin/uploads/" . $value[0]->img . "' />";
				$block .= "<div class='info'></div>";
				$block .= "<ul>";
				$block .= "<li>Locations: <span>" . $value[0]->location . "</span></li>";
				$block .= "<li>Date: <span>" . $value[0]->date . "</span></li>";
				$block .= "<li>Type: <span>" . $value[0]->type . "</span></li>";
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



