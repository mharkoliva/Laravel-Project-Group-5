<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background:linear-gradient(0deg, #ccffffc7, #ccffffc7), {{url('img/background.svg')}}">
	
	<div class="container">
		<div class="logo-container">
			<img class="logo-div" id="logo" src="{{url('img/logo.svg')}}" alt="logo">
		</div>
		<div class="login-content">
         <form method="POST" action="login">
         @csrf
				<img src="{{url('img/avatar.svg')}}">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>ID Number</h5>
           		   		<input type="text" class="input" name="id_no" value="{{ old('id_no') }}">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password" id="pass" value="{{ old('password') }}">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn" value="login">
				<div style="color:black;text-align:center;">
                @if (session('error'))
					<div style="margin-top:6px;">
				        {{ session('error') }}
				    </div>
				@endif
	    	</div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{url('js/main.js')}}"></script>
</body>
</html>