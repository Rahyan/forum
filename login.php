<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('./db_connect.php');
?>

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Face-Off -- Forum login</title>


	<?php include('./header.php'); ?>
	<?php
	if (isset($_SESSION['login_id']))
		header("location:index.php?page=home");

	?>

</head>
<!DOCTYPE html>
<html lang="en-US">

<head>
	<title>Face-Off -- Forum</title>
	<meta charset="UTF-8">
	<meta name="language" content="en-US">
	<meta name="robots" content="index,follow" />
	<meta property="og:site_name" content="Chaos Arena" />
	<meta name="publisher" content="Chaos Arena" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/bdd38e1783.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="/js/main.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/main.css">
	<link rel="icon" type="image/png" href="/Face-Off.ico" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://unstopp4ble.com/assets/css/all.css" rel="stylesheet">
	<link href="https://unstopp4ble.com/assets/css/fontawesome.css" rel="stylesheet">
	<link href="https://unstopp4ble.com/assets/css/brands.css" rel="stylesheet">
	<link href="https://unstopp4ble.com/assets/css/solid.css" rel="stylesheet">
</head>

<body id="top">
	<div class="topnav" id="Navigation">
		<a href="/index.php">Home</a>
		<a href="/guides.php">Resources</a>
		<a href="/watchfaces.php">Watch Faces</a>
		<a href="/contact.php">Contact</a>
		<a href="/about.php">About</a>
		<a href="/earnmoney.php">Earn Money</a>
		<div class="special-btn">
			<a href="/forum/" class="active">Forum</a>
		</div>
		<a href="javascript:void(0);" class="icon" onclick="navFunction()">
			<i class="fa fa-bars"></i>
		</a>
		  <div id="wrapper">
	<div class="menu-search-box">
		<form action="/search.php" method="get">
			<input type="text" name="search" id="search" class="search" maxlength="60" placeholder="Search..." autocomplete="off" required>
			<button type="submit"><i class="fa fa-search"></i></button>
      <br>
		</form>
    <script>
function dropMenu(nbtn) {
	if (document.getElementById("dropMenu"+nbtn).style.display ==="none"){
		document.getElementById("arrowm"+nbtn).style.transform="rotate(180deg)";
		document.getElementById("dropMenu"+nbtn).style.display ="block";
	}
	else{
		document.getElementById("dropMenu"+nbtn).removeAttribute("display")
		document.getElementById("arrowm"+nbtn).style.transform="rotate(0)";
		document.getElementById("dropMenu"+nbtn).style.display ="none"
	}
}

function showBtn(){
  const menu = document.getElementById("gmenu")
  if(document.getElementById("gmenu").style.display === "none"){
    document.getElementById("arrowm").style.transform="rotate(180deg)";
    menu.style.display="block";
  }
  else{
    menu.removeAttribute("display")
    document.getElementById("arrowm").style.transform="rotate(0)";
    menu.style.display="none"
  }
}
function navFunction() {
  var x = document.getElementById("Navigation");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function btnFunction() {
  document.getElementById("btnDropdown").classList.toggle("show");
}
  // Get the search input
  var search = document.getElementById("search");
  // Get the suggestion container
  var suggestions = document.getElementById("suggestions");

  // Add an event listener to the search input
  search.addEventListener("input", function() {
    // Send an AJAX request to the server
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "search_suggestions.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // Get the response from the server
        var response = JSON.parse(xhr.responseText);
        // Clear the previous suggestions
        suggestions.innerHTML = "";
        // Loop through the suggestions
        for (var i = 0; i < response.length; i++) {
          // Create a new suggestion element
          var suggestion = document.createElement("div");
          suggestion.innerHTML = response[i];
          suggestions.appendChild(suggestion);
        }
      }
    };
    xhr.send("search=" + search.value);
  });

</script>
	</div>
</div>
	</div>
	<style>
		body {
			background-image: linear-gradient(to right, #0acffe 0%, #495aff 100%) !important;
		}
	</style>
	<body>
		<section style="padding:0px;" id="text">
		<div class="article-title">
			<h1 style="font-family: 'Plus Jakarta Sans' !important;">Welcome to Face-Off's Forum !</h1>
		</div>
		<div class="article-content">
		<form id="login-form">
			<div class="form-group">
				<label for="username" class="control-label">Username</label>
				<input type="text" id="username" name="username" class="form-control">
			</div>
			<div class="form-group">
				<label for="password" class="control-label">Password</label>
				<input type="password" id="password" name="password" class="form-control">
				<br>
				<center><button class="submitbtn">Login</button></center>
			<h3>Don't have an account ? <a href="signup.php">Sign up here !</a></h3>
		</form>
		</div>
		</section>



	</body>
	<script>
function dropMenu(nbtn) {
	if (document.getElementById("dropMenu"+nbtn).style.display ==="none"){
		document.getElementById("arrowm"+nbtn).style.transform="rotate(180deg)";
		document.getElementById("dropMenu"+nbtn).style.display ="block";
	}
	else{
		document.getElementById("dropMenu"+nbtn).removeAttribute("display")
		document.getElementById("arrowm"+nbtn).style.transform="rotate(0)";
		document.getElementById("dropMenu"+nbtn).style.display ="none"
	}
}

function showBtn(){
  const menu = document.getElementById("gmenu")
  if(document.getElementById("gmenu").style.display === "none"){
    document.getElementById("arrowm").style.transform="rotate(180deg)";
    menu.style.display="block";
  }
  else{
    menu.removeAttribute("display")
    document.getElementById("arrowm").style.transform="rotate(0)";
    menu.style.display="none"
  }
}
function navFunction() {
  var x = document.getElementById("Navigation");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function btnFunction() {
  document.getElementById("btnDropdown").classList.toggle("show");
}
		$('#login-form').submit(function(e) {
			e.preventDefault()
			$('#login-form button[type="button"]').attr('disabled', true).html('Logging in...');
			if ($(this).find('.alert-danger').length > 0)
				$(this).find('.alert-danger').remove();
			$.ajax({
				url: 'ajax.php?action=login',
				method: 'POST',
				data: $(this).serialize(),
				error: err => {
					console.log(err)
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

				},
				success: function(resp) {
					if (resp == 1) {
						location.href = 'index.php?page=home';
					} else {
						$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
						$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
					}
				}
			})
		})
	</script>

</html>