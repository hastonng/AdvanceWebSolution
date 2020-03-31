<!-- ==============================
    Project:        Attendance System
    Version:        1.0
    Author:         Haston Ng
    Date Modified:  04/Mar/2020
================================== -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Attendance System | Login</title>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="<?=base_url();?>js/login.js" type="text/javascript"></script> -->
    <!-- Bootstrap core CSS -->
    <link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">

    <!-- Custom styles for this template -->
    <link href="<?=base_url();?>css/signin.css" rel="stylesheet">
</head>
  <body class="text-center">
    <form id="loginForm" action="index.php/LoginController/login" method="post" class="form-signin jumbotron shadow-lg">
        <div class="align-self-center" style="width: 8rem; height: 8rem; background-image: url(<?=base_url();?>assets/arulogo.png) !important; background-size:10rem 4rem; background-repeat: no-repeat; background-position: 50% 50%; margin: 1rem 0rem 0rem 7rem;"></div>
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input name="inputEmail" type="email" class="form-control" placeholder="Email address" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input name="inputPassword" type="password" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <!-- <label>
            <input name="rememberMe" type="checkbox" value="true"> Remember me
            </label> -->
            <!-- Replace with Forgot Password! -->
        </div>
    <button class="btn btn-lg btn-block text-white signin-btn"  value="Sign In" type="submit">Sign In</button>
    <p class="mt-5 mb-3 text-muted">Attendace System &copy; 2020 </p>
    <!-- <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>"/> -->
    </form>
</body>
<script type='text/javascript' language='javascript'>

const serialize_form = form => JSON.stringify(
    Array.from(new FormData(form).entries())
         .reduce((m, [ key, value ]) => Object.assign(m, { [key]: value }), {})
);

$('#loginForm').on('submit', function(event) {
event.preventDefault();
const json = serialize_form(this);
console.log(json);

    $.ajax({
        type: 'POST',
        url: "<?=base_url("index.php/LoginController/login");?>",
        dataType: 'json',
        data: json,
        contentType: 'application/json',
        success: function(data)
        {
            if(!data.message)
            {
                Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: 'Invalid Email and Password. Please try again.'
                })
            }
            else
            {
                window.location.href = "<?=base_url();?>"+data.url;
            }
        }
    });
});
</script>
</html>
