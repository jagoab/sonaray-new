<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/newcss.css" />

<style>
/*html, body, .banner, .container {
height:100%;
text-align: center;
}
.block {
height:300px;
background: #ffffff;
margin-bottom: 20px;
}*/
/* jssor slider arrow navigator skin 21 css */
/*
.jssora21l              (normal)
.jssora21r              (normal)
.jssora21l:hover        (normal mouseover)
.jssora21r:hover        (normal mouseover)
.jssora21ldn            (mousedown)
.jssora21rdn            (mousedown)
*/
.jssora21l, .jssora21r, .jssora21ldn, .jssora21rdn {
	position: absolute;
	cursor: pointer;
	display: block;
	background: url(<?php echo Yii :: app()->request->baseUrl; ?>/images/home/a21.png) center center no-repeat;
	overflow: hidden;
}

.jssora21l {
	background-position: -3px -33px;
}

.jssora21r {
	background-position: -63px -33px;
}

.jssora21l:hover {
	background-position: -123px -33px;
}

.jssora21r:hover {
	background-position: -183px -33px;
}

.jssora21ldn {
	background-position: -243px -33px;
}

.jssora21rdn {
	background-position: -303px -33px;
}
</style>
<!-- it works the same with all jquery version from 1.x to 2.x -->
<style>
/* jssor slider bullet navigator skin 21 css */
/*
.jssorb21 div           (normal)
.jssorb21 div:hover     (normal mouseover)
.jssorb21 .av           (active)
.jssorb21 .av:hover     (active mouseover)
.jssorb21 .dn           (mousedown)
*/
.jssorb21 div, .jssorb21 div:hover, .jssorb21 .av {
	background: url(<?php echo Yii :: app()->request->baseUrl; ?>/images/home/b21.png) no-repeat;
	overflow: hidden;
	cursor: pointer;
}

.jssorb21 div {
	background-position: -5px -5px;
}

.jssorb21 div:hover, .jssorb21 .av:hover {
	background-position: -35px -5px;
}

.jssorb21 .av {
	background-position: -65px -5px;
}

