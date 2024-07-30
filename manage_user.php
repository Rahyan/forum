<?php 
include('db_connect.php');
session_start();
if(isset($_GET['id'])){
$user = $conn->query("SELECT * FROM users where id =".$_GET['id']);
foreach($user->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<div class="container-fluid">
	<div class="center">
	<div class="pagination" style="max-width:440px; width:auto; overflow-x:scroll;">
	<a href="#">Account</a>
	<a href="#">Profile</a>
	<a href="#">Privacy</a>
	<a href="#">Customization</a>
	<a href="#">Emails</a>
	</div></div>
	<div id="msg"></div>
	<section id="account">
	<form action="" id="manage-user">	
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" class="form-control" value="<?php echo isset($meta['name']) ? $meta['name']: '' ?>" required>
		</div>
		<div class="form-group">
			<label for="username">Email</label>
			<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required  autocomplete="off">
		</div>
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>" required  autocomplete="off">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="form-control" value="" autocomplete="off">
			<?php if(isset($meta['id'])): ?>
			<small><i>Leave this blank if you dont want to change the password.</i></small>
		<?php endif; ?>
		</div>
		<?php if(isset($meta['type']) && $meta['type'] == 3): ?>
			<input type="hidden" name="type" value="3">
		<?php else: ?>
		<?php if(!isset($_GET['mtype'])): ?>
		<div class="form-group">
			<label for="type">User Type</label>
			<select name="type" id="type" class="custom-select">
				<option value="2" <?php echo isset($meta['type']) && $meta['type'] == 2 ? 'selected': '' ?>>Staff</option>
				<option value="1" <?php echo isset($meta['type']) && $meta['type'] == 1 ? 'selected': '' ?>>Admin</option>
			</select>
		</div>
		<?php endif; ?>
		<?php endif; ?>
		</section>

	</form>
</div>
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
	
	$('#manage-user').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_user',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully saved",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}else{
					$('#msg').html('<div class="alert alert-danger">Username already exist</div>')
					end_load()
				}
			}
		})
	})

</script>