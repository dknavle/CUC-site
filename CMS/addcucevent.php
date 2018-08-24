<!DOCTYPE html>
<html>
<head>
    <title>Add Event</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="margin-top:-5px;color:#fff"><img src="../images/cuc%20logo.png" width="37" height="37"> </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Home</a></li>
      <li><a href="#">Members</a></li>
      <li><a href="#">Events</a></li>
      <li class="active"><a href="#">Add Events</a></li>
                  
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div class="container" style="margin-top:10%">
    <h2>Event</h2>
    <div class="panel panel-primary">
      <div class="panel-heading">Event add</div>
      <div class="panel-body">


          <form action="imageUpload.php" enctype="multipart/form-data" class="form-horizontal" method="post">
           
           <div class="form-group">
								<label for="inputName" class="col-lg-2 control-label">Event Title</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="inputName" name="inputName" placeholder="Your Name">
								</div>
							</div>
          <div class="form-group">
								<label for="inputPassword1" class="col-lg-2 control-label">Event content</label>
								<div class="col-lg-10">
									<textarea class="form-control" rows="4" id="inputMessage" name="inputMessage" placeholder="Your message..."></textarea>
								</div>
							</div>
           
           
           
           
            <div class="preview"></div>
            <input type="file" name="image" class="form-control" style="width:30%" />
            <br/>
            <button class="btn btn-success upload-image">Image Upload</button>
          </form>


      </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $(".upload-image").click(function(){
            $(".form-horizontal").ajaxForm({target: '.preview'}).submit();
        });
    }); 
</script>


</body>
</html>