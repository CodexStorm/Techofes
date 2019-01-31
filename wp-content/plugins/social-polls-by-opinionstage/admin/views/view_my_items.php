<?php 
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die(1); ?>

<div class="wrap">
	<div id="opinionstage-content">
		<div class="opinionstage-header-wrapper">
			<div class="opinionstage-logo-wrapper">
				<div class="opinionstage-logo"></div>
			</div>		
				<?php if ( !$os_client_logged_in ) {?>
				<div class="opinionstage-status-content">
					<div class='opinionstage-status-title'><b>Connect WordPress with Opinion Stage to Get Started</b></div>
					<form action="<?php echo OPINIONSTAGE_LOGIN_PATH ?>" method="get" class="opinionstage-connect-form">
						<i class="os-icon-plugin icon-os-poll-client"></i>
						<input type="hidden" name="utm_source" value="<?php echo OPINIONSTAGE_UTM_SOURCE ?>">
						<input type="hidden" name="utm_campaign" value="<?php echo OPINIONSTAGE_UTM_CAMPAIGN ?>">
						<input type="hidden" name="utm_medium" value="<?php echo OPINIONSTAGE_UTM_MEDIUM ?>">
						<input type="hidden" name="o" value="<?php echo OPINIONSTAGE_WIDGET_API_KEY ?>">
						<input type="hidden" name="callback" value="<?php echo opinionstage_callback_url()?>">
						<input id="os-email" type="email" name="email" placeholder="Enter Your Email" data-os-email-input>
						<button class="opinionstage-connect-btn opinionstage-blue-btn" type="submit" id="os-start-login" data-os-login>CONNECT</button>
					</form>
				</div>
				<?php } else { ?>
				<div class="opinionstage-status-content-connected">
					<div class='opinionstage-status-title'>You are connected to Opinion Stage with the following email</div>
					<i class="os-icon-plugin icon-os-form-success"></i>
					<label class="checked" for="user-email"></label>
					<input id="os-email" type="email" disabled value="<?php echo($os_options["email"]) ?>">
					<form method="POST" action="<?php echo get_admin_url(null, 'admin.php?page=opinionstage-disconnect-page')?>" class="opinionstage-connect-form">
						<button class="opinionstage-connect-btn opinionstage-blue-btn" type="submit" id="os-disconnect">DISCONNECT</button>
					</form>
				</div>
				<?php } ?>		
		</div>
	</div>
	<div id="container" style="background: #fff;overflow: hidden;">
		<div class="opinionstage-section-header">
			<div class="opinionstage-section-title">My Items</div>
			<a href="https://help.opinionstage.com/wordpress-plugin/how-to-add-items-to-your-wordpress-site" target="_blank" class="">Need help adding items to your site?</a>			
		</div>
		<table id="check" style="background: #fff;margin-left: 20px;margin-top: 20px;margin-bottom: 20px;"></table>
		<div id="loadMore" class="btn btn_aqua btn_full-width" style="display: none;">CLICK FOR MORE</div>
		<div id="showLess" style="display: none;">Show less</div>
	</div>
	</div>	
<script type="text/javascript">
// This is our actual script
	jQuery(document).ready(function($){		
    	$.ajax({
			url: 'https://www.opinionstage.com/api/wp/v1/my/widgets?type=all&page=1&per_page=99',
			headers: {
			'Accept':'application/vnd.api+json',
			'Content-Type':'application/vnd.api+json',
			'OSWP-Plugin-Version':'<?php echo OPINIONSTAGE_WIDGET_VERSION ?>',
			'OSWP-Client-Token': '<?php echo opinionstage_user_access_token() ?>'
			    },
			method: 'GET', 
			dataType: 'json',
			success: function(data){
				dropdownOptions = data;
				if(dropdownOptions.data.length == 0){
					var adminUrlCreateLink = "<?php echo admin_url( 'admin.php?page=opinionstage-settings'); ?>";
					var viewtext = '<tbody><tr><td><p><span style="font-weight: 600; font-size: 15px; color:#3499c2;">No items found, </span><a href="'+adminUrlCreateLink+'" style="font-weight: 600; font-size: 15px; color:#3499c2;">Create your first one.</a></p></td></tr></tbody>';
					$(viewtext).appendTo('#container table#check');
				}else{
					for (var i = 0; i < dropdownOptions.data.length; i++) {
			            var previewBlockOsTitle = dropdownOptions.data[i].attributes['title'];
			            var previewBlockOsType = dropdownOptions.data[i].attributes['type'];
			            var previewBlockOsDate = dropdownOptions.data[i].attributes['updated-at'];
			            	previewBlockOsDate = new Date(previewBlockOsDate);
							previewBlockOsDate = previewBlockOsDate.toDateString();
						var resDateOs = previewBlockOsDate.split(" ");
  							previewBlockOsDate = resDateOs[2]+' '+resDateOs[1]+' '+resDateOs[3];
			            var previewBlockOsImageUrl = dropdownOptions.data[i].attributes['image-url'];
			            var previewBlockOsView = dropdownOptions.data[i].attributes['landing-page-url'];
			            var previewBlockOsEdit = dropdownOptions.data[i].attributes['edit-url'];
			            var previewBlockOsStatistics = dropdownOptions.data[i].attributes['stats-url'];
			            var viewtext = '<tbody id="count"><tr class="settingBorderOs"><td class="image"><div class="content-item-image quiz"><img height="90" src="'+previewBlockOsImageUrl+'" width="120"><div class="content-item-label">'+previewBlockOsType+'</div></div></td><td class="long"><div style="position: relative;height: 85px;"><a href="'+previewBlockOsEdit+'" target="_blank">'+previewBlockOsTitle+'</a><table><tbody><tr><td><span class="os-icon-plugin icon-os-common-date"></span><div class="label">'+previewBlockOsDate+'</div></td></tr></tbody></table></div></td><td class="action"><a href="'+previewBlockOsView+'" class="opinionstage-blue-bordered-btn opinionstage-edit-content " target="_blank"> View </a><a href="'+previewBlockOsEdit+'" class="opinionstage-blue-bordered-btn opinionstage-edit-content " target="_blank"> Edit </a><a href="'+previewBlockOsStatistics+'" class="opinionstage-blue-bordered-btn opinionstage-edit-content " target="_blank"> Statistics </a></td></tr></tbody>';
							$(viewtext).appendTo('#container table#check');
		        	}		        		        	
				}				
			},
			complete: function(data) {
				size_li = $("table#check tbody#count").size();
				if(dropdownOptions.data.length == size_li){
            			setTimeout(function(){$('#showLess').trigger('click');},500);            			
          			}
          			// Show the div in 5s
				    var countItemOS = 10;
				    if(dropdownOptions.data.length > countItemOS){
				    	$("#loadMore").delay(2000).fadeIn(500);
				    }
					x=10;
				    $('table#check ttbody#count:lt('+x+')').show();
				    $('#loadMore').click(function () {
				        x= (x+10 <= size_li) ? x+10 : size_li;
				        $('table#check tbody#count:lt('+x+')').show(500);
				        if(size_li == x){
				    		$("#loadMore").hide(500);
				    	}
				    });
				    $('#showLess').live( 'click', function () {
				        x=(x-0<0) ? 10 : x-0;
				        $('table#check tbody#count').not(':lt('+x+')').hide();
				    });				    
			},
			error: function(){
			    console.log(data.statusText);
			}
		});

	});
</script>