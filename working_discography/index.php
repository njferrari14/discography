<?php ob_start();
try {
include './includes/title.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Queen <?= $title ?? '' ?></title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css?family=Peralta" rel="stylesheet">
  	</head>

  <body>
      <!--navigation-->
  <?php
  $file = './includes/menu.php';
  if (file_exists($file) && is_readable($file)) {
       require $file;
  } else {
       throw new Exception("$file can't be found");
  }
  ?>

	<!--header image-->
   <div class="row">
		 <div class="container" style="padding-top: 15px;">
			 <img class="rounded-circle" src="../images/Queen3.jpg" alt="circle" style=" width:100%;
      display:inline-block;">
		</div>
  </div>
  
	 

<!--freddie info section-->
<div class="container"  style="background: #C9BF67; padding-top:15px; padding-bottom:15px;">
    <div class="row align-items-end">
      <div class="col-12">
       <div class="card text-dark">
 	      <img class="card-img-top" src="../images/fm12.jpg" alt="freddy"  width="100">
 	        <div class="card-body">
        <h4 class="card-title">Freddie Mercury</h4>
       <p class="card-text">Singer-songwriter and musician Freddie Mercury was born Farrokh Bulsara on September 5, 1946, in Zanzibar, Tanzania. As the frontman of Queen, Freddie Mercury was one of the most talented and innovative singers of the rock era. He spent time in a boarding school in Bombay (now Mumbai), India, where he studied piano. It was not long before this charismatic young man joined his first band, the Hectics</p>
      </div>
     </div>
    </div>
   </div>
</div><br>


<!--brian may info Section-->
	<div class="container"  style="background: #C9BF67; padding-top:15px;padding-bottom:15px;">
       <div class="row align-items-end">
         <div class="col-12">
	        <div class="card text-dark">
           <img class="card-img-top" src="../images/bm4.jpg" width="60" alt="Brian">
            <div class="card-body">
          <h4 class="card-title">Brian May</h4>
         <p class="card-text">Brian Harold May was born on July 19, 1947, in Hampton, Middlesex, England, to parents Ruth and Harold May. An imaginative teen, May, with the help of his father, built his own homemade guitar, dubbed "The Red Special." The guitar, which was made from makeshift materials including firewood and was played with a six-pence coin for a pick, would later figure prominently in May's musical career. He would go on to play it on every Queen album and live show. </p>
        </div>
      </div>
     </div>
    </div>
</div><br>

<!--john Deacon info section-->
<div class="container"  style="background: #C9BF67; padding-top:15px;padding-bottom:15px;">
      <div class="row align-items-end">
        <div class="col-12">
         <div class="card text-dark">
          <img class="card-img-top" src="../images/jd1.jpg" width="60" alt="Icon"><br>
           <div class="card-body">
         <h4 class="card-title">John Deacon</h4>
        <p class="card-text">Born on August 19, 1951, in Leicester, England,  As a child, he developed a passion for electronics while also taking up music, heaving influenced by the Beatles. He started playing guitar with the band the Opposition when he was 14, and eventually switched to bass. In 1970 Deacon met the band's guitarist Brian May and drummer Roger Taylor, and was invited to audition for the position of bassist. Deacon got the gig, and thus, with virtuosic singer Freddie Mercury already at the helm, the Queen lineup that would last for two decades was born.</p>
      </div>
     </div>
    </div>
   </div>
</div><br>

<!--roger taylor info section-->
<div class="container"  style="background: #C9BF67; padding-top:15px;padding-bottom:15px;">
      <div class="row align-items-end">
        <div class="col-12">
          <div class="card text-dark">
            <img class="card-img-top" src="../images/rt3.jpg" alt="roger">
              <div class="card-body">
           <h4 class="card-title">Roger Taylor</h4>
          <p class="card-text">Roger Meddows Taylor was born on July 26, 1949, in the seaport town of King's Lynn, part of England's Norfolk county. During his youth, Taylor developed a passion for multi-instrumentalism,  before turning to drums.Taylor moved to London and studied dentistry and biology for a time, though he would ultimately decide to pursue a career in music. In 1967, he began performing with the rock group Smile, which included guitarist Brian May. </p>
      </div>
     </div>
    </div>
   </div>
</div><br>

<!--timeline of band members-->
<div class="container">
    <div class="row">
     <div class="col-12">
      <div class="shadow-lg p-3 mb-5 bg-white rounded">
	     <div class="card">
		    <div class="card-body">
		      <img class="card-img-bottom" src="../images/timelinecopy.png" alt="timeline" width="100">
		   </div>
	   </div>
   </div>
  </div>
</div><br>
		



<!--feedback form-->
<?php
$file = './includes/form.php';
if (file_exists($file) && is_readable($file)) {
     require $file;
} else {
     throw new Exception("$file can't be found");
}
?>


<script src="js/jquery.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } catch (Exception $e) {
    ob_end_clean();
    header('Location: http://localhost/phpsols-4e/error.php');
}
ob_end_flush();
?>