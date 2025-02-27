<?php
$sql = "SELECT * FROM mainmenu Mainmenu WHERE Mainmenu.active = 1 AND Mainmenu.language =  '" . Yii::app()->language . "' ORDER BY Mainmenu.weight ASC";
$MenuPadres = Yii::app()->db->createCommand($sql)->queryAll();
$menus = array ();
$i = 0;
foreach ($MenuPadres as $MenuPadre)
{ // mostrar y comparar menu de primer nivel
	$MenuPadre['menu'] = array ();
	$idpadre = $MenuPadre['id'];
	if ($MenuPadre['parent'] == 0)
	{
		foreach ($MenuPadres as $MenuPadre2)
		{ // mostrar y comparar menu de segundo nivel
			$MenuPadre2['menu'] = array ();
			if ($MenuPadre2['parent'] == $idpadre)
			{
				foreach ($MenuPadres as $MenuPadre3)
				{ // mostrar y comparar menu de tercer nivel
					if ($MenuPadre3['parent'] == $MenuPadre2['id'])
					{
						$MenuPadre2['menu'][] = $MenuPadre3;
					}
				}
				$MenuPadre['menu'][] = $MenuPadre2;
			}
		}
		$i++ ;
	}
	// var_dump($MenuPadre); echo '<br/><br/><br/><br/>';
	$menus[] = $MenuPadre;
}
$total = $i;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="icon" type="image/png" href="images/favicon.ico" />
<link rel="icon" type="image/png" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
<meta NAME="AUTHOR" CONTENT="Ricober Martinez, Guillermo Enrique,Daniel Ruiz">
<meta NAME="REPLY-TO" CONTENT="ricoberweb@gmail.com, gsanchez1687@gmail.com, Daruizg@gmail.com">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta name="language" content="en" />
<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
<![endif]-->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
<!--<link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />-->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.11.4/jquery-ui.min.css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/css3-mediaquery.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>
<script>
function cambiar (flag,img) {
	if (document.images) {
		if (document.images[img].permitirloaded) {
				if (flag==1) document.images[img].src = document.images[img].permitir.src
				else document.images[img].src = document.images[img].permitir.oldsrc
	}}}
function preloadcambiar (img,adresse) {
	if (document.images) {
		img.onload = null;
		img.permitir = new Image ();
		img.permitir.oldsrc = img.src;
		img.permitir.src = adresse;
		img.permitirloaded = true;
	}
}

$(document).ready(function ($) {
	var $window = $(window);
	var scrollTime = 1.2;
	var scrollDistance = 170;
	var _CaptionTransitions = [];
	 var $window = $(window);
		var scrollTime = 0.5;
		var scrollDistance = 170;
		$window.on("mousewheel DOMMouseScroll", function(event){

			event.preventDefault();	
			var delta = event.originalEvent.wheelDelta/120 || -event.originalEvent.detail/3;
			var scrollTop = $window.scrollTop();
			var finalScroll = scrollTop - parseInt(delta*scrollDistance);

			TweenMax.to($window, scrollTime, {
				scrollTo : { y: finalScroll, autoKill:true },
					ease: Power1.easeOut,
					overwrite: 5
				});
	});
$('.dropdown-toggle').mouseover(function(e){
	$(this).parent().attr("class" , "dropdown open");
});

$('.dropdown-menu').mouseover(function(e){
	$(this).parent().attr("class" , "dropdown open");
});

$('.dropdown-toggle').mouseout(function(e){
	$(this).parent().attr("class" , "dropdown");
});

$('.dropdown-menu').mouseout(function(e){
	$(this).parent().attr("class" , "dropdown");
});

$('.padre').click(function(e){
	window.location.href = this.href;
});

});
</script>
<style type="text/css">
.iconosfijos{
	position: absolute;
	z-index:444;
	width:30px;
	top: 20%;
	right: 1%
}
<!--
a:link {
	text-decoration: none;
	color: black;
}

a:visited {
	text-decoration: none;
	color: black;
}

a:hover {
	text-decoration: none;
}

a:active {
	text-decoration: none;
}

.Estilo6 {
	font-size: 12px;
	font-family: Arial, Helvetica, sans-serif;
	color: #0099CC;
}

#divFlotante{
    width: 100% !important;
}

.footerInformation ul > li{
	float: left;
	width: 90px;
	list-style: none;
	margin-bottom: 1%;
	border-right: 1px solid white;
	font-family: helvetica_neueregular;
	height: 17px;
	vertical-align: baseline;
}

