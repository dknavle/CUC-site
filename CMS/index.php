 <?php
  include 'connection.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Member Deatails</title>
  <meta charset="utf-8">
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
                    <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Members</a></li>
      <li><a href="#">Events</a></li>
      <li><a href="#">Add Events</a></li>
                  
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
  
<div class="container">

<br/>
<br/>
<br/>
<br/>
  <h2>Member Deatails</h2>
  <p>Update:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Class</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Fee Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
          $table  = mysqli_query($connection ,'SELECT * FROM students');
          while($row  = mysqli_fetch_array($table)){ ?>
              <tr id="<?php echo $row['id']; ?>">
                <td data-target="firstName"><?php echo $row['fname']; ?></td>
                <td data-target="lastName"><?php echo $row['lname']; ?></td>
                <td data-target="classc"><?php echo $row['class']; ?></td>
                 <td data-target="email"><?php echo $row['email']; ?></td>
                <td data-target="contact"><?php echo $row['contact']; ?></td>
                <td data-target="fee_status"><?php echo $row['fee_status']; ?></td>
               
                <td><a href="#" data-role="update" data-id="<?php echo $row['id'] ;?>">Update</a></td>
              </tr>
         <?php }
       ?>
       
    </tbody>
  </table>

  
</div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" id="firstName" class="form-control">
              </div>
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" id="lastName" class="form-control">
              </div>
              <div class="form-group">
                <label>Class</label>
                <input type="text" id="classc" class="form-control">
              </div>
              


               <div class="form-group">
                <label>Email</label>
                <input type="text" id="email" class="form-control">
              </div>
                <div class="form-group">
                <label>Contact</label>
                <input type="text" id="contact" class="form-control">
              </div>
              <div class="form-group">
                <label>fee_status</label>
                <input type="text" id="fee_status" class="form-control">
              </div>
                <input type="hidden" id="userId" class="form-control">


          </div>
          <div class="modal-footer">
            <a href="#" id="save" class="btn btn-primary pull-right">Update</a>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

</body>

<script>
  $(document).ready(function(){

    //  append values in input fields
      $(document).on('click','a[data-role=update]',function(){
            var id  = $(this).data('id');
            var firstName  = $('#'+id).children('td[data-target=firstName]').text();
            var lastName  = $('#'+id).children('td[data-target=lastName]').text();
            var classc  = $('#'+id).children('td[data-target=classc]').text();
        
            var email  = $('#'+id).children('td[data-target=email]').text();
            var contact  = $('#'+id).children('td[data-target=contact]').text();
            var fee_status  = $('#'+id).children('td[data-target=fee_status]').text();            

            $('#firstName').val(firstName);
            $('#lastName').val(lastName);
            $('#classc').val(classc);

            $('#email').val(email);
            $('#contact').val(contact);
            $('#fee_status').val(fee_status);
            $('#userId').val(id);
            $('#myModal').modal('toggle');
      });

      // now create event to get data from fields and update in database 

       $('#save').click(function(){
          var id  = $('#userId').val(); 
         var firstName =  $('#firstName').val();
          var lastName =  $('#lastName').val();
          var classc =  $('#classc').val();
          var email =   $('#email').val();
          var contact =   $('#contact').val();
          var fee_status =   $('#fee_status').val();



          $.ajax({
              url      : 'connection.php',
              method   : 'post', 
              data     : {firstName : firstName , lastName: lastName ,classc:classc, email : email ,contact : contact,fee_status:fee_status, id: id},
              success  : function(response){
                            // now update user record in table 
                             $('#'+id).children('td[data-target=firstName]').text(firstName);
                             $('#'+id).children('td[data-target=lastName]').text(lastName);
                             $('#'+id).children('td[data-target=classc]').text(classc);

                             $('#'+id).children('td[data-target=email]').text(email);
                             $('#'+id).children('td[data-target=contact]').text(contact);
                             $('#'+id).children('td[data-target=fee_status]').text(fee_status);
                             $('#myModal').modal('toggle'); 

                         }
          });
       });
  });
</script>
</html>
