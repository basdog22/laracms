<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LaraCMS Authorization</title>
    {{ HTML::style('layouts/backend/plugins/bootstrap/bootstrap.css') }}
   <style>
       body {
           padding-top: 40px;
           padding-bottom: 40px;
           background-color: #eee;
       }

       .form-signin {
           max-width: 330px;
           padding: 15px;
           margin: 0 auto;
       }
       .form-signin .form-signin-heading,
       .form-signin .checkbox {
           margin-bottom: 10px;
       }
       .form-signin .checkbox {
           font-weight: normal;
       }
       .form-signin .form-control {
           position: relative;
           height: auto;
           -webkit-box-sizing: border-box;
           -moz-box-sizing: border-box;
           box-sizing: border-box;
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
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    @if(Session::has('message'))<div class="alert alert-danger" role="alert">
        {{ Session::get('message') }}
        </div>@endif
    {{$content}}

</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
