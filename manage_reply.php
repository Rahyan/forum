<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM replies where id=".$_GET['id'])->fetch_array();
	foreach($qry as $k =>$v){
		$$k = $v;
	}
}

?>
<div class="container-fluid">
	<form action="" id="update-reply">
				<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id']:'' ?>" class="form-control">
		
		<div class="row form-group">
			<div class="col-md-12">
				<label class="control-label">reply</label>
				<textarea name="reply" class="text-jqte"><?php echo isset($reply) ? $reply : '' ?></textarea>
			</div>
		</div>
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
	$('.select2').select2({
		placeholder:"Please select here",
		width:"100%"
	})
	$('.text-jqte').jqte();
	$('#update-reply').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_reply',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp == 1){
					alert_toast("Data successfully saved.",'success')
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})
	})
</script>