.footerInformation ul{
	color: white;
	margin: 0;
	padding: 0;
	margin-left: 33%;
	margin-top: 2%;
}

.lastChild{
	border: none !important;
}

.bordes{
	border-radius: 3px 3px 3px 3px;
	-moz-border-radius: 3px 3px 3px 3px;
	-webkit-border-radius: 3px 3px 3px 3px;
	border: 0px solid #000000;
	-webkit-box-shadow: 3px 4px 21px 2px rgba(0,0,0,0.75);
	-moz-box-shadow: 3px 4px 21px 2px rgba(0,0,0,0.75);
	box-shadow: 3px 4px 21px 2px rgba(0,0,0,0.75);
}

.fixed {
	position: fixed !important;
	top: 0 !important;
	z-index: 10;
}

.menu {
	color: #000000;
	z-index: 1;
	position: absolute; 
	width: 100%;
	background-color: white;
	top:0px;
	padding-top: 5px
}

.btn{
	padding: 15px !important;
}

.btn-default{
	border: none !important;
	background-color: inherit !important;
}

.btn-default>a{
	font-family: "Helvetica Neue",Helvetica,Arial,sans-serif !important;
	line-height: 20px !important;
	font-weight: bold !important;
	color: #424242 !important;
}
@media (min-width: 1200px){
.container{
	width: 1240px !important;
	text-align: center !important;
	position: relative !important
}
}
-->
</style>
</head>
<body>
<div style="float: left; position: relative; width: 100%; height: 66px">
	<div class="menu fixed" style="position:relative; float:left;width:100%; border-bottom: solid 1px #0004ff; opacity: 0.9;height: 66px">
			<div class="container">
						<nav role="navigation" class="navbar navbar-inverse">
							<div class="navbar-header">
								<button type="button" data-target="#navbarCollapse"
									data-toggle="collapse" class="navbar-toggle">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a href="#" class="navbar-brand" style="font-family: Arial, Helvetica, sans-serif; font-size: 1px;">
									<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sonaray_small.png" />
								</a>
							</div>
							<div id="navbarCollapse" class="collapse navbar-collapse">
								<ul class="nav navbar-nav">
	<?php
	$contador = 1;
	foreach ($menus as $menu)
	{
		if ($menu['parent'] == 0)
		{
			$total_sub = count($menu['menu']);
			if ($total_sub <= 0)
			{ // para saber si tiene hijos
				?>
	<?php if ($contador ==1) { ?>
				<li style="font-weight: bold;">
					<a style="cursor:pointer" <?php $this->id == 'home' ? print '' : print 'href="' . Yii::app()->request->baseUrl . '/' . Yii::app()->language . '/' . $menu['url'] . '"'; ?> role = "menuitem" class = "padre"> <?php echo $menu['name'];?></a>
				</li>
	<?php
					$contador++ ;
				}
				else
				{
					?> 
				<li style="font-weight: bold;">
					<a style="cursor:pointer" <?php $this->id == 'home' ? print '' : print 'href="' . Yii::app()->request->baseUrl . '/' . Yii::app()->language . '/' . $menu['url'] . '"'; ?> role = "menuitem" class = "padre"> <?php echo $menu['name'];?></a>
				</li>
	<?php  } ?> 
	<?php } else { ?>
				<li class="dropdown" style="color: #000000; font-weight: bold;" >
					<button type="button" class="btn btn-default">
						<a role="menuitem" href="<?php echo Yii::app()->request->baseUrl . '/' . Yii::app()->language . '/' . $menu['url']?>" style="font-size: 15px;cursor: pointer; color:#424242 !important" class = "padre" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $menu['name'] ?></a>
					</button>
					<button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
					<ul class="dropdown-menu" role="menu">
	<?php
				foreach ($menu['menu'] as $menu2)
				{
					$total_sub = count($menu2['menu']);
					// echo $total_sub;
					if ($total_sub <= 0)
					{
						?>
	<!--<li><a href="<?php //echo $menu2['url'];   ?>"><?php //echo $menu2['name'];   ?></a></li>-->
						<li style="font-size: 15px;" class="">
							<a href="<?php echo Yii::app()->request->baseUrl . '/' . Yii::app()->language . '/' . $menu2['url']; ?>"><?php echo $menu2['name'];?></a>
						</li>
	<?php
					}
					else
					{
						?>
						<li class="dropdown">
							<a href="#"><?php echo $menu2['name']; ?></a>
						</li>
	<?php
					}
				}
				?>
	</ul></li>
	 <?php }
}} ?>
	 </ul>
							</div>
						</nav>
					<div class="iconosfijos">
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/flag/<?php echo Yii::app()->session['flag'];?>.png" border="0" usemap="#Map">
		<map name="Map">
			<area shape="rect" coords="1,1,34,33" alt="Unete"  href="<?php echo Yii::app()->request->baseUrl; ?>">
			<area shape="rect" coords="-3,34,28,61" href="javascript:agregar()">
			<area shape="rect" coords="-3,66,29,105" href="contacto.php">
		</map>
	</div>
					</div>
	</div>
