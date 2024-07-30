<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

</head>
<style>
	.collapse a{
		text-indent:10px;
	}
	nav#sidebar{
		background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>) !important
	}
</style>

<nav id="sidebar" class='mx-lt-5' >
		
		<div class="sidebar-list">
				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=explore" class="nav-item nav-explore"><span class='icon-field'><i class="fa fa-home"></i></span> Explore</a>
				<a href="index.php?page=categories" class="nav-item nav-categories"><span class='icon-field'><i class="fa fa-tags"></i></span> Category/Tags</a>
				<a href="index.php?page=topics" class="nav-item nav-topics"><span class='icon-field'><i class="fa fa-comment"></i></span> Discussion</a>				
				<a href="index.php?page=bookmarks" class="nav-item nav-bookmarks"><span class='icon-field'><i class="fa fa-bookmark"></i></span> Bookmarks</a>
				<a href="index.php?page=chat" class="nav-item nav-chat"><span class='icon-field'><i class="fa fa-comments"></i></span> Chat</a>
				<a href="index.php?page=userspage" class="nav-item nav-userspage"><span class='icon-field'><i class="fa fa-users"></i></span> Following</a>
				<a href="index.php?page=stuff" class="nav-item nav-stuff"><span class='icon-field'><i class="fa fa-ellipsis-h"></i></span> Boring stuff</a>
				<a href="index.php?page=support" class="nav-item nav-support"><span class='icon-field'><i class="fa fa-question-circle"></i></span> Support</a>
				<?php if($_SESSION['login_type'] == 1): ?>
					<br>
				<h1 style="font-size:22px; text-align:center;">Moderation Tools</h1>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
			<?php endif; ?>

		</div>

</nav>
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
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
