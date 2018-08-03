<?php $this->start('head'); ?>
<style type="text/css">
	html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
	<form class="form-signin" action="<?=PROOT?>user/login" method="post">
      <div class="text-center">
      	<img class="mb-4" src="https://getbootstrap.com/docs/4.1/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      </div>

      <h1 class="h3 mb-3 font-weight-normal text-center">Please sign in</h1>

      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="text" name="username" class="form-control" placeholder="Email address" required>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me" name="remember"> Remember me
        </label>
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <a class="btn btn-secondary btn-lg btn-block" href="<?=PROOT?>user/register">Register</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
    </form>
<?php $this->end(); ?>