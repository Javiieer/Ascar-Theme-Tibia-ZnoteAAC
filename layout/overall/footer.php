</div>
<div class="sidebar">
	<div class="text-center">
		<h3 style="margin-top: 0;">Server Info</h3>
	</div>
  <table class="table table-hover table-striped table-condensed" style="margin-bottom: 0px;">
    <tbody><tr>
      <td width="width: 42%;">IP</td>
      <td>YourServer.com</td>
    </tr>
    <tr>
      <td>Client</td>
      <td>12.70</td>
    </tr>
    <tr>
      <td>Status</td>
      <td><a href="onlinelist.php">Online</a></td>
    </tr>
    <tr>
      <td>Players online</td>
      <td><div id="main-onlinecount">

      <?php echo user_count_online();?>

      </div></td>
    </tr>
    
    	</tbody></table>
	<br>
	<a href="downloads.php" class="btn btn-primary btn-shiny btn-block"><i class="fa fa-download fa-sm"></i> Download Tibia client</a>

	<hr>
	<?php if (user_logged_in() === true): ?>
		
		<h3>My account</h3>
		<p>Welcome to your account page, <font color="orange"><?php if ($config['ServerEngine'] !== 'OTHIRE') echo $user_data['name']; else echo $user_data['id']; ?></font><br>
			<?php if ($config['ServerEngine'] !== 'OTHIRE') {
				if ($user_data['premdays'] != 0) {
					echo 'You have ' .$user_data['premdays']. ' remaining premium account days.';
				} else {
					echo 'You are free account.';
				}
			} else {
				if ($user_data['premend'] != 0) {
					echo 'Your premium account will last till ';
					echo date("d/m/Y", $user_data['premend']);
				} else {
					echo 'You do not have premium account days.';
				}
			}
			if ($config['mailserver']['myaccount_verify_email']):
				?><br>Email: <?php echo $user_data['email'];
				if ($user_znote_data['active_email'] == 1) {
					?> (Verified).<?php
				} else {
					?><br><strong>Your email is not verified! <a href="?authenticate">Please verify it</a>.</strong><?php
				}
			endif; ?>
		</p>
			<div class="inner">
		
			<hr>
			<a href="myaccount.php" class="btn btn-primary btn-shiny btn-block">
				<font color="gold">My Account</font></a>

			<a href="createcharacter.php" class="btn btn-primary btn-shiny btn-block">
				<font color="gold">Create Character</font></a>

			<a href="changepassword.php" class="btn btn-primary btn-shiny btn-block">
				<font color="gold">Change Password</font></a>

			<a href="settings.php" class="btn btn-primary btn-shiny btn-block">
			<font color="gold">Settings</font></a>
			
			<a href="logout.php" class="btn btn-primary btn-shiny btn-block">
			<font color="gold">	Logout</font></a>
			
		
</div>
<hr>
	<?php else: ?>

			<h3 class="text-center" style="margin-top: 0;">Login Panel</h3>
	<form class="loginForm" action="login.php" method="post">
			<div class="input-group">
				<span class="input-group-addon login-icons" id="username" style="width: 10%;"><i class="fas fa-user"></i></span>
				<input type="text" name="username" id="login_username" class="form-control">
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon login-icons" id="password" style="width: 10%;"><i class="fas fa-key"></i></span>
				<input class="form-control" type="password" name="password" id="login_password">
			</div>
			<br>
			<?php if ($config['twoFactorAuthenticator']): ?>
				<div class="input-group">
					<input class="form-control" type="password" name="authcode">
				</div>
			<?php endif; ?>
			<center>
			<div class="input-group">
				
				<input type="submit" value="Log in" class="btn btn-primary btn-block submitButton">
			</div></center>
			<br>
			<a href="register.php" class="btn btn-secondary btn-block"><i class="fas fa-user-plus fa-sm"></i> Create account</a>
			<?php
				/* Form file */
				Token::create();
			?>
			
		</form>
	<hr>
<?php endif; ?>
	<div class="row" style="margin-bottom: 5px;">
		<div>
			<div class="text-center">
				<h3 style="margin-top: 0;">Social</h3>
										<a href="Facebook URL" target="_blank"><i id="social-fb" class="fab fa-facebook-square fa-3x social"></i></a>
											<a href="Discord URL" target="_blank"><i id="social-discord" class="fab fa-discord social" style="font-size: 2.8em;"></i></a>
											<a href="mailto:Your@Email.com"><i id="social-email" class="fas fa-envelope-square fa-3x social"></i></a>
								</div>
		</div>
	</div>

	<hr>

	<div class="text-center">
		<h3 style="margin-top: 0;">Online <a href="twitch URL" target="_blank">Streamers</a></h3>
	</div>

	
			<div class="text-center">
			None - <a href="twitch URL">Be the first!</a>
		</div>
	</div>
	

	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.28/moment-timezone-with-data-10-year-range.min.js" integrity="sha256-HS6OzSyhM0rDG0PhZGwf/FvptBzIJnv4MgL2pe87xgg=" crossorigin="anonymous"></script>
				<script type="text/javascript" src="laout/js/jquery.countdown.min.js"></script>
			</body>
			<div class="footer">
				<p> Theme Converted by: <a href="https://lepiigortv.com"> Alex45 </a></p>
</html>
