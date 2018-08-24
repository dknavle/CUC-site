<html lang='en' >

<body>
<?php 
//include_once('Conn.php');
include_once('header.php');
include ('event_det.php');
//include_once('event_det.php');
/*$cucevt=new Cucevent;
$cevn=$cucevt->fetch_all();
*/


$db = new DB;
$rw=$db->fetche();


 echo  "<div class='container'>
 
 <div class='row'>
                <div class='col-lg-12'>
                    <section class='wow fadeInRight' data-wow-delay='0.5s'>
 <h2 class='page-header' style='text-align:center'>EVENTS</h2>
 </section>
                </div>
                </div>
 ";
while($row=mysqli_fetch_array($rw)){

if ($row['event_id']%2 == 0){

       echo  "



            <div class='row'>
                <div class='col-lg-12'>
                    <section class='wow fadeInRight' data-wow-delay='0.5s'>
                        
                        <h2 class='page-header'>".
           $row['event_name']."

                        </h2>
                    </section>
                </div>
                <div class='col-md-6'>
                <section class='wow fadeInDown' data-wow-delay='0.5s'>
                    <p class='fntstyl'>".$row['event_desc']."
                    </p>


                 </section>   
                </div>
                <div class='col-md-6'>
                    <section class='wow fadeInDown' data-wow-delay='0.5s'>
                        <img class='img-responsive' src='data:image/jpeg;base64,".base64_encode($row['name'] )."' alt='BLIND-C'>
                    </section>
                </div>
            </div>
            ";
        }
    else {
        echo "
      
        <div class='row'>

                <div class='col-lg-12'>
                    <section class='wow fadeInRight' data-wow-delay='0.5s'>
                        <h2 class='page-header'>".
           $row['event_name']."</h2>
                    </section>
                </div>
                 <div class='col-md-6'>
                    <section class='wow fadeInDown' data-wow-delay='0.5s'>
                        <img class='img-responsive' src='data:image/jpeg;base64,".base64_encode($row['name'] )."' alt='BLIND-C'>
                    </section>
                </div>
                <div class='col-md-6'>
                <section class='wow fadeInDown' data-wow-delay='0.5s'>
                    <p class='fntstyl'>".
           $row['event_desc']."
                    </p>


                 </section> 
                     </div>

                </div>
               


        ";
    }
}
    echo "</div>";
        ?>
        <!-- /.row -->
  <!--div class='row'>
           
            <div class='col-lg-12'>
                <section class='wow fadeInRight' data-wow-delay='0.5s'>
                    <h2 class='page-header'>APTITUDE TEST</h2>
                </section>
            </div>
             <div class='col-md-6'>
                <section class='wow fadeInDown' data-wow-delay='0.5s'>
                    <img class='img-responsive' src='images/apti1.jpg' alt=''>
                </section>
            </div>
            <div class='col-md-6'>
            <section class='wow fadeInDown' data-wow-delay='0.5s'>
                <p class='fntstyl'>A Blind C-Programming competition is conducted each year for second year students. In this competition aim of the program is given to students for coding using c-programming language which they have to code but the monitor screens are kept off. So without seeing, blindly the participants code the program and the least errors/warning code wins the competition.

The aim of this competition is to increase the programming accuracy of the students and develop a good programming outlook among them. Winners are awarded with a trophy and certificate.
                </p>
               
                
             </section> 
                 </div>
  
            </div-->
           
        
       
       
        <!-- Footer -->
        <footer>
            <div class='row'>
                <div class='col-lg-12'>
                    <p>Copyright &copy; BE WEB COMMITTEE </p>
                </div>
            </div>
        </footer>

   

    <!-- jQuery -->
    <script src='js/jquery.js'></script>

    <!-- Bootstrap Core JavaScript -->
    <script src='js/bootstrap.min.js'></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>


  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.0/wow.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.carousel.js'></script>

  

    <script  src='js/index.js'></script>




</body>

</html>
