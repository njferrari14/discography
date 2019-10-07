<div class="container" style="background: #C9BF67;padding-top:15px; padding-bottom:15px;">
  <div class="row">
    <div class="col-12">    
      <div class="col bg-danger text-white" style="padding-top: 15px; padding-left:25px; padding-bottom: 10px;">
      <?php if (isset($error)) {
          echo "<p>Error: $error</p>";
      } ?>
        <form method="post">
          <h4>JOIN THE FAN CLUB!!</h4>
          <?php if (($_POST && $suspect) || ($_POST && isset($errors['mailfail']))) { ?>
          <p class="warning">Sorry, your mail could not be sent. Please try later.</p>
          <?php } elseif ($missing || $errors) { ?>
          <p class="warning">Please fix the item(s) indicated.</p>
          <?php } ?>
          <div class="form-group col">
            <label for="name">Name
                <?php if (in_array('name', $missing)) { ?>
                    <span class="warning">Please enter your name</span>
                <?php } ?>
            </label>
            <input type="text" class="form-control" id="name" name="name" placeholder="First and last name"
              <?php if ($missing || $errors) {
                  echo 'value="' . htmlentities($name) . '"';
              } ?>>
          </div>
          <div class="form-group col">
            <label for="address">Address
              <?php if (in_array('address', $missing)) { ?>
                    <span class="warning">Please enter your address</span>
              <?php } ?>
            </label>
            <input type="text" class="form-control" id="address" name="address" placeholder="City, State and Zip"
              <?php if ($missing || $errors) {
                  echo 'value="' . htmlentities($address) . '"';
              } ?>>
          </div>
      
          <div class="form-group col">
            <label for="birthday">Birthday
              <?php if (in_array('birthday', $missing)) { ?>
                    <span class="warning">Please enter your birthday</span>
              <?php } ?>
            </label>
            <input type="text" class="form-control" id="birthday" name="birthday" placeholder="01/18/1978"
              <?php if ($missing || $errors) {
                  echo 'value="' . htmlentities($birthday) . '"';
              } ?>>
          </div>

          <div class="form-group col">
            <label for="email">Email
              <?php if (in_array('email', $missing)) { ?>
                    <span class="warning">Please enter your email</span>
              <?php } ?>
            </label>
            <input type="text" class="form-control" id="email" name="email" placeholder="email@example.com"
              <?php if ($missing || $errors) {
                  echo 'value="' . htmlentities($email) . '"';
              } ?>>
          </div>

          <div class="form-group col">
            <label for="comments">Comments
              <?php if (in_array('comments', $missing)) { ?>
                    <span class="warning">Please enter your comments</span>
              <?php } ?>
            </label>
            <input type="text" class="form-control" id="comments" name="comments" placeholder="Comments"
              <?php if ($missing || $errors) {
                  echo 'value="' . htmlentities($comments) . '"';
              } ?>>
          </div>
          <div class="form-group col" style="margin-top:23px; padding:10px">
            <input type="submit" name="submit" value="Join Today">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<pre>
<?php if ($_POST && $mailSent) { 
    echo "Message body\n\n";
    echo htmlentities($message) . "\n";
    echo 'Headers: '. htmlentities($headers);
} ?>
</pre>
