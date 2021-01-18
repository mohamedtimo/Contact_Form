<?PHP
// Check if user coming from a request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Assign Variables 
    $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $cellPhone = filter_var($_POST['cellphone'], FILTER_SANITIZE_NUMBER_INT);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    // Errors
    $formErrors = array();
    if (strlen($user) < 3) {
        $formErrors[] = 'Username Must be Larger Than <strong>3</strong> Characters';
    }
    if (strlen($message) <= 10) {
        $formErrors[] = 'Message must be more than <strong>10</strong> Characters';
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/contact.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Start Form -->

    <div class="container">
        <h2 class="text-center">Contact Me</h2>

        <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

            <?php if (!empty($formErrors)) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php foreach ($formErrors as $error) {
                        echo $error . "<br>";
                    }
                    ?>
                </div>
            <?php } ?>


            <div class="form-group">
                <input class="username form-control" type="text" name="username" placeholder="Type Your Username" value="<?php if (isset($user)) echo $user ?>">
                <i class="fa fa-user fa-fw"></i>
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert"> Username Must be Larger Than <strong>3</strong> Characters. </div>
            </div>
            <div class="form-group">
                <input class="email form-control" type="email" name="email" placeholder="Please Type a Valid Email" value="<?php if (isset($email)) echo $email ?>">
                <i class="fa fa-envelope fa-fw"></i>
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert"> Email Can not be empty.</div>
            </div>
            <input class="form-control" type="text" name="cellphone" placeholder="Type your cell phone" value="<?php if (isset($cellPhone)) echo $cellPhone ?>">
            <i class="fa fa-phone fa-fw"></i>
            <textarea class="message form-control" name="message" placeholder="Your message"> <?php if (isset($message)) echo $message ?></textarea>
            <div class="alert alert-danger custom-alert"> Message must be more than <strong>10</strong> Characters </div>
            <input class="btn btn-success btn-block" type="submit" value="Send Message">
            <i class="fa fa-send fa-fw"></i>
        </form>
    </div>

    <!-- End Form -->
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>