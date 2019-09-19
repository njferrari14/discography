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
<!--navigation-->
  <?php
  $file = './includes/menu.php';
  if (file_exists($file) && is_readable($file)) {
       require $file;
  } else {
       throw new Exception("$file can't be found");
  }
  ?>

<!--album 1-->
<div class="container">
   <div class="row">
   <div class="col-6">
    <img src="../images/innuendo.jpg" alt="Card image cap" style="width:100%;">
  <!--shadow-->
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-body" style="padding-left:10px;">
    <h4 class="card-title">Innuendo</h4>
   
     
 <b>Innuendo (Elektra) (1991)<br><br></b>
   <ul class="list-group list-group-flush">
      <li class="list-group-item">Innuendo</li>
      <li class="list-group-item">I'm Going Slightly Mad </li>
      <li class="list-group-item">Headlong</li>
      <li class="list-group-item">I Can't Live With You</li>
      <li class="list-group-item">Don't Try So Hard </li>
      <li class="list-group-item">Ride The Wild Wind</li>
      <li class="list-group-item">All God's People</li>
      <li class="list-group-item">These Are The Days Of Our Lives</li>
      <li class="list-group-item">Delilah</li>
      <li class="list-group-item">The Hitman</li>
      <li class="list-group-item">Bijou</li>
      <li class="list-group-item">The Show Must Go On </li>
    </ul>
   </div>
  </div>
</div>

<!--album 2-->
<div class="col-6">
    <img src="../images/Queen_II.jpg" alt="Card image cap" style= "width:100%;">
    <!--shadow-->
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-body" style="padding-left:10px;">
    <h4 class="card-title">Queen II</h4>

  <b>Queen II (Elektra) (1974)<br><br></b>
     <ul class="list-group list-group-flush">
        <li class="list-group-item">Procession </li>
        <li class="list-group-item">Father To Son </li>
        <li class="list-group-item">White Queen</li>
        <li class="list-group-item">Someday One Day</li>
        <li class="list-group-item">The Loser In The End </li>
        <li class="list-group-item">Ogre Battle</li>
        <li class="list-group-item">The Fairy Fellers Masterstroke</li>
        <li class="list-group-item">Nevermore</li>
        <li class="list-group-item">The March Of The Black Queen</li>
        <li class="list-group-item">Funny How Love Is</li>
       <li class="list-group-item">Seven Seas Of Rhye</li>
      </ul>
     </div>
    </div>
   </div>
  </div>
</div>

<!--album 3-->
<div class="container">
    <div class="row">
    <div class="col-6">
    <img src="../images/works.jpg" alt="Card image cap" style="width:100%;">
  <!--shadow-->
<div class="shadow-lg p-3 mb-5 bg-white rounded">
  <div class="card-body" style="padding-left:10px;">
    <h4 class="card-title">The Works</h4>
    
  <b>The Works (Elektra) (1984)<br><br></b>
     <ul class="list-group list-group-flush">
         <li class="list-group-item">Radio Ga Ga  </li>
         <li class="list-group-item">Tear It Up </li>
         <li class="list-group-item">It's A Hard Life </li>
         <li class="list-group-item">Man On The Prowl </li>
         <li class="list-group-item">Machines (Back To Humans) </li>
         <li class="list-group-item">I Want To Break Free</li>
         <li class="list-group-item">Keep Passing The Open Windows</li>
         <li class="list-group-item">Hammer To Fall </li>
         <li class="list-group-item">Is This The World We Created?</li>
      </ul>
     </div>
    </div>
</div>

 <!--album 4-->
    <div class="col-6">
      <img src="../images/game.jpg" alt="Card image cap" style="width:100%;">
      <!--shadows-->
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
     <div class="card-body" style="padding-left:10px;">
      <h4 class="card-title">The Game</h4>
    
  <b>The Game (Elektra) (1980)<br><br></b>
     <ul class="list-group list-group-flush">
         <li class="list-group-item">Play The Game</li>
         <li class="list-group-item">Dragon Attack</li>
         <li class="list-group-item">Need Your Loving Tonight</li>
         <li class="list-group-item">Crazy Little Thing Called Love</li>
         <li class="list-group-item">Rock It</li>
         <li class="list-group-item">Don't Try Suicide</li>
         <li class="list-group-item">Sail Away Sweet Sister </li>
         <li class="list-group-item">Coming Soon</li>
         <li class="list-group-item">Save Me</li>
      </ul>
     </div>
    </div>
   </div>
  </div>
</div>
 
 <!--album 5-->
<div class="container">
      <div class="row">
      <div class="col-6">
       <img src="../images/Queen1.png" alt="Card image cap" style="width:100%;">
       <!--shadow-->
      <div class="shadow-lg p-3 mb-5 bg-white rounded">
       <div class="card-body" style="padding-left:10px;">
        <h4 class="card-title">Queen</h4>
    
  <b>Queen (Elektra) (1973)<br><br></b>
     <ul class="list-group list-group-flush">
         <li class="list-group-item">Keep Yourself Alive</li>
         <li class="list-group-item">Doing All Right</li>
         <li class="list-group-item">Great King Rat</li>
         <li class="list-group-item">My Fairy King</li>
         <li class="list-group-item">Liar</li>
         <li class="list-group-item">The Night Comes Down</li>
         <li class="list-group-item">Modern Times Rock 'n' Roll</li>
         <li class="list-group-item">Son And Daughter</li>
         <li class="list-group-item">Jesus</li>
         <li class="list-group-item">Seven Seas of Rhye</li>
      </ul>
     </div>
    </div>
</div>

<!--album 6-->
<div class="col-6">
    <img src="../images/Op.jpg" alt="Card image cap" style="width:100%;">
    <!--shadow-->
    <div class="shadow-lg p-3 mb-5 bg-white rounded">
     <div class="card-body" style="padding-left:10px;">
      <h4 class="card-title">A Night At The Opera</h4>
    
    <b>A Night At The Opera (Elektra) (1975)<br><br></b>
      <ul class="list-group list-group list-group-flush">
          <li class="list-group-item">Death On Two Legs</li>
          <li class="list-group-item">Lazing On A Sundy Afternoon</li>
          <li class="list-group-item">I'm In Love With My Car</li>
          <li class="list-group-item">You're My Best Friend </li>
          <li class="list-group-item">'39</li>
          <li class="list-group-item">Sweet Lady</li>
          <li class="list-group-item">Seaside Rendezvous</li>
          <li class="list-group-item">The Prophet's Song</li>
          <li class="list-group-item">Love Of My Life</li>
          <li class="list-group-item">Good Company</li>
          <li class="list-group-item">Bohemian Rhapsody</li>
          <li class="list-group-item">God Save The Queen</li>
        </ul>
      </div>
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