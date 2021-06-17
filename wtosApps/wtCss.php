<? 
class wtStyle{

 function wtBox($cssName='',$ss='D+D+D+D+D+D',$extra='' )// $extra=' color:#FFFFFF;';
 {
      
	 $cssName =($cssName=="")?'wtBox'.rand(100,200):$cssName;
	 
     $wtss='#5a5a5a+7px+0px 0px 15px #7d7d7d+ 1px solid #7d7d7d+ relative+10';// default // $wtss='background+radius+shadow+ border+ position+z-index';
	 $o=explode('+',$wtss);
	 $sp=explode('+',$ss);
	 
	 $bg=explode(',',$sp['0']);$sp['0']=$bg[0];  ///   for general colore schemr  #be7014,#f99c3f
	
		 	
	$background= ( $sp['0']!='D')?$sp['0']:$o['0']; $background=($background!='')?" background:$background ;":'';
	$radius=( $sp['1']!='D')?$sp['1']:$o['1'];$radius=($radius!='')?" -moz-border-radius:$radius ;-webkit-border-radius:$radius; border-radius:$radius; ":'';
	$shadow=( $sp['2']!='D')?$sp['2']:$o['2'];$shadow=($shadow!='')?" -moz-box-shadow:$shadow ;-webkit-box-shadow:$shadow ;box-shadow:$shadow ;":'';
	$border=( $sp['3']!='D')?$sp['3']:$o['3'];$border=($border!='')?" border:$border ;":'';
	$position=( $sp['4']!='D')?$sp['4']:$o['4'];$position=($position!='')?" position:$position ;":'';
	$zindex=( $sp['5']!='D')?$sp['5']:$o['5'];$zindex=($zindex!='')?" z-index:$zindex ;":'';
	
	 
    ?>
.<? echo $cssName ?>{ <? echo $background ?><? echo $radius ?><? echo $shadow ?><? echo $border ?><? echo $position ?><? echo $zindex ?>behavior: url(ie-css3.htc);<? echo $extra ?>  }
	<?
	return $cssName;
}

 
 function wtBoxG($cssName='',$ss='D+D+D+D+D',$extra='' )// $extra=' color:#FFFFFF;';
 {
      
		$cssName =($cssName=="")?'wtBox'.rand(100,200):$cssName;
		
		$wtss='7px+90deg,#be7014,#f99c3f+2px 2px 2px rgba(0,0,0,.75)+1px solid #7d7d7d';// default 
	//	$wtss='radius+deg,from,to(dft)+ shadow+border';
		$o=explode('+',$wtss);
		$sp=explode('+',$ss);
				
		$dft=( $sp['1']!='D')?$sp['1']:$o['1'];$dft=($dft!='')?"$dft":'';
		if($dft!=''){ $dftI=explode(',',$dft); $background=$dftI[1];   $background="background:$background ; ";}
		
		
		
		
		$radius=( $sp['0']!='D')?$sp['0']:$o['0'];$radius=($radius!='')?" -moz-border-radius:$radius ;-webkit-border-radius:$radius; border-radius:$radius; ":'';
		$dft=( $sp['1']!='D')?$sp['1']:$o['1'];$dft=($dft!='')?" background-image:-moz-linear-gradient(0% 22px $dft);":'';
		if($dft!=''){ $dftI=explode(',',$dft); $dftF=$dftI[1]; $dftT=str_replace(array(';',')'),'',$dftI[2]);
		$dft.="background-image:-webkit-gradient(linear, 0% 0%, 0% 70%, from($dftF), to($dftT));  ";
		}
			
		$shadow=( $sp['2']!='D')?$sp['2']:$o['2'];$shadow=($shadow!='')?" -moz-box-shadow:$shadow ;-webkit-box-shadow:$shadow ;box-shadow:$shadow ;":'';
		$border=( $sp['3']!='D')?$sp['3']:$o['3'];$border=($border!='')?" border:$border ;":'';
		?>
		.<? echo $cssName ?>{<? echo $background ?> <? echo $radius ?><? echo $dft ?><? echo $shadow ?><? echo $border ?>behavior: url(ie-css3.htc);<? echo $extra ?>  }
		<?
		return $cssName;
	
}



