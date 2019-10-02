<?php ob_start();
try {
include './includes/title.php'; ?>
<!--header-->
<?php
$file = './includes/header.php';
if (file_exists($file) && is_readable($file)) {
     require $file;
} else {
     throw new Exception("$file can't be found");
}
?>

<body>
  <!--Navigation-->
  <?php
  $file = './includes/menu.php';
  if (file_exists($file) && is_readable($file)) {
       require $file;
  } else {
       throw new Exception("$file can't be found");
  }
  ?>



<!--top image-->
<div class="container"  style="background: #C9BF67; padding-top:12px; padding-bottom:15px;">
 <div class="row">
 <div class="col-12">
 <div class="card  text-dark">
 <img class="card-img-top" src="../images/cite.jpg" alt="Card image cap">
</div>
  
  <!--cite info-->
  <div class="card-body">
    <h4 class="card-title">Cite Info</h4>
     <p class="card-text">
        Album info: <a class="cite-link" href="http://www.icce.rug.nl/~soundscapes/VOLUME03/Queen_anomaly_Appendix1.shtml">Albums</a><br>
        Funfacts: <a class="cite-link" href="https://ohfact.com/interesting-facts-about-band-queen/">Oh Facts </a><br>
        Photos:<a class="cite-link" href="https://www.google.com/"> Photos</a><br>
        Personal Info:<a class="cite-link" href="https://en.wikipedia.org"> Member info</a><br>
        Quote:<a class="cite-link" href="https://www.brainyquote.com/authors/freddie_mercury"> Brainy quote</a><br>
        video<a class="cite-link" href="https://www.youtube.com/watch?v=A22oy8dFjqc"> Youtube</a><br>
      </p>
    </div>
  </div>
 </div>
</div><br>
<!--video-->
<div class="container" style="background: #C9BF67; padding-top:14px; padding-bottom:14px;">
     <div class="row">
     <div class="col-12">
     <div class="embed-responsive embed-responsive-16by9">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/A22oy8dFjqc"  allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </div>
</div>
</div><br>

<!--blockquote-->
<div class="container">
        <div class="row">
        <div class="col-12">
        <div class="shadow-lg p-3 mb-5 bg rounded">
        <blockquote class="blockquote blockquote-reverse" style="padding-left:10px; font-size:40px;">
        <p class="mb-0">We're a bit flashy, but the musics's not one big noise. </p>
        <footer class="blockquote-footer">Freddie Mercury
        <cite title="Source Title">brainyquote</cite>
      </footer>
     </blockquote>
    </div>
   </div>
  </div>
</div>



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