.jssorb21 .dn, .jssorb21 .dn:hover {
	background-position: -95px -5px;
}
</style>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.1.min.js"></script>
<!-- use jssor.slider.mini.js (40KB) instead for release -->
<!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jssor.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jssor.slider.js"></script>
<script>
jQuery(document).ready(function ($) {
		var _CaptionTransitions = [];
		_CaptionTransitions["L"] = { $Duration: 900, x: 0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
		_CaptionTransitions["R"] = { $Duration: 900, x: -0.6, $Easing: { $Left: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
		_CaptionTransitions["T"] = { $Duration: 900, y: 0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
		_CaptionTransitions["B"] = { $Duration: 900, y: -0.6, $Easing: { $Top: $JssorEasing$.$EaseInOutSine }, $Opacity: 2 };
		_CaptionTransitions["ZMF|10"] = { $Duration: 900, $Zoom: 11, $Easing: { $Zoom: $JssorEasing$.$EaseOutQuad, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 };
		_CaptionTransitions["RTT|10"] = { $Duration: 900, $Zoom: 11, $Rotate: 1, $Easing: { $Zoom: $JssorEasing$.$EaseOutQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo }, $Opacity: 2, $Round: { $Rotate: 0.8} };
		_CaptionTransitions["RTT|2"] = { $Duration: 900, $Zoom: 3, $Rotate: 1, $Easing: { $Zoom: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad }, $Opacity: 2, $Round: { $Rotate: 0.5} };
		_CaptionTransitions["RTTL|BR"] = { $Duration: 900, x: -0.6, y: -0.6, $Zoom: 11, $Rotate: 1, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic }, $Opacity: 2, $Round: { $Rotate: 0.8} };
		_CaptionTransitions["CLIP|LR"] = { $Duration: 900, $Clip: 15, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic }, $Opacity: 2 };
		_CaptionTransitions["MCLIP|L"] = { $Duration: 900, $Clip: 1, $Move: true, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic} };
		_CaptionTransitions["MCLIP|R"] = { $Duration: 900, $Clip: 2, $Move: true, $Easing: { $Clip: $JssorEasing$.$EaseInOutCubic} };
		var options = {
		$FillMode: 2,                                       //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
		$AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
		$AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
		$PauseOnHover: 4,                                   //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1
		$ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
		$SlideEasing: $JssorEasing$.$EaseOutQuint,          //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
		$SlideDuration: 800,                               //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
		$MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
		 //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
		 //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
		$SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
		$DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
		$ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
		$UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
		$PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
		$DragOrientation: 1,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
		$CaptionSliderOptions: {                            //[Optional] Options which specifies how to animate caption
		$Class: $JssorCaptionSlider$,                   //[Required] Class to create instance to animate caption
		$CaptionTransitions: _CaptionTransitions,       //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
		 $PlayInMode: 1,                                 //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
		$PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
		},
		 $BulletNavigatorOptions: {                          //[Optional] Options to specify and enable navigator or not
		$Class: $JssorBulletNavigator$,                 //[Required] Class to create navigator instance
		$ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
		$AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
		$Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
		$Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
		$SpacingX: 8,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
		$SpacingY: 8,                                   //[Optional] Vertical space between each item in pixel, default value is 0
		$Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
		},
		$ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
		$Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
		$ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
		 $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
		$Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
		}
};
var jssor_slider1 = new $JssorSlider$("slider1_container", options);
//responsive code begin
//you can remove responsive code if you don't want the slider scales while window resizes
function ScaleSlider() {
	var bodyWidth = document.body.clientWidth;
	if (bodyWidth)
		jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
	else
		window.setTimeout(ScaleSlider, 30);
}
ScaleSlider();
$(window).bind("load", ScaleSlider);
$(window).bind("resize", ScaleSlider);
$(window).bind("orientationchange", ScaleSlider);
//responsive code end
$("#divFlotante").fadeIn();
});
</script>
<!-- You can move inline styles to css file or css block. -->
<div id="slider1_container" style="clear:both;float:left; position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
	<!-- Loading Screen -->
	<div u="loading" style="position: absolute; top: 0px; left: 0px;">
		<div style="filter: alpha(opacity = 70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
		<div style="position: absolute; display: block; background: url(http://www.dascomla.com/sonaray/images/285.GIF) no-repeat center center; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
	</div>
<!-- Slides Container -->
<?php
$j = 1;
$i = 0;
$cantidad = count($imagenesSlider);
$contuer = 1;
?>
	<div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1300px; height: 500px; overflow: hidden;">  
		<?php
		foreach ($imagenesSlider as $banner)
		{
			?>
			<div>
				<img style="top: 0px !important" u="image" src2="<?php echo Yii::app()->request->baseUrl.$banner->ruta;?>" />
			</div>
		<?php
		}
		?>
	</div>
		<!-- Bullet Navigator Skin Begin -->
		<!-- bullet navigator container -->
	<div u="navigator" class="jssorb21" style="position: absolute; bottom: 26px; left: 6px;">
		<!-- bullet navigator item prototype -->
		<div u="prototype" style="POSITION: absolute; WIDTH: 19px; HEIGHT: 19px; text-align: center; line-height: 19px; color: White; font-size: 12px;"></div>
	</div>
	<!-- Bullet Navigator Skin End -->
	<!-- Arrow Navigator Skin Begin -->
	<!-- Arrow Left -->
	<span u="arrowleft" class="jssora21l" style="width: 55px; height: 55px; top: 123px; left: 8px;"> </span>
	<!-- Arrow Right -->
	<span u="arrowright" class="jssora21r" style="width: 55px; height: 55px; top: 123px; right: 8px"> </span>
	<!-- Arrow Navigator Skin End -->
</div>
<!-- Jssor Slider End -->
<div style="clear: both; float: left; padding-left: 0% !important; margin-top: 5%; font-family: helvetica_neueregular !important; width: 100%">
	<div class="container" style="clear: both:float:left; color: #616264 !important;">
		<!-- BLOQUE ABOUT US -->
		<div class="row" style="width: 100%; margin-bottom: 4%" id = "<?php echo str_replace(' ', '', strtolower($menus[26]['name']));?>">
			<div class="col-md-6" style="width: 100%">
				<div class="block" data-move-x="-600px">
					<h1><?php Yii::app()->language != 'es' ? print 'Lighting Everyone´s Dreams.' : print 'Iluminando los sueños de todos' ;?></h1>
				</div>
				<div class="block" data-move-x="600px">
					<h2><?php Yii::app()->language != 'es' ? print 'At SONARAY® our mission is to provide the absolute best in energy efficient lighting.' : print 'En Sonaray queremos que estés bien, vivir bien y disfrutar de la vida. Al entender sus aspiraciones y necesidades te conviertes en lo que nos inspira.' ;?></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6" >
				<div class="block" data-move-x="-600px" style="height: 315px">
					<strong>
						<h1 style="color: #003399; text-align: left;"><?php echo ucfirst(strtolower($menus[26]['name'])) ;?></h1>
					</strong>
					<p style="font-size: 14px; text-align: justify;">
						<?php echo substr($textoAbout[0]->text, 0, 940);?>
					</p>
				<p style="font-size: 28x;" align='right'>
						<a href="<?php echo Yii::app()->request->baseUrl . '/' . Yii::app()->language . '/about/index'; ?>"><?php Yii::app()->language == 'es' ? print "VER MAS" : print "Read more";?></a>
					</p>
				</div>
			</div>
			<div class="col-md-6">
				<div class="block" data-move-x="600px">
					<iframe width="560" height="300"
						src="//www.youtube.com/embed/eSjuBM268Yo" frameborder="0"
						allowfullscreen></iframe>
				</div>
			</div>
		</div>
		<!-- ------------------------------------------------------ -->
		<div class="row" style="margin-top: 5%;margin-bottom: 3%" id = "<?php echo str_replace(' ', '', strtolower($menus[1]['name']));?>">
		<?php $cuenta = 1;?>
		<?php foreach ($featured_product as $productoDestacado)
		{
		?>
			<div class="col-md-3" style="width: 33% !important">
				<div style="width: 100%" class="block" data-rotate-y="180deg" data-move-z="-200px" data-move-x="-300px">
					<div style="width: 100%; background-color: #003399;color:white"><?php echo $productoDestacado['productName'];?></div>
					<div style="width: 100%;clear:both;float:left;text-align: left;position:relative">
					<div style="position:absolute;top: 4px; left: 3px; width: 25%"><img src="<?php echo Yii::app()->request->baseUrl?>/images/<?php $cuenta == 1 ? print 'new.png' : ($cuenta == 2 ? print 'bestSeller.png' : ($cuenta == 3 ? print 'outstanding.png' : ''));?>" style="width: 100%"/></div>
						<img style="width:100%; border: solid 1px grey" src="<?php echo Yii::app()->request->baseUrl . $productoDestacado['path']; ?>" alt="a cute kitten">
					</div>
					<div style="clear:both;float:left;height: 75px">
						<p align="justify" style="color: #666666;"><?php echo substr(strip_tags($productoDestacado['text']), 0, 140) . ' ...'; ?></p>
					</div>
					<div style="width: 100%;clear:both;float:left;text-align: left;">
						<a href="<?php echo Yii::app()->request->baseUrl . '/' . Yii::app()->language . '/products/index?idclick=' . $productoDestacado['id'] . '&id_cat=' . $productoDestacado['categoria']; ?>"><?php Yii::app()->language == 'es' ? print "VER MAS" : print "Read more";?></a>
					</div>
				</div>
			</div>
<?php $cuenta++; if($cuenta > 3) break; }?>
		</div>
                <h1 style="color: #003399; margin-top: 10%" class="block"><?php Yii::app()->language != 'es' ? print 'News' : print 'Noticias' ;?></h1>
                <div class="row">
                <?php $cuenta = 1;
                foreach($News as $news) { ?>
              <div class="col-md-3" style="width: 33% !important">
				<div class="block" data-rotate-x="90deg" data-move-z="-500px" data-move-y="200px">
					<center>
                                                <br/>
                                                 <p style="font-size: 18px; text-align: justify;">
                                                 <a href="<?php echo Yii::app()->request->baseUrl; ?>/news/cases?id=<?php echo $news['id']; ?>" > <?php  echo $news['date_publication'];?></a>

                                                 </p>
                                                <p style="font-size: 14px; text-align: justify;">
                                                <?php echo $news['description'];?>
                                                </p>
                                                  <p style="font-size: 24px; text-align: justify;">
                                               <a href="<?php echo Yii::app()->request->baseUrl; ?>/news/cases?id=<?php echo $news['id']; ?>" >
                                                +</a>
                                                </p>
                                               
                                        </center>
				</div>
			</div>
                <?php $cuenta++; if($cuenta > 3) break; } ?>
                </div>
		<h1 id = "<?php echo str_replace(' ', '', strtolower($menus[22]['name']));?>" style="color: #003399;margin-top: 4%" class="block">
			<?php Yii::app()->language != 'es' ? print 'Case Studies' : print 'Caso de estudios' ;?>
		</h1>
		<div class="row">
		<?php foreach($caseStudies as $case)
		{
		?>
		<?php if ($contuer < 4) {?>
		<div class="col-md-4">
				<div class="block" data-rotate-x="90deg" data-move-z="-500px"
					data-move-y="200px">
					<center>
                                               
						<a target="_blank" download="<?php $case['subPath']?>" href="<?php echo Yii::app()->request->baseUrl . $case['subPath']; ?>"><img src="<?php echo Yii::app()->request->baseUrl . $case['path']; ?>" class="img-responsive" /></a>
                                                 <br/>
                                                 <p style="font-size: 14px; text-align: justify;">
                                                 <?php echo $case['title'];?>
                                                 </p>
                                                   <br/>
                                                   
                                                <p style="font-size: 14px; text-align: justify;">
                                                <?php Yii::app()->language != 'es' ? print 'LOCATION:' : print 'UBICACION:' ;?>
                                               <?php echo $case['country'];?>
                                                </p>
                                                <a target="_blank" download="<?php $case['subPath']?>" href="<?php echo Yii::app()->request->baseUrl . $case['subPath']; ?>">
                                                <p style="font-size: 14px; text-align: justify;">
                                                  <?php Yii::app()->language != 'es' ? print 'DOWNLOAD' : print 'DESCARGAR' ;?>
                                                </p>
                                                </a>
                                        </center>
					<p align="justify" style="font-size: 14px; color: #666666;"></p>
				</div>
			</div>
                <?php $contuer++; }?>
		<?php }?>
		</div>
	</div>
</div>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.smoove.js"></script>
<script>$('.block').smoove({offset:'5%'});</script>
