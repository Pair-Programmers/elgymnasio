<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>El-Gymnasio | Login</title>

    <link href="{{asset('adminsite')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('adminsite')}}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{asset('adminsite')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('adminsite')}}/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div style="text-align: center">
        <h1 class="logo-name" >Elgymnasio</h1>
    </div>

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
                    <h3>Welcome to El-Gymnasio</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" action="{{route('do_login')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control" value="malikqaxim36@gmail.com" placeholder="Username" name="email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" value="qasim12345" placeholder="Password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                <!-- <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="">Create an account</a> -->
            </form>
            <p class="m-t"> <small>Powerred By Pair Programmers 2021</small> </p>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{asset('adminsite')}}/js/jquery-2.1.1.js"></script>
    <script src="{{asset('adminsite')}}/js/bootstrap.min.js"></script>

</body>

</html>
