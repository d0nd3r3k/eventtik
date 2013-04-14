<?php include_once('header.php'); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
            <div class="well sidebar-nav">
                <ul class="nav nav-list">

                    <li><a href="#"><i class="icon-home"></i>Home</a></li>
                    <li class="nav-header">Events</li>
                    <li class="active"><a href="#"><i class="icon-list"></i>List events</a></li>
                    <li><a href="#"><i class="icon-calendar"></i>Your events</a></li>
                    <li class="nav-header">Profile</li>
                    <li><a href="#"><i class="icon-user"></i>Edit Profile</a></li>
                    <li><a href="#"><i class="icon-cog"></i>Settings</a></li>

                </ul>
            </div><!--/.well -->
        </div><!--/span-->

        <div id="stage" class="span10">
            <div class="hero-unit stage">
                <h2>Stage</h2>
            </div>


        </div>

    </div><!--/row-->
    <div class="row-fluid">
        <div class="span2"></div>
        <div class="span10">
            <div class="span9"></div>

            <div class="span3">
                <button href="#myModal" data-toggle="modal" class="btn btn-large btn-block btn-primary" type="button">Reserve Now!</button> 
            </div>
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
                            <input type="text" name="inputName" class="required" id="inputName" placeholder="Full Name">
                        </div>
                    </div>
                    <div class="control-group email-group">
                        <label class="control-label" for="inputEmail">Email</label>
                        <div class="controls">
                            <input type="text" id="inputEmail" name="inputEmail" id="inoutEmail" class="required" placeholder="Email">
                        </div>
                    </div>
                    <div class="control-group password-group">
                        <label class="control-label" for="inputPassword">Password</label>
                        <div class="controls">
                            <input type="password" id="inputPassword" name="inputPassword" class="required" placeholder="Password">
                        </div>
                    </div>
                    <div class="control-group repassword-group">
                        <label class="control-label"  for="inputPassword">Confirm Password</label>
                        <div class="controls">
                            <input type="password" id="reinputPassword" name="reinputPassword" class="required" placeholder="Confirm Password">
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

    