 <?php
  include 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Event Deatails</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">CUC  Administrator</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#">Home</a></li>
      <li><a href="#">Members</a></li>
      <li class="active"><a href="#">Events</a></li>
      <li><a href="#">Add Events</a></li>
     
    </ul>
  </div>
</nav>
  
<div class="container">

<br/>
<br/>
<br/>
<br/>
    <center><h2>Event Details</h2></center>
  <h3>Update:</h3>            
  <table class="table">
    <thead>
      <tr>
        <th>Event id</th>
        <th>Event title</th>
      </tr>
    </thead>
    <tbody>
      <?php
          $table  = mysqli_query($connection ,'SELECT * FROM events');
          while($row  = mysqli_fetch_array($table)){ ?>
              <tr id="<?php echo $row['event_id']; ?>">
                <td data-target="eventid"><?php echo $row['event_id']; ?></td>
                <td data-target="eventtitle"><?php echo $row['event_title']; ?></td>
                 <td data-target="eventcontent"><?php echo $row['event_content']; ?></td>
               
                <td><a href="#" data-role="update" data-id="<?php echo $row['event_id'] ;?>">Update</a></td>
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
                <label>Event id</label>
                <input type="text" id="eventid" class="form-control">
              </div>
              <div class="form-group">
                <label>Event title</label>
                <input type="text" id="eventtitle" class="form-control">
              </div>
              <div class="form-group">
								<label for="inputPassword1" class=" control-label">Event Content</label>
								
									<textarea class="form-control" rows="4" id="eventcont" name="eventcontent" placeholder="Your message..."></textarea>
								
							</div>
               <div class="form-group">
                <label>Image</label>
                 <div class="preview"></div>
                <input type="file" id="imge" class="form-control">
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
            var firstName  = $('#'+id).children('td[data-target=eventid]').text();
            var lastName  = $('#'+id).children('td[data-target=eventtitle]').text();
            var classc  = $('#'+id).children('td[data-target=eventcontent]').text();
        
                    

            $('#eventid').val(firstName);
            $('#eventtitle').val(lastName);
            $('#eventcont').val(classc);

            
            $('#userId').val(id);
            $('#myModal').modal('toggle');
      });

      // now create event to get data from fields and update in database 

       $('#save').click(function(){
          var id  = $('#userId').val(); 
         var firstName =  $('#eventid').val();
          var lastName =  $('#eventtitle').val();
          var classc =  $('#eventcont').val();
        



          $.ajax({
              url      : 'connection2.php',
              method   : 'post', 
              data     : {lastName: lastName ,classc:classc, id: id},
              success  : function(response){
                            // now update user record in table 
                             $('#'+id).children('td[data-target=eventid]').text(firstName);
                             $('#'+id).children('td[data-target=eventtitle]').text(lastName);
                             $('#'+id).children('td[data-target=eventcontent]').text(classc);

                             
                             $('#myModal').modal('toggle'); 

                         }
          });
       });
  });
</script>
</html>
