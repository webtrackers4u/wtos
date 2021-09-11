<?

/**

 * Wtos Framework

 *@author mizanur82@gmail.com

 * @package    paging 

 */



class paging{



var $showPerPage=50;

var $showPages=105;

    function   __construct($showPerPage=50)

	{

	    if($showPerPage>0)

	    {

	     $this->showPerPage=$showPerPage;

	      }

		  return $this;

	

	}



   function page($total,$showPerPage='')

	{

	

	 if($showPerPage<1)

	 {

	     $showPerPage=$this->showPerPage;

	 }

	

	    $pageCount=1;

		if($total>0)

		{

		 $pageCount=ceil($total/$showPerPage);

		}

		

		return $pageCount;

	

	

	}

	function pageLink($total,$showPerPage='',$seoUrl=false,$ajax=false)

	{

	    $res['links']='';

		$res['pageNo']=1;

		$res['limit']='';

		

		$linkChar='';

		if($showPerPage<1)

		{

		   $showPerPage=$this->showPerPage;

		}

		$res['showPerPage']=$showPerPage;

		if($showPerPage<1)

		{

		   $showPerPage=$this->showPerPage;

		}

		

		

		$pageId='wtpage';

	    $pageNo=0; 

		$link='';

		$selectedLink='';

		$linkUrl='';

		$totalPage=0;

		$prev='Prev';

		$next='Next';

		$totalPage=$this->page($total,$showPerPage);

		$loopstart=1;

		$loopend=$totalPage;

		$showPages=ceil($this->showPages/2);

		

		$link=$_SERVER["REQUEST_URI"];

		

		$linkMatch=preg_match("/".$pageId."=[0-9]*/",$link,$match);

		if(isset($match[0]))

		{

		 

		 $pageNo=(int)str_replace($pageId.'=','',$match[0]);

		 

		}

		if($pageNo<1)

		{

		$pageNo=1;

		}

	 		 

		

		

	 

		 if($seoUrl)

		 {		 

		 $link=preg_replace("/\/".$pageId."=[0-9]*/","",$link);

		 		 

		 }else

		 {

		

		  $link=preg_replace("/&".$pageId."=[0-9]*/","",$link);

		 

		 }

		 

		 if(substr($link, -4)=='.php')

		{

		  $link=$link;  // backendLink

		

		}

		 

		 if(substr($link, -1)=='/')

		 {

		  $link=substr($link, 0, -1); 

		   $link=$link.'/home';  // default link at root 666

		 }

		 

		 

		  if(!$seoUrl)

		  {

		 

			  if(substr($link, -4, -1)=='.ph')

			 {

			  $link= $link.'?';

			 }

		 

		  

		  }

		  

		  

		  

		  if($totalPage>1)

		  {

		    $linkUrl='';$linkChar=='';

		    $linkChar=($seoUrl)? '/':'&';

			$res=array();

			ob_start();

			

			if($pageNo>1){	

			$prevPage=$pageNo-1;

			

			  $finalLink=' href="'.$link.$linkChar.$pageId."=".$prevPage.'" ';

			  

			 

			  if($ajax)

			  {

			  $finalLink=' href="javascript:void(0)"  onclick="wtAjaxPagination(\''.$pageId.'\',\''.$prevPage.'\')"       ';

			  }

			

			?><a <? echo  $finalLink ?>><?php echo $prev ?></a><?php

			}else

			{

			?><a   href="javascript:void(0)"  style="color:#CCCCCC; cursor:auto;"><?php echo $prev ?></a><?php

			}

			

			# show pages ----

			if($this->showPages>0)

			{

			   $loopstart=$pageNo-$showPages;

			    $loopend=$pageNo+$showPages;

			}

			

			$loopstart=($loopstart<1)?1:$loopstart;

			$loopend=($loopend>$totalPage)?$totalPage:$loopend;

			

			#show pages 

			

			

			

			

		    for($i=$loopstart;$i<=$loopend ;$i++)

			{

			$selectedLink='';

			  

			$linkUrl=$link.$linkChar.$pageId."=$i";

			 			

			$selectedLink=($pageNo==$i)?'class="selected"':'';

			 	

				

			 $finalLink=' href="'.$link.$linkChar.$pageId."=".$i.'" ';

			  if($ajax)

			  {

			  $finalLink=' href="javascript:void(0)"  onclick="wtAjaxPagination(\''.$pageId.'\',\''.$i.'\')"       ';

			  }	

				

			?>

			<a <?php echo $selectedLink; ?> <? echo  $finalLink ?> ><?php echo $i ?></a>

			

			<?php 

			

			}

			 

			if($pageNo<$totalPage){	

			$nextPage=$pageNo+1;

			

			$finalLink=' href="'.$link.$linkChar.$pageId."=".$nextPage.'" ';

			  if($ajax)

			  {

			  $finalLink=' href="javascript:void(0)"  onclick="wtAjaxPagination(\''.$pageId.'\',\''.$nextPage.'\')"       ';

			  }	

			?><a  <? echo  $finalLink ?>><?php echo $next ?></a><?php

			}

			else

			{

			?><a   href="javascript:void(0)" style="color:#CCCCCC; cursor:auto;"><?php echo $next ?></a><?php

			}

			

			$res['links']=ob_get_clean();

			$res['showPerPage']=$showPerPage;

			$res['pageNo']=$pageNo;

			  $limit=($pageNo-1)*$showPerPage;

			$res['limit']="$limit , $showPerPage";

		    $res['serial']=$limit;

		    return $res;

		 

		  

		  }

	  return $res;

	}

	

