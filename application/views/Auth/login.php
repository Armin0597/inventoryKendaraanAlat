<!doctype html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url();?>asset/css/style.css">
    <title>login</title>
  </head>
  <body>
  
        <?php if ($error = $this->session->flashdata('pesan')): ?>
            <div class="info"><?= $this->session->flashdata('pesan','<span class="text-info">','</span>');?></div>
        <?php endif ?>
    <div class="container">
    	<div class="wrapper">
    		<h3>Log in</h3>
    		<hr>
            <?= form_open('auth/chek_Login');?>
				  <input type="text" class="form-control" value="<?= set_value('username')?>" name="username" id="username" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" autofocus="true">
                  <?= form_error('username','<span class="text-danger">','</span>')?>
				  <input type="password" class="form-control" value="<?= set_value('password')?>" name="password" id="password" placeholder="password" aria-label="Password" aria-describedby="addon-wrapping">
                  <?= form_error('password','<span class="text-danger">','</span>')?>
				<button type="submit" name="submit" class="btn btn-primary">Log in</button>
    		</form>
    	</div>
    </div>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>