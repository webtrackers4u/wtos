


<div class="rLinks">
<?
$pagecontentLinksMap=$os->get_pagecontent("active=1 and parentPage<1 and onHead='1'  "," priority asc ",'',' seoId ,	externalLink, title  , pagecontentId , openNewTab');
 if($pagecontentLinksMap){
 
foreach($pagecontentLinksMap as $page)
				{
if($page['pagecontentId']>0){
$pageSeoLinkH=($subp['externalLink']=='')?$seoLink->l($page['seoId']):$pageSeoLink=$page['externalLink'];
$pPageId=$page['pagecontentId'];
  $subPageRight=$os->get_pagecontent(" active=1 and parentPage='".$pPageId."'","priority asc");
  }
  ?>

<? 	 
?>  <br /><h2><a style="font-size:18px; font-weight:bold;"  title="<? echo $page['title'] ?>"   <?php echo $_target ?> href="<? echo $pageSeoLinkH ?>"><? echo $page['title'] ?></a> </h2> <br /><? 
foreach($subPageRight as $subp){
 $pageSeoLink=($subp['externalLink']=='')?$seoLink->l($subp['seoId']):$pageSeoLink=$subp['externalLink'];
 $_target=($subp['openNewTab']<1)?'':'target="_blank"';
 ?> &nbsp; &nbsp;&nbsp;<a  title="<? echo $subp['title'] ?>"   <?php echo $_target ?> href="<? echo $pageSeoLink ?>"><? echo $subp['title'] ?></a> <br /> 
<?  }   } } ?>
</div>