 function wtDD($divName,$ss='+++++++',$extra='' )// $extra=' color:#FFFFFF;';
 {
     $divName =($divName=="")?'wtDIV'.rand(100,200):$divName;
	 $wtss='1px solid #222+#69BAFC+#69BAFC+1px solid #999+1px solid #222+#eee+#096297,#69BAFC+#69BAFC,#096297';// default 
	 //	$wtss='border+background+backgroundHover+seperatorBorderL+seperatorBorderR+color+gFrom,gTo+gFromH,gToH';
	 $o=explode('+',$wtss);
	 $sp=explode('+',$ss);
		$border=($sp[0]!='')?$sp['0']:$o['0'];
		$background=($sp[1]!='')?$sp['1']:$o['1'];
		$backgroundHover=($sp[2]!='')?$sp['2']:$o['2'];
		$seperatorBorderL=($sp[3]!='')?$sp['3']:$o['3'];
		$seperatorBorderR=($sp[4]!='')?$sp['4']:$o['4'];
		$color=($sp[4]!='')?$sp['5']:$o['5'];
		
		$gFT=($sp[6]!='')?$sp['6']:$o['6'];$gFTA=explode(',',$gFT);
		$gFrom=$gFTA[0];
		$gTo=$gFTA[1];
		
		
		
		$gFTH=($sp[7]!='')?$sp['7']:$o['7'];
		
		$gFTH="$gTo,$gFrom";
		$gFTHA=explode(',',$gFTH);
		$gFromH=$gFTH[0];
		$gToH=$gFTH[1];
		
	 
	 
	?>
	
<? echo $divName;?> { display:block; margin:0 auto 20px; border:<? echo $border ; ?>; position:relative; background-color:<? echo $background ; ?>; font:12px Tahoma, Sans-serif; }
<? echo $divName;?> ul { padding:0; margin:0; }
<? echo $divName;?> li { position:relative; float:left; list-style-type:none; }
<? echo $divName;?> ul:after { content:"."; display:block; height:0; clear:both; visibility:hidden; }
<? echo $divName;?> li a { display:block; padding:10px 20px; border-left:<? echo $seperatorBorderL ; ?>; border-right:<? echo $seperatorBorderR ; ?>; color:#eee; text-decoration:none; }
<? echo $divName;?> li a:focus { outline:none; text-decoration:underline; }
<? echo $divName;?> li:first-child a { border-left:none; }
<? echo $divName;?> li.last a { border-right:none; }
<? echo $divName;?> a span { display:block; float:right; margin-left:5px; }
<? echo $divName;?> ul ul { display:none; width:100%; position:absolute; left:0; background:<? echo $background ; ?>; }
<? echo $divName;?> ul ul li { float:none; }
<? echo $divName;?> ul ul a { padding:5px 10px; border-left:none; border-right:none; font-size:12px; }
<? echo $divName;?> ul ul a:hover { background-color:<? echo $backgroundHover ; ?>; }

.borderradius <? echo $divName;?> { -moz-border-radius:4px; -webkit-border-radius:4px; border-radius:4px; }
.cssgradients <? echo $divName;?> { background-image:-moz-linear-gradient(0% 22px 90deg, <? echo $gFT ; ?>); background-image:-webkit-gradient(linear, 0% 0%, 0% 70%, from( <? echo $gFrom ; ?>), to( <? echo $gTo ; ?>)); }
.boxshadow.rgba <? echo $divName;?> { -moz-box-shadow:2px 2px 2px rgba(0,0,0,.75); -webkit-box-shadow:2px 2px 2px rgba(0,0,0,.75); box-shadow:2px 2px 2px rgba(0,0,0,.75); }
.cssgradients <? echo $divName;?> li:hover { background-image:-moz-linear-gradient(0% 100px 90deg, <? echo $gFTH ; ?>); background-image:-webkit-gradient(linear, 0% 0%, 0% 100%, from(<? echo $gFromH ; ?>), to(<? echo $gToH ; ?>));}


.borderradius <? echo $divName;?> ul ul { -moz-border-radius-bottomleft:4px; -moz-border-radius-bottomright:4px; -webkit-border-bottom-left-radius:4px; -webkit-border-bottom-right-radius:4px; border-bottom-left-radius:4px; border-bottom-right-radius:4px; }
.boxshadow.rgba <? echo $divName;?> ul ul { background-color:rgba(9,98,151,0.8); -moz-box-shadow:2px 2px 2px rgba(0,0,0,.8); -webkit-box-shadow:2px 2px 2px rgba(0,0,0,.8); box-shadow:2px 2px 2px rgba(0,0,0,.8); }
.rgba <? echo $divName;?> ul ul li { border-left:1px solid rgba(0,0,0,0.1); border-right:1px solid rgba(0,0,0,0.1); }
.rgba <? echo $divName;?> ul ul a:hover { background-color:rgba(212,27,16,.9);  }
.borderradius.rgba <? echo $divName;?> ul ul li.last { border-left:1px solid rgba(0,0,0,0.1); border-bottom:1px solid rgba(0,0,0,0.1); -moz-border-radius-bottomleft:4px; -moz-border-radius-bottomright:4px; -webkit-border-bottom-left-radius:4px; -webkit-border-bottom-right-radius:4px; border-bottom-left-radius:4px; border-bottom-right-radius:4px; }
.csstransforms ul a span { -moz-transform:rotate(-180deg);-webkit-transform:rotate(-180deg); }
<? echo $extra ?> 
<?
	
}












function wtTheme($colorScheme='lightblue')
		 {
		   
			$theme['lightblue']['c']='#007FFF, #FFFFFF';
			
			
			$theme['deepblue']['c']='#084C9E, #FFFFFF';
			
			$theme['green']['c']='#228B22, #228B22';
				$theme['green']['imgs']=array('headerBgImg'=>'h2.png','headerButtonsImgB1'=>'bt1.png','headerButtonsImgB2'=>'b2.png');
			
			$theme['golden']['c']='#FFD700, #FFFFFF';
			    $theme['golden']['imgs']=array('headerBgImg'=>'h1.png','headerButtonsImgB1'=>'bt1.png','headerButtonsImgB2'=>'b2.png');
			
			$theme['goldenDeep']['c']='#DAA520, #FFFFFF';
			$theme['Coral']['c']='#FF7F50, #FFFFFF';
			$theme['Maroon']['c']='#800000, #FFFFFF';
			$theme['Maroon']['imgs']=array('headerBgImg'=>'h3.png','headerButtonsImgB1'=>'bt1.png','headerButtonsImgB2'=>'b2.png');
			$theme['Crimson']['c']='#DC143C, #FFFFFF';
			$theme['Silver']['c']='#C0C0C0, #FFFFFF';
			$theme['white']['c']='#C2CCD1, #EDF2F3';
		   
		   
		   
		   $theme['red']['c']='#FF0000, #FFFFFF';
		   $theme['grey']['c']='#0382E9, #FFFFFF';
		   $theme['purewhite']['c']='#FFFFFF, #FFFFFF';
		   $theme['sexyGrey']['c']='#213240, #FFFFFF';
		   $theme['orange-yellow']['c']='#be7014, #be7014';
		   $theme['water']['c']='#ffffff, #E0EBF3';
		  
		   $theme['violet']['c']='#CB72CB, #FEFAFE';
		   $theme['violet']['imgs']=array('headerBgImg'=>'h54.png','headerButtonsImgB1'=>'bt1.png','headerButtonsImgB2'=>'b2.png');
		   
		   
		   $theme['blue']['c']='#096297, #69BAFC';
		   $theme['blue']['imgs']=array('headerBgImg'=>'h4.png','headerButtonsImgB1'=>'b1.png',
		   														'headerButtonsImgB2'=>'b2.png',
																'headerButtonsImgB3'=>'b3.png',
																'headerButtonsImgB4'=>'b4.png'
																
																);
		   
		   
		   
		   $this->theme=$theme;
		   
		   if($theme[$colorScheme]!='')
		    {
			  return $theme[$colorScheme];
			} 
		
		
		}
		
		
		
?>
 
<? // $roundC=$wtstyle->wtBox('profilenotexist',"#FF0000+7px+0px 0px 10px #7d7d7d+ 1px solid #FF0000+ relative+10"); ?>  
