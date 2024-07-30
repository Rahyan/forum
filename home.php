<?php include 'db_connect.php' ?>
<style>
   span.float-right.summary_icon {
    font-size: 3rem;
    position: absolute;
    right: 1rem;
    color: #ffffff96;
}
.imgs{
		margin: .5em;
		max-width: calc(100%);
		max-height: calc(100%);
	}
	.imgs img{
		max-width: calc(100%);
		max-height: calc(100%);
		cursor: pointer;
	}
	#imagesCarousel,#imagesCarousel .carousel-inner,#imagesCarousel .carousel-item{
		height: 60vh !important;background: black;
	}
	#imagesCarousel .carousel-item.active{
		display: flex !important;
	}
	#imagesCarousel .carousel-item-next{
		display: flex !important;
	}
	#imagesCarousel .carousel-item img{
		margin: auto;
	}
	#imagesCarousel img{
		width: auto!important;
		height: auto!important;
		max-height: calc(100%)!important;
		max-width: calc(100%)!important;
	}
</style>

<div class="containe-fluid">
	<div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <?php 
                    date_default_timezone_set('Europe/Paris');

                    $current_hour = date('H');
                    
                    $greeting = '';
                    
                    if ($current_hour >= 5 && $current_hour < 12) {
                        $greeting = 'Good morning, ';
                    } elseif ($current_hour >= 12 && $current_hour < 14) {
                        $greeting = 'Good noon, ';
                    } elseif ($current_hour >= 14 && $current_hour < 17) {
                        $greeting = 'Good afternoon, ';
                    } elseif ($current_hour >= 17 && $current_hour < 20) {
                        $greeting = 'Good evening,';
                    } elseif ($current_hour >= 20 || $current_hour < 5) {
                        $greeting = 'Good night, ';
                    }
                    echo '<h1 style="font-size:28px;">'.$greeting. $_SESSION['login_name'].'!'.'</h1>'  ?>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body bg-primary">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"><i class="fa fa-users"></i></span>
                                        <h4><b>
                                            <?php echo $conn->query("SELECT * FROM users")->num_rows; ?>
                                        </b></h4>
                                        <p><b>Users</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body bg-info">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"><i class="fa fa-comments"></i></span>
                                        <h4><b>
                                            <?php echo $conn->query("SELECT * FROM topics")->num_rows; ?>
                                        </b></h4>
                                        <p><b>Forum Topics</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body bg-warning">
                                    <div class="card-body text-white">
                                        <span class="float-right summary_icon"><i class="fa fa-tags"></i></span>
                                        <h4><b>
                                            <?php echo $conn->query("SELECT * FROM categories")->num_rows; ?>
                                        </b></h4>
                                        <p><b>Tags</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>	

                    <hr class="divider" style="max-width: 100%">
                    <h4><i class="fa fa-tags text-primary"></i> Tags</h4>
                    <div class="row">
                    <?php
                     $tags = $conn->query("SELECT * FROM categories order by name asc");
                     while($row=$tags->fetch_assoc()):
                    ?>
                        <div class="col-md-3">
                        <div class="card mb-3">
                            <div class="card-body">
                                <p>
                                    <large><i class="fa fa-tag text-primary"></i> <b><?php echo $row['name'] ?></b></large>
                                </p>
                                <hr class="divider" style="max-width: 100%">
                                <p><small><i><?php echo $row['description'] ?></i></small></p>
                            </div>
                        </div>
                        </div>
                    <?php endwhile; ?>
                    </div>
                </div>
            </div>      			
        </div>
    </div>
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
	$('#manage-records').submit(function(e){
        e.preventDefault()
        start_load()
        $.ajax({
            url:'ajax.php?action=save_track',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'POST',
            type: 'POST',
            success:function(resp){
                resp=JSON.parse(resp)
                if(resp.status==1){
                    alert_toast("Data successfully saved",'success')
                    setTimeout(function(){
                        location.reload()
                    },800)

                }
                
            }
        })
    })
    $('#tracking_id').on('keypress',function(e){
        if(e.which == 13){
            get_person()
        }
    })
    $('#check').on('click',function(e){
            get_person()
    })
    function get_person(){
            start_load()
        $.ajax({
                url:'ajax.php?action=get_pdetails',
                method:"POST",
                data:{tracking_id : $('#tracking_id').val()},
                success:function(resp){
                    if(resp){
                        resp = JSON.parse(resp)
                        if(resp.status == 1){
                            $('#name').html(resp.name)
                            $('#address').html(resp.address)
                            $('[name="person_id"]').val(resp.id)
                            $('#details').show()
                            end_load()

                        }else if(resp.status == 2){
                            alert_toast("Unknow tracking id.",'danger');
                            end_load();
                        }
                    }
                }
            })
    }
</script>