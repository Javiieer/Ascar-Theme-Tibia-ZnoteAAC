<h3 style="margin-top: 0;">Server Info</h3></center>
  <table class="table table-hover table-striped table-condensed" style="margin-bottom: 0px;">
    <tr>
      <td width="width: 42%;">IP</td>
      <td>ascar.us</td>
    </tr>
    <tr>
      <td>Client</td>
      <td>8.6</td>
    </tr>
    <tr>
      <td>Status</td>
      <td><a href="online.html">Online</a></td>
    </tr>
    <tr>
      <td>Players online</td>
      <td><div id="main-onlinecount">

      011

      </div></td>
    </tr>
    
    	</table>
	<br>
	<a href="https://www.ascar.us/downloads" class="btn btn-primary btn-shiny btn-block"><i class="fa fa-download fa-sm"></i> Download Ascarus client</a>

	<hr/>

					<h3 class="text-center" style="margin-top: 0;">Login Panel</h3>
			<form id="sidebar-login-form" name="login" action="account.html" method="post">
				<div class="input-group">
					<span class="input-group-addon login-icons" id="username" style="width: 10%;"><i class="fas fa-user"></i></span>
					<input type="text" class="form-control" placeholder="Account name..." aria-describedby="username" name="user">
				</div>
				<br/>
				<div class="input-group">
					<span class="input-group-addon login-icons" id="password" style="width: 10%;"><i class="fas fa-key"></i></span>
					<input type="password" class="form-control" placeholder="Password..." aria-describedby="password" name="pass">
				</div>
				<br/>
				<input type="hidden" id="sidebar-login-captcha" name="g-recaptcha-response">
				<button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in fa-sm"></i> Login</button>
				<a href="https://www.ascar.us/register" class="btn btn-secondary btn-block"><i class="fas fa-user-plus fa-sm"></i> Create account</a>
			</form>
			<script>
				$('#sidebar-login-form').submit(function(event) {
					event.preventDefault();
					grecaptcha.ready(function() {
						grecaptcha.execute('6LdaN6AUAAAAAMEJMZBX_8vT96wj1smv_kuKAMJe', {action: 'login'}).then(function(token) {
							$('#sidebar-login-captcha').val(token);
							$('#sidebar-login-form').unbind('submit').submit();
						});
					});
				});
			</script>
		
		<hr/>