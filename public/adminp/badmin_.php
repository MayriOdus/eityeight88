<!-- <div id="tabs-container">
    <ul class="tabs-menu">
        <li class="current"><a href="#tab-1">Tab 1</a></li>
        <li><a href="#tab-2">Tab 2</a></li>
        <li><a href="#tab-3">Tab 3</a></li>
        <li><a href="#tab-4">Tab 4</a></li>
    </ul>
    <div class="tab">
        <div id="tab-1" class="tab-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sit amet purus urna. Proin dictum fringilla enim, sit amet suscipit dolor dictum in. Maecenas porttitor, est et malesuada congue, ligula elit fermentum massa, sit amet porta odio est at velit. Sed nec turpis neque. Fusce at mi felis, sed interdum tortor. Nullam pretium, est at congue mattis, nibh eros pharetra lectus, nec posuere libero dui consectetur arcu. Quisque convallis facilisis fermentum. Nam tincidunt, diam nec dictum mattis, nunc dolor ultrices ipsum, in mattis justo turpis nec ligula. Curabitur a ante mauris. Integer placerat imperdiet diam, facilisis pretium elit mollis pretium. Sed lobortis, eros non egestas suscipit, dui dui euismod enim, ac ultricies arcu risus at tellus. Donec imperdiet congue ligula, quis vulputate mauris ultrices non. Aliquam rhoncus, arcu a bibendum congue, augue risus tincidunt massa, vel vehicula diam dolor eget felis.</p>
        </div>
        <div id="tab-2" class="tab-content">
            <p>Donec semper dictum sem, quis pretium sem malesuada non. Proin venenatis orci vel nisl porta sollicitudin. Pellentesque sit amet massa et orci malesuada facilisis vel vel lectus. Etiam tristique volutpat auctor. Morbi nec massa eget sem ultricies fermentum id ut ligula. Praesent aliquet adipiscing dictum. Suspendisse dignissim dui tortor. Integer faucibus interdum justo, mattis commodo elit tempor id. Quisque ut orci orci, sit amet mattis nulla. Suspendisse quam diam, feugiat at ullamcorper eget, sagittis sed eros. Proin tortor tellus, pulvinar at imperdiet in, egestas sed nisl. Aenean tempor neque ut felis dignissim ac congue felis viverra. </p>
        
        </div>
        <div id="tab-3" class="tab-content">
            <p>Duis egestas fermentum ipsum et commodo. Proin bibendum consectetur elit, hendrerit porta mi dictum eu. Vestibulum adipiscing euismod laoreet. Vivamus lobortis tortor a odio consectetur pulvinar. Proin blandit ornare eros dictum fermentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Curabitur laoreet, ante aliquet molestie laoreet, lectus odio fringilla purus, id porttitor erat velit vitae mi. Nullam posuere nunc ut justo sollicitudin interdum. Donec suscipit eros nec leo condimentum fermentum. Nunc quis libero massa. Integer tempus laoreet lectus id interdum. Integer facilisis egestas dui at convallis. Praesent elementum nisl et erat iaculis a blandit ligula mollis. Vestibulum vitae risus dui, nec sagittis arcu. Nullam tortor enim, placerat quis eleifend in, viverra ac lacus. Ut aliquam sapien ut metus hendrerit auctor dapibus justo porta. </p>
        </div>
        <div id="tab-4" class="tab-content">
            <p>Proin sollicitudin tincidunt quam, in egestas dui tincidunt non. Maecenas tempus condimentum mi, sed convallis tortor iaculis eu. Cras dui dui, tempor quis tempor vitae, ullamcorper in justo. Integer et lorem diam. Quisque consequat lectus eget urna molestie pharetra. Cras risus lectus, lobortis sit amet imperdiet sit amet, eleifend a erat. Suspendisse vel luctus lectus. Sed ac arcu nisi, sit amet ornare tellus. Pellentesque nec augue a nibh pharetra scelerisque quis sit amet felis. Nullam at enim at lacus pretium iaculis sit amet vel nunc. Praesent sapien felis, tincidunt vitae blandit ut, mattis at diam. Suspendisse ac sapien eget eros venenatis tempor quis id odio. Donec lacus leo, tincidunt eget molestie at, pharetra cursus odio. </p>
        </div>
    </div>
</div> -->
<script>
$(document).ready(function() {
  /*  $(".tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
		  
		alert(tab);
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });*/
	var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
	// alert(pgurl);
     $("#nav-head li a").each(function(){
          if($(this).attr("href") == pgurl) {        
		 	$(this).parent().addClass("current");
		//	alert($(this).attr("href"));
			return false; 
		  }
     });
	
	 
});
</script>   
<style>/* //////////////////////// */
  
.tabs-menu  {
  /*  height: 30px;
    float: left;
    clear: both;
	*/
	list-style:none;
}

.tabs-menu {
    height: 30px;
    float: left;
    clear: both;
	 
}

.tabs-menu li {
    height: 30px;
    line-height: 30px;
    float: left;
    margin-right: 10px;
    background-color: #000;
    border-top: 1px solid #000;
    border-right: 1px solid #000;
	border-left: 1px solid #000;
  /*  border-left: 1px solid #d4d4d1; */
}

.tabs-menu li.current {
    position: relative;
    background-color: #fff;
    border-bottom: 1px solid #fff;
    z-index: 5;
}

.tabs-menu li a {
    padding: 10px;
    text-transform: uppercase;
    color: #FFF;
	/* font-weight:600; */
    text-decoration: none; 
}

.tabs-menu .current a {
    color: #000;
}

.tab {
    border: 1px solid #d4d4d1;
    background-color: #fff;
    float: left;
    margin-bottom: 20px;
    width: auto;
}

.tab-content {
    width: 660px;
    padding: 20px;
    display: none;
}

#tab-1 {
 display: block;   
}
</style>
<?php 
	echo  '<div class="row" style="margin-top:15px;">';
	 
	echo '<ul id="nav-head" class="tabs-menu">';
	echo '<li><a href="backoffice-adm.php">Products</a></li>';
	echo '<li><a href="backoffice-adm-order.php">Order</a></li>';
	echo '<li><a href="backoffice-adm-news.php">News</a></li>';	 
	echo '<li><a href="backoffice-adm-banner.php">Banner</a></li>';
        echo '<li><a href="backoffice-adm-banner2.php">Makeup</a></li>';
        echo '<li><a href="backoffice-adm-banner2.php">Skin care</a></li>';
	echo '<li><a href="backoffice-adm-type.php">Type Product</a></li>';	
	echo '<li><a href="backoffice-adm-color.php">Color</a></li>';	
	echo '<li><a href="backoffice-adm-user.php">Profile User</a></li>';
	echo '<li><a href="backoffice-adm-about.php">Abouts Us</a></li>';
	echo '</ul>';
	echo '</div>';
	 
	
 
?>

 
</style>
<?php 
	echo  '<div class="row" style="margin-top:0px;">';
	 
	echo '<ul id="nav-head" class="tabs-menu">';
	echo '<li><a href="backoffice-adm-contact.php">Contact Us</a></li>';
	echo '</ul>';
	echo '</div>';
	 
	
 
?>