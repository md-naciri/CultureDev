<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" href="assets/img/browser.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>CultureDev</title>
</head>

<body>
    <div class="wrapper">
        <div class="container main">

            <div class="row row-sign row-focus">
                <div class="col-md-6 left-side">
                    <img src="assets/img/justwhite.png" alt="">
                    <div class="catchy-txt">
                        <p>“Code Connects Us”</p>
                    </div>
                </div>
                <div class="col-md-6 right-side">
                    <div class="input-box">
                        <div class="catchy-txt-2">
                            <p>“Code Connects Us”</p>
                        </div>
                        <header class="mb-4">Create account</header>
                        <form action="inc/signup.inc.php" method="post">
                            <div class="input-field">
                                <input type="text" class="input mb-3" name="fname" id="fullname" required>
                                <label for="fullname">Full name</label>
                            </div>
                            <div class="input-field">
                                <input type="text" class="input mb-3" name="email" id="email" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input mb-4" name="pwd" id="password" required>
                                <label for="password">Password</label>
                            </div>
                            <div id="error-message">
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit mb-1" name="submit" value="Sign Up">
                            </div>
                        </form>
                        <div class="login mt-4">
                            <span>Already have an account? <a href="#" id="go-log">Log In</a></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-log row-focus">
                <div class="col-md-6 left-side">
                    <img src="assets/img/justwhite.png" alt="">
                    <div class="catchy-txt">
                        <p>“Code Connects Us”</p>
                    </div>
                </div>
                <div class="col-md-6 right-side">
                    <div class="input-box">
                        <div class="catchy-txt-2">
                            <p>“We Believe In Code”</p>
                        </div>
                        <header class="mb-4">Welcome back</header>
                        <form action="inc/login.inc.php" method="post">
                            <div class="input-field">
                                <input type="text" class="input mb-3" name="email" id="email" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input mb-4" name="pwd" id="password" required>
                                <label for="password">Password</label>
                            </div>
                            <div id="error-message">
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit mb-1" name="submit" value="Log In">
                            </div>
                        </form>
                        <div class="login mt-4">
                            <span>Or create account? <a href="#" id="go-sign">Sign Up</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/script.js"></script>

</body>

</html>