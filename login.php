<!DOCTYPE html>
<html lang="en">
<head?>
    <meta charset="UTF-8">
    <title>Login Form</title>

<link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<style>
html,
body {
  height: 100%;
}

.form-signin {
  max-width: 330px;
  padding: 1rem;
}

.form-signin .form-floating:focus-within {
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
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script>
  function validateForm()
  {
    var x=document.forms["loginForm"]["username"].value;
    if (x==null || x=="")
      {
      alert("username must be filled out");
      return false;
      }
    var x=document.forms["loginForm"]["password"].value;
    if (x==null || x=="")
      {
      alert("password must be filled out");
      return false;
      }
  }
</script>
</head>
<body class="align-items-center py-4 bg-body-tertiary mt-5">
 <div class="container w-200">
    <main class="form-signin w-500 m-auto">
      <form   name="loginForm" action="login_check.php" method="POST" class="login_form" onsubmit="return validateForm()">
      <div class="">
        <img class="mb-4 ms-5" src="./image/logo2.png" alt="" width="150" height="150">
      </div>
    <h1 class="h2 mb-3 fw-normal">Please sign in</h1>
    <h5 class="text-danger">
                    <?php
                        error_reporting(0);
                        session_start();
                        session_destroy();
                        echo $_SESSION['loginMessage'];
                    ?>
    </h5>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput"  name="username" placeholder="name@example.com">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit" name="submit" value="Login" >Sign in</button>
  </form>
</main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <?php
        include 'footer2.php';
        ?>
</body>
</html>