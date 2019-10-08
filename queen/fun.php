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

<!--top image funfacts 1-5-->
<div class="container queen-container qc-lg-update">
    <div class="row">
    <div class="col-12">
    <div class="card">
     <img class="card-img-top fun-img" src="./images/band.jpg" alt="band_logo">
    <div class="card-body  text-dark">
    <h4 class="card-title">Fun Facts</h4>
    <p class="card-text">
      
    1. Not all artists are drop-outs
    People often think that rock stars dedicate their whole life to music and hence are not much good in studies. A big blow to such misconception is the Queen Band. Except Freddie Mercury, every other band member has a post graduate degree.<br>
    2. Freddie Mercury aka Farrokh Bulsara
    When Freddie Mercury was born, he was named Farrokh Bulsara as he belonged to an Indian family from Gujarat. But later when he was studying in a boarding school, he adopted the name Freddie Mercury. Strangely his name in the passport is Fredrick Mercury. <br>
    3. Freddie named the band “Queen”
    Freddie knew that naming a male band “Queen” would raise some eyebrows and would be associated with gay terms. Yet he went ahead with this name as he thought it to be a regal, strong and splendid sounding name. <br>
    4. “I want it all” inspired by Brian’s wife
    Brian May had claimed that the main inspiration behind the song “I want it all” was his wife Anita Dobson. He got the idea when his wife said I want it all and I want it now! <br>
    5. The accidental invention of stand-free mic </p>
      </div>
     </div>
    </div>
   </div>
</div><br>

<!--image 2 funfacts 6-8-->
<div class="container queen-container qc-lg-update">
      <div class="row">
      <div class="col-12">
      <div class="card">
       <img class="card-img-top fun-img" src="./images/Queen-live.jpg" alt="band_logo">
      <div class="card-body text-dark">
      <h4 class="card-title">Fun Facts</h4>
      <p class="card-text">
      6. “I like to ride my bicycle” but Freddie didn’t like to ride bicycle!
      Quite contrary to the lyrics of the song “Bicycle Race”, Freddie Mercury didn’t like riding <br>
      7. Do you know that the song “Crazy little thing called love” was composed in a bath? And guess what? It was composed by Freddie Mercury himself. Freddie was actually in a hotel and while bathing in a tub he got inspired for this song. He even had the piano brought near his tub so that he can compose the song. <br>
      8. Two music videos of Queen was filmed in Roger Taylor’s garden
      The drummer of Queen, Roger Taylor’s garden is as famous as Roger Taylor himself. This is due to the fact that the videos of “Spread your wings” and “I want it all” were recorded in his garden. He really got inspired by his wife I guess!</p>
     </div>
    </div>
   </div>
  </div>
</div><br>

<!--image 3 funfacts 9&10-->
<div class="container queen-container qc-lg-update">
      <div class="row">
      <div class="col-12">
      <div class="card">
       <img class="card-img-top fun-img" src="./images/FreddieMJ.jpg" alt="freddiemj">
      <div class="card-body  text-dark">
      <h4 class="card-title">Fun Facts</h4>
      <p class="card-text">
      9. MJ insisted to release “Another one bites the dust” At first Queen didn’t plan to release the song “Another one bites the dust”. But when Michael Jackson heard the song at the backstage of an L.A. concert, he convinced the band to release it. The song became one of the most successful singles of the band and sold over seven million.<br>
      10. Queen honored by England: In 1999, England honored the Queen band by releasing a postage stamp commemorating Freddie Mercury. But this stamp created unpleasantness among the royal family as the photo chosen for the stamp had Roger Taylor in background. According to British tradition, the only living people who can appear on their stamps are the member of Royal Family.</p>
     <img class="card-img-top fun-img" src="./images/stamp.jpg" alt="stamp">
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
    header('Location: http://site12.wdd.francistuttle.edu/projects/queen/error.php');
}
ob_end_flush();
?>