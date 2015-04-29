﻿﻿<?php
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
<title>SONARAY</title>
<link rel="shortcut icon" href="images/favicon.ico" />
<link rel="icon" type="image/png" href="images/favicon.ico" />
<link rel="icon" type="image/vnd.microsoft.icon"
	href="images/favicon.ico" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" />
<META NAME="AUTHOR" CONTENT="Guillermo Enrique,Daniel Ruiz">
<META NAME="REPLY-TO"
	CONTENT="gsanchez1687@gmail.com, Daruizg@gmail.com">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta
	content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"
	name="viewport">
<meta name="language" content="en" />
<!--[if lt IE 8]>
                        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
<![endif]-->
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
<!--<link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />-->
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl; ?>/js/dropdownHover.js"></script>
<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl; ?>/js/css3-mediaquery.js"></script>
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
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
</script>
</noscript>
<div
	style="clear: both; float: left; position: relative; width: 100%; height: 66px">
	<div class="menu" style="background: #CCCCCC;">
		<table width="100%" height="100%" border="0">
			<tr>
				<td valign="middle">
					<div class="container">
						<nav role="navigation" class="navbar navbar-inverse">
							<div class="navbar-header">
								<button type="button" data-target="#navbarCollapse"
									data-toggle="collapse" class="navbar-toggle">
									<span class="sr-only">Toggle navigation</span> <span
										class="icon-bar"></span> <span class="icon-bar"></span> <span
										class="icon-bar"></span>
								</button>
								<a href="#" class="navbar-brand"
									style="font-family: Arial, Helvetica, sans-serif; font-size: 1px;">
									<img
									src="<?php echo Yii::app()->request->baseUrl; ?>/images/sonaray_small.png" />
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
	<li style="font-weight: bold;"><?php echo CHtml::link($menu['name'], array($menu['url']), array('role' => "menuitem")); ?></li>
	<?php
					$contador++ ;
				}
				else
				{
					?> 
	<li style="font-weight: bold;"><?php echo CHtml::link($menu['name'], array($menu['url']), array('role' => "menuitem")); ?></li>
	<?php  } ?> 
	<?php } else { ?>
	<li class="dropdown" style="color: #000000; font-weight: bold;"><a
										style="font-size: 15px;" href="#" class="dropdown-toggle"
										data-toggle="dropdown" data-hover="dropdown"><?php echo $menu['name'] ?> <b
											class="caret"></b> </a>
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
											<li style="font-size: 15px;" class=""><a
												href="<?php echo Yii::app()->request->baseUrl . '/' . Yii::app()->language . '/' . $menu2['url']; ?>"><?php echo $menu2['name'];?></a></li>
	<?php
					}
					else
					{
						?>
	<li class="dropdown"><a href="#"><?php echo $menu2['name']; ?></a></li>
	<?php
					}
				} // foreach
				?>
	</ul></li>
	 <?php }}} ?>
	 </ul>
							</div>
						</nav>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>
<?php  echo $content; ?>
<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
<script>
$('.carousel').carousel({
 interval: 4500
})
$('.carousel').mouseover(function() {
$(this).carousel('pause');
 }).mouseleave(function() {
// $(this).carousel('cycle')
});
$('.dropdown-toggle').dropdown();
$(function() {
$("#impressum").click(function() {
$("#Impressumdialog").dialog("open");
})
})
</script>
<table width="200" border="0">
	<tr>
		<td height="76"></td>
	</tr>
</table>
<table width="100%" border='0'>
	<tr>
		<td bgcolor="#0e1b77"><br /> <br /> <br /> <br /> <span
			style="font-family: Impact; font-size: 36px; color: #FFFFFF;">Newsletter</span><br />
			<br /> <a onMouseOver="cambiar(1,'IMG2');"
			onMouseOut="cambiar(0,'IMG2');" target="_blank"
			href="http://www.facebook.com/"> <img border="0"
				src="<?php echo Yii::app()->request->baseUrl; ?>/images/home/social/face.png"
				onload="preloadcambiar(this,'<?php echo Yii::app()->request->baseUrl; ?>/images/home/social/face_2.png');"
				name="IMG2" /></a> <a onMouseOver="cambiar(1,'IMG1');"
			onMouseOut="cambiar(0,'IMG1');" target="_blank"
			href="http://twitter.com/"> <img border="0"
				src="<?php echo Yii::app()->request->baseUrl; ?>/images/home/social/tw.png"
				onload="preloadcambiar(this,'<?php echo Yii::app()->request->baseUrl; ?>/images/home/social/tw_2.png');"
				name="IMG1" /></a> <a onMouseOver="cambiar(1,'IMG3');"
			onMouseOut="cambiar(0,'IMG3');" target="_blank"
			href="http://www.youtube.com/"> <img border="0"
				src="<?php echo Yii::app()->request->baseUrl; ?>/images/home/social/yt.png"
				onload="preloadcambiar(this,'<?php echo Yii::app()->request->baseUrl; ?>/images/home/social/yt_2.png');"
				name="IMG3" /></a> <a onMouseOver="cambiar(1,'IMG4');"
			onMouseOut="cambiar(0,'IMG4');" target="_blank"
			href="http://instagram.com/"> <img border="0"
				src="<?php echo Yii::app()->request->baseUrl; ?>/images/home/social/in.png"
				onload="preloadcambiar(this,'<?php echo Yii::app()->request->baseUrl; ?>/images/home/social/in_2.png');"
				name="IMG4" /></a><br /> <br /> <input name="" type="text"
			placeholder="Email" size="40" height="6px" /><br /> <br /> <input
			type="submit" name="Submit" value="sign up" /> <br /> <br /> <br />
			<div align="center" style="color: #ffffff;">Sonarayled © 2014 |
				Privacy Policy</div> &nbsp;</td>
	</tr>
</table>


</body>
</html>

