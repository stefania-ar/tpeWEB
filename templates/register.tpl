{include file="header.tpl"}

<div class="upper" style="margin: 2%">
    <h1>Únete</h1>
</div>

<div class="container">
<div class="row">
    <div class="container" id="formContainer">
    <!-- <p>{$m}</p> -->
    <form class="form-signup" id="login" role="form" action="registerForm" method="POST" >
    <h3 class="form-signin-heading">Crea un usuario</h3>
    
    <div class="input-group mb-3">
        <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">@</span>
        </div>
        <input type="text" name="userR" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Contraseña</span>
        </div>
        <input type="password" name="passwordR" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
    </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
    </form>
    <!--  {$mensajeUsu}</p>--><p>
    <p>{$mensaje}</p>
</div> <!-- /container -->


{include file="footer.tpl"} 