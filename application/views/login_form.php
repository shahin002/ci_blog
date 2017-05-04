  <section class="container">
    <div class="login">
      <h1>Login Form</h1>
      <h4 style="color: red;">
          <?php 
            $exception = $this->session->userdata('exception');
            if(isset($exception))
            {
                echo $exception;
                $this->session->unset_userdata('exception');
            }
          ?>
      </h4>
      <h4 style="color:green;">
                    <?php
                    $loggedout = $this->session->userdata('loggedout');

                    if (isset($loggedout)) {
                        echo $loggedout;
                        $this->session->unset_userdata('loggedout');
                    }
                    ?>
      </h4>
      <h4 style="color: green;">
          <?php 
            $message = $this->session->userdata('message');
            if(isset($message))
            {
                echo $message;
                $this->session->unset_userdata('message');
            }
          ?>
      </h4>
      <form method="post" action="<?php echo base_url();?>user/check_login">
        <p><input type="text" name="blogger_email_address" value="" placeholder="Email"></p>
        <p><input type="password" name="blogger_password" value="" placeholder="Password"></p>
        
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>

    <div class="login-help">
      <p>Forgot your password? <a href="index.html">Click here to reset it</a>.</p>
    </div>
  </section>
