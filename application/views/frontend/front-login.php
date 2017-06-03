<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>PopIn Login</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="<?php echo base_url()?>FrontPageLoginAssets/css/style.css">


</head>

<body>

<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>PopIn</h1>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <!--<div class="tooltip">Click Me</div>-->
  </div>
  <div class="form">
    <h2>Login to your account</h2>
    <form action="<?php echo base_url()?>Home/login">
      <input type="text" placeholder="Username" required/>
      <input type="password" placeholder="Password" required/>
      <button>Login</button>
    </form>
  </div>
  <div class="form">
    <h2>Create an account</h2>
    <form action="">
      <input type="text" placeholder="Username"/>
      <input type="password" placeholder="Password"/>
      <input type="email" placeholder="Email Address"/>
      <input type="tel" placeholder="Phone Number"/>
      <button>Register</button>

    </form>
  </div>
  <div class="cta"><a href="#">Forgot your password?</a></div>
</div>




</body>
</html>
