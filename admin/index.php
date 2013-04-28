<!DOCTYPE html>
<html lang="en">
    <script id="tinyhippos-injected" style="color: rgb(0, 0, 0);">if (window.top.ripple) { window.top.ripple("bootstrap").inject(window, document); }</script><head>
        <meta charset="utf-8">
        <title>Eventik</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet" media="screen">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="lib/bootstrap/js/html5shiv.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="#">Eventik</a>
                    <div class="nav-collapse collapse">
                        <p class="navbar-text pull-right">
                            <a href="#" class="signup"  >Admin</a>
                        </p>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span2">
                    <div class="well sidebar-nav">
                        <ul class="nav nav-list">

                            <li><a href="#"><i class="icon-home"></i>Home</a></li>
                            <li class="nav-header">Events</li>
                            <li class="active"><a href=""><i class="icon-list"></i>List Events</a></li>
                            <li><a href="#addEventModal" data-toggle="modal"><i class="icon-calendar"></i>Add New Events</a></li>

                        </ul>
                    </div><!--/.well -->
                </div><!--/span-->


                <div id="stage" class="span10">
                    <div class="hero-unit stage">
                        <h2>All Events</h2>
                    </div>


                </div>

            </div><!--/row-->
            <div class="row-fluid">
                <div class="span2"></div>
                <div class="span10">
                    <div class="span9"></div>

                </div>
            </div>

            <hr>

            <!-- Modals -->

            <!-- Add New Event Modal -->
            <div id="addEventModal" class="modal-signup modal hide fade" tabindex="-1" role="dialog" aria-labelledby="Add New Event" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="myModalLabel">Add New Event</h3>
                </div>
                <div class="modal-body">
                    <div>
                        <form class="form-horizontal " action="insertEvent.php" method="POST" enctype="multipart/form-data">
                            <div class="control-group eventName-group">
                                <label class="control-label" for="eventName"></label>
                                <div class="controls">
                                    <input type="text" name="eventName" class="required" id="eventName" placeholder="event Name" required>
                                </div>
                            </div>

                            <div class="control-group eventLocation-group">
                                <label class="control-label" for="eventLocation"></label>
                                <div class="controls">
                                    <input type="text" name="eventLocation" class="required" id="eventLocation" placeholder="Event Location" required>
                                </div>
                            </div>

                            <div class="control-group eventType-group">
                                <label class="control-label" for="eventType"></label>
                                <div class="controls">
                                    <input type="text" name="eventType" class="required" id="eventType" placeholder="Event Type" required>
                                </div>
                            </div>

                            <div class="control-group eventRows-group">
                                <label class="control-label" for="eventRows"></label>
                                <div class="controls">
                                    <input type="text" name="eventRows" class="required" id="eventRows" placeholder="Theater Rows" required>
                                </div>
                            </div>

                            <div class="control-group eventCols-group">
                                <label class="control-label" for="eventCols"></label>
                                <div class="controls">
                                    <input type="text" name="eventCols" class="required" id="eventCols" placeholder="Theater Cols" required>
                                </div>
                            </div>

                            <div class="control-group eventDesc-group">
                                <label class="control-label" for="eventDesc"></label>
                                <div class="controls">
                                    <input type="text" name="eventDesc" class="required" id="eventDesc" placeholder="Event Description" required>
                                </div>
                            </div>
                            <div class="control-group eventImg-group">
                                <label class="control-label" for="eventImg"></label>
                                <div class="controls">
                                    <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />
                                    <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
                                    <div id="filedrag">or drop files here</div>
                                </div>
                            </div>

                            <div class="control-group eventDate-group">
                                <label class="control-label" for="eventDate"></label>
                                <div class="controls">
                                    <input type="date" name="eventDate" class="required" id="eventDate" placeholder="Event Date" required>
                                </div>
                            </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit">Upload Files</button>
                </div>
                        </form>
                    </div>
                </div>
            </div>




            <footer>
                <p>© Eventik 2013</p>
            </footer>

        </div><!--/.fluid-container-->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/jquery.validate.js"></script>
        <script type="text/javascript">
            // file selection
            function FileSelectHandler(e) {
                // cancel event and hover styling
                FileDragHover(e);
                // fetch FileList object
                var files = e.target.files || e.dataTransfer.files;
                // process all File objects
                for (var i = 0, f; f = files[i]; i++) {
                    ParseFile(f);
                    UploadFile(f);
                }
            }
            // upload JPEG files
            function UploadFile(file) {
                var xhr = new XMLHttpRequest();
                if (xhr.upload && file.type == "image/jpeg" && file.size <= $id("MAX_FILE_SIZE").value) {
                    // start upload
                    xhr.open("POST", $id("upload").action, true);
                    xhr.setRequestHeader("X_FILENAME", file.name);
                    xhr.send(file);
                }
            }
        
        </script>
    </body>
</html>