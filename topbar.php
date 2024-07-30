<head>
<link rel="stylesheet" type="text/css" href="/assets/css/forum.css">
</head>
<style>
.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}
.navbar{
  background-color: #000000;
  background-image: linear-gradient(147deg, #000000 0%, #434343 74%);

}
</style>

<nav class="navbar navbar-light fixed-top bg-primary" style="padding:0;min-height: 3.5rem">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  		
  		</div>
      <div class="col-md-4 float-left text-white" style="padding-top:10px; display: flex; flex-direction:row;">
      <i class="fa fa-bars" style="font-size:30px;"></i>
        <h1 style="font-size:20px;">Face-Off - Forum</h1>
      </div>
      <div class="col-md-4 float-left">
        <form id="manage-search">
            <input type="text" placeholder="Search here" id="find" class="form-control" value="<?php echo isset($_GET['keyword'])? $_GET['keyword'] :'' ?>">
        </form>
      </div>
	  	<div class="float-right">
        <div class=" dropdown mr-4">
            <a href="#" class="text-white dropdown-toggle"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login_name'] ?> </a>
              <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
                <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a>
                <a class="dropdown-item" href="javascript:void(0)" id="user_settings"><i class="fa fa-cog"></i> Settings</a>
                <a class="dropdown-item" href="ajax.php?action=logout"><i class="fa fa-power-off"></i> Logout</a>
              </div>
        </div>
      </div>
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
  $('#manage_my_account').click(function(){
    uni_modal("Manage Account","manage_user.php?id=<?php echo $_SESSION['login_id'] ?>&mtype=own")
  })
  $('#find').keypress(function(e){
    if(e.which == 13){
      $('#manage-search').submit()
    }
  })
  $('#manage-search').submit(function(e){
    e.preventDefault()
    location.href = "index.php?page=search&keyword="+$('#find').val()
  })
</script>