</div>
<?php  echo $content; ?>
<div style="clear:both;float:left;margin-top: 1%;width: 100%;padding-top: 2%;background-color: #0e1b77;padding-left: 5%; height: 245px;position:relative">
	<div style="clear:both;float:left; width: 26%;margin-top: 3%">
		<div style="clear:both;float:left; color:white; font-family: helvetica_neueregular;padding-top: 2%">
			<strong>Sonaray in Social Networks.</strong>
		</div>
		<div style="clear:both;float:left;margin-top: 1%; width: 40%;text-align: left !important">
			<a onMouseOver="cambiar(1,'IMG2');" onMouseOut="cambiar(0,'IMG2');" target="_blank" href="https://www.facebook.com/SonarayLED" style="margin: 1%"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/home/social/face.png" onload="preloadcambiar(this,'<?php echo Yii::app()->request->baseUrl; ?>/images/home/social/face_2.png');" name="IMG2" style="width: "/></a>
			<a onMouseOver="cambiar(1,'IMG1');" onMouseOut="cambiar(0,'IMG1');" target="_blank" href="https://twitter.com/sonarayledusa" style="margin: 1%"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/home/social/tw.png" onload="preloadcambiar(this,'<?php echo Yii::app()->request->baseUrl; ?>/images/home/social/tw_2.png');" name="IMG1" /></a>
			<a onMouseOver="cambiar(1,'IMG3');" onMouseOut="cambiar(0,'IMG3');" target="_blank" href="https://www.youtube.com" style="margin: 1%"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/home/social/yt.png" onload="preloadcambiar(this,'<?php echo Yii::app()->request->baseUrl; ?>/images/home/social/yt_2.png');" name="IMG3" /></a>
		</div>
	</div>
	<div style="width:36%;height:210px; float:left; color:white; font-family: helvetica_neueregular;">
		<img style="width: 100%" src="<?php echo Yii::app()->request->baseUrl; ?>/images/mapamundi.png" usemap="#MapMundi"/>
		<map name="MapMUndi">
		<area href="<?php echo Yii::app()->request->baseUrl . '/' . Yii::app()->language;?>/contact/index" title="contact" shape=circle coords="78,50,25" />
		</map>
	</div>
	<div style="width:26%;float:left; color:white; font-family: helvetica_neueregular;margin-top: 3%;margin-left: 9%">
		<div style="float:left;text-align:left;color:white; border-bottom: 1px solid grey">CONTACT US.</div>
		<a href="<?php echo Yii::app()->request->baseUrl . '/' . Yii::app()->language; ?>/contact/index"><div class="bordes" style="clear:both;float:left; color:white;text-align: left;background-color: rgba(89, 84, 126, 0.82);margin-top: 1%;padding: 2%">DASCOM AMERICAS<br/>34 Lakeview Court Verona, VA 24482<br/>USA Office 540-931-9002 / FAX 540-242-7221<br/>1819 SE 17 St., Unit CU2,Ft. Lauderdale, FL 33316<br/>Tel: +1 954 644 8710 / Fax:+1 954 767 225</div></a>
	</div>
</div>
<div class="footerInformation" style="clear:both;float:left;margin: 0; width: 100%; background-color: #0e1b77">
		<ul>
			<li>Partners</li>
			<li>Contact</li>
			<li>Career</li>
			<li>Privacy</li>
			<li class="lastChild">News</li>
		</ul>
</div>
<div style="clear:both;float:left;margin: 0; width: 100%; background-color: #0e1b77">
<span style="font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #CCCCCC;opacity: 0.8">&copy; 2012-2015 DASCOM Americas SBI LLC Todos los derechos reservados. Powered by</span>&nbsp;<a href="http://www.thefactoryhka.com/" target="_blank"><img src="http://www.dascomla.com/sonaray/images/thfka.png" width="14" height="11" />&nbsp;<span class="Estilo6">ThefactoryHKA C.A.</span></a>
</div>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
</body>
</html>