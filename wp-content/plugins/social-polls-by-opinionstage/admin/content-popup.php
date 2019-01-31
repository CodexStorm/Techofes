<?php
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();

add_action( 'media_buttons', 'opinionstage_content_popup_add_editor_button');
add_action( 'admin_enqueue_scripts', 'opinionstage_content_popup_js');
add_action( 'admin_footer', 'opinionstage_content_popup_html' );
add_action( 'admin_footer', 'opinionstage_content_popup_css_dropdown' );

function opinionstage_content_popup_add_editor_button() {
	require( plugin_dir_path( __FILE__ ).'content-popup-button.php' );
}

function opinionstage_content_popup_js() {

	// asset loader hotfix TODO: improve this loader machanism 
		opinionstage_register_javascript_asset(
			'content-popup',
			'content-popup.js',
			array('jquery')
		);

		opinionstage_enqueue_js_asset('content-popup');	
}

function opinionstage_content_popup_html() {
	require( plugin_dir_path( __FILE__ ).'content-popup-template.html.php' ); ?>
  <script>
    jQuery(document).ready(function ($) {       
        $('span#oswpLauncherContentPopupExamples').parent().attr({'data-opinionstage-content-launch':"", 'data-os-view':"examples"});
        $('span#oswpLauncherContentPopup').parent().attr({'data-opinionstage-content-launch':"", 'data-os-view':"content"});
        $('span#oswpLauncherContentPopupExamples').parent().on('click',function(e){
          var dataView = $(this).attr('data-os-view');           
              if(dataView == 'examples'){
                setTimeout(function(){$('div#show-templates').trigger('click');},2000); 
              }  
        });
          $('span#oswpLauncherContentPopup').parent().on('click',function(e){    
            e.preventDefault();
            $('div#view-items').trigger('click');
          });
      });
  </script>
<?php }

function opinionstage_content_popup_css_dropdown(){ ?>
	<style type="text/css">
span#insert_error_editor {
    color: #9F6000;
    background-color: #FEEFB3;
    padding: 10px;
    font-size: 15px;
    font-weight: bold;
    width: 100%;
    text-align: center;
}
span#insert_error_editor a {
    text-decoration: none;
}
    .dropbtn {
    font-size: 16px;
    border: 1px solid #e4e4e4;
    background-color: #ffffff;
    cursor: pointer;
    display: inline-block;
    font: 16px/42px Open Sans,Helvetica,sans-serif;
    text-align: left;
    text-decoration: none;
    width: 140px;
    position: relative;
    outline: none!important;
    border-right: 0px !important;
    padding-left: 20px;
    box-shadow: 0px 0px 0px !important;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 9;
  top: 45px;
  left: 1px;
}

.dropdown-content div {
    display: block;
    color: #555454;
    border: 1px solid #3487fa;
    padding: 5px 10px 5px 20px;
    background-color: #fff;
    text-decoration: none;
    border-top: 0px !important;
    border-bottom: 0px !important;
}

.dropdown-content div:hover {background-color: #3487fa; color: #fff !important;}

.dropdown:hover .dropdown-content {
  display: block !important;
  width: 180px;
}

.dropdown:hover .dropbtn {
  background-color: #ffffff;
}
.opinionstage-content-popup-contents .filter__itm{
  width: 100%;
  line-height : 25px !important;
  font-size: 12px !important;
  margin-right: 0px !important;
}
button#dropbtn span {
    text-transform: uppercase;
    color: #555454;
    font-size: 12px;
    font-weight: 700;
}
.filter {
     margin: 0 !important; 
}
button#dropbtn:before {
    content: "";
    display: block;
    position: absolute;
    top: 0px;
    font-size: 12px;
    font-family: os-icon-font !important;
    right: -25px;
    z-index: 3;
    color: #000;
}
button#dropbtn:after {
    content: "";
    position: absolute;
    top: 0;
    width: 40px;
    right: -41px;
    height: 100%;
    border: 1px solid #e4e4e4;
    top: -1px;
    border-left: 0px !important;
  }
  .opinionstage-content-popup-contents .filter__itm.active{
        background: #5299fb;
        font-weight: normal !important;
        color: #fff;
  }
  .filter__itm:last-child {
    border-bottom: 1px solid #3487fa !important;
}
.filter__itm:first-child {
    border-top: 1px solid #3487fa !important;
}
.opinionstage-content-popup-contents .btn-create:before{
    transform: rotateZ(90deg);
}
.opinionstage-content-popup-contents .std-search {
    background-color: #efefef;
    background: #ffffff;
    border: 1px solid #cccccc;
    box-sizing: border-box;
    border-radius: 2px;
    font-size: 14px;
    color: #555454;
    width: 100%;
    height: 40px;
    padding: 0 20px;
    box-shadow: 0px 0px;
}
.opinionstage-content-popup-contents .search{
  float: right;
}
.search:before {
    content: "";
    color: #3aaebd;
    position: absolute;
    right: 10px;
    top: 0;
    bottom: 0;
    font-size: 18px;
    height: 18px;
    margin: auto;
    pointer-events: none;
    font-family: os-icon-font !important;
}

/* Menu Content Popup */
  #companymenu
{
  background-color: #999;
  height:35px;
  width:100%;
  margin-top: -10px;
}
.companymenuul
{
  list-style-type: none;
}
.companymenuli
{
   display:block;
   line-height: 35px;
   padding: 0 15px;
}
.alisting
{
  text-decoration:none;
}
.alisting:hover
{
  color:#fff;
}

.companymenuli:hover > ul{
    display:block;
}

.submenu{
    display:none;
}

.submenu li{
    list-style-type:none;
}
.create-menu__itm{
  padding: 0px 0px !important;
}
a.alisting {
    padding-left: 18px;
}
li.create-menu__itm.companymenuli {
    position: relative;
}
ul.submenu {
    left: -100%;
    position: absolute;
    width: 100%;
    top: 0;
    border: 1px solid #3aaebd;
    border-bottom: 0px;
}
ul.submenu li a.create-menu__itm {
    text-align: center;
}
li.create-menu__itm.companymenuli:hover a.alisting {
    color: #fff;
}
li.create-menu__itm.companymenuli a.alisting {
    color: #3aaebd;
}
	</style>
<?php }
?>