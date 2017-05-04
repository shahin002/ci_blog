  <section class="container">
    <div class="login">
      <h1>Registration Form</h1>
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
      <form method="post" action="<?php echo base_url();?>user/save_user">
        <p><input type="text" name="blogger_name" value="" placeholder="Firstname Lastname"></p>
        <p><input type="text" name="blogger_email_address" value="" placeholder="yourmail@example.com"></p>
        <p><input type="password" name="blogger_password" value="" placeholder="Password"></p>
        <p><textarea name="address" placeholder="full address" rows="3" cols="35"></textarea></p>
        <p>
            <select name="country">
                <option value="">Choose country..</option>
                <script type="text/javascript">
                    printCountryOptions();
                </script>
            </select>
        </p>
        
        <p class="submit"><input type="submit" name="commit" value="Register"></p>
      </form>
    </div>
  </section>
