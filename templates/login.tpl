{include file="header.tpl"}

<p>{$mensaje}</p>

<div class="container">
	<div class="row">
    	<div class="container" id="formContainer">
        <p>{$m}</p>
        <form class="form-signin" id="login" role="form" action="verify" method="POST">
        <h3 class="form-signin-heading">Please sign in</h3>
        
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">@</span>
          </div>
          <input type="text" name="user" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-default">Contraseña</span>
          </div>
          <input type="password" name="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
      <p>{$mensajeUsu}</p>
      <p>{$mensajeC}</p>
</div> <!-- /container -->
	
{include file="footer.tpl"}   