	function pageLink__notused($total,$showPerPage='',$seoUrl=false,$ajax=false)

	{

	    

		$res['links']='';

		$res['pageNo']=1;

		$res['limit']='';

		

		$linkChar='';

		if($showPerPage<1)

		{

		   $showPerPage=$this->showPerPage;

		}

		$res['showPerPage']=$showPerPage;

		

		$pageId='wtpage';

	    $pageNo=0; 

		$link='';

		$selectedLink='';

		$linkUrl='';

		$totalPage=0;

		$prev='Prev';

		$next='Next';

		$totalPage=$this->page($total,$showPerPage);

		$loopstart=1;

		$loopend=$totalPage;

		$showPages=ceil($this->showPages/2);

		

		 $link=$_SERVER["REQUEST_URI"];

		

		$linkMatch=preg_match("/".$pageId."=[0-9]*/",$link,$match);

	 

		if(isset($match[0]))

		{

		 

		 $pageNo=(int)str_replace($pageId.'=','',$match[0]);

		 

		}

		if($pageNo<1)

		{

		$pageNo=1;

		}

	 		 

		

		

	 

		 if($seoUrl)

		 {		 

		 $link=preg_replace("/\/".$pageId."=[0-9]*/","",$link);

		 		 

		 }else

		 {

		

		  $link=preg_replace("/&".$pageId."=[0-9]*/","",$link);

		 

		 }

		 

		 

		 

		if(substr($link, -4)=='.php')

		{

		  $link=$link;  // backendLink

		

		}

		 

		else if(substr($link, -1)=='/')

		 {

		   $link=substr($link, 0, -1); 

		   $link=$link.'/home';  // default link at root 666

		 }

		 

		 

		 

		 

		 

		  if(!$seoUrl)

		  {

		 

			  if(substr($link, -4, -1)=='.ph')

			 {

			  $link= $link.'?';

			 }

		 

		  

		  }

		  

		  

		  

		  if($totalPage>1)

		  {

		    

		 

		    $linkUrl='';$linkChar=='';

		    $linkChar=($seoUrl)? '/':'&';

			$res=array();

			ob_start();

			

			if($pageNo>1){	

			$prevPage=$pageNo-1;

			?><a   href="<?php echo $link.$linkChar.$pageId."=$prevPage"; ?>"><?php echo $prev ?></a><?php

			}else

			{

			?><a   href="javascript:void(0)" style="color:#CCCCCC; cursor:auto;"><?php echo $prev ?></a><?php

			}

			

			# show pages ----

			if($this->showPages>0)

			{

			   $loopstart=$pageNo-$showPages;

			    $loopend=$pageNo+$showPages;

			}

			

			$loopstart=($loopstart<1)?1:$loopstart;

			$loopend=($loopend>$totalPage)?$totalPage:$loopend;

			

			#show pages 

			

			

			

			

		    for($i=$loopstart;$i<=$loopend ;$i++)

			{

			$selectedLink='';

			  

			$linkUrl=$link.$linkChar.$pageId."=$i";

			 			

			$selectedLink=($pageNo==$i)?'class="selected"':'';

			 	

			?>

			<a <?php echo $selectedLink; ?>  href="<?php echo $linkUrl ?>"><?php echo $i ?></a>

			

			<?php 

			

			}

			 

			if($pageNo<$totalPage){	

			$nextPage=$pageNo+1;

			?><a   href="<?php echo $link.$linkChar.$pageId."=$nextPage"; ?>"><?php echo $next ?></a><?php

			}

			else

			{

			?><a   href="javascript:void(0)" style="color:#CCCCCC; cursor:auto;"><?php echo $next ?></a><?php

			}

			

			$res['links']=ob_get_clean();

			$res['showPerPage']=$showPerPage;

			$res['pageNo']=$pageNo;

			  $limit=($pageNo-1)*$showPerPage;

			$res['limit']="$limit , $showPerPage";

		    return $res;

		 

		  

		  }

		   return $res;

	

	}

	

	function pagingQuery_notused($query,$showPerPage='',$seoUrl=true) 

	{

	   

	    /*if($showPerPage<1)

		{

		   $showPerPage=$this->showPerPage;

		}

		$p=$this->mq('select count(*) t '. stristr($query, 'from'));

		$rs=$this->mfa($p);

		$res=$this->pageLink($rs['t'],$showPerPage,$seoUrl);

		$p=$this->mq($query." Limit  ".$res['limit']);

		$res['resource']=$p;

		return $res;

		 */

	

	

	}



}



	



?>