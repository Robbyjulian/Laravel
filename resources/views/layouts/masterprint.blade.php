<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<meta name="description" content=""/>
<meta name="author" content=""/>
<title>@yield('title') - {{ config('app.name')}}</title>
<!--favicon-->
<link rel="icon" href="{{asset ('assets/images/favicon.ico')}}" type="image/x-icon">
<!-- Bootstrap core CSS-->
<link href="{{asset ('assets/css/bootstrap.min.css')}}" rel="stylesheet"/>

@stack('page-styles')

</head>

<body onafterprint="myFunction()">

@yield('content')



<!-- Bootstrap core JavaScript-->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script> 
@stack('js')


</body>
</html>
