


<div class="rLinks">
<?php
$pagecontentLinksMap=$os->get_pagecontent("active=1 and parentPage<1 and onHead='1'  ", " priority asc ", '', ' seoId ,	externalLink, title  , pagecontentId , openNewTab');
if($pagecontentLinksMap) {

    foreach($pagecontentLinksMap as $page) {
        if($page['pagecontentId']>0) {
            $pageSeoLinkH=($subp['externalLink']=='') ? $seoLink->l($page['seoId']) : $pageSeoLink=$page['externalLink'];
            $pPageId=$page['pagecontentId'];
            $subPageRight=$os->get_pagecontent(" active=1 and parentPage='".$pPageId."'", "priority asc");
        }
        ?>

<?php
        ?>  <br /><h2><a style="font-size:18px; font-weight:bold;"  title="<?php echo $page['title'] ?>"   <?php echo $_target ?> href="<?php echo $pageSeoLinkH ?>"><?php echo $page['title'] ?></a> </h2> <br /><?php
foreach($subPageRight as $subp) {
    $pageSeoLink=($subp['externalLink']=='') ? $seoLink->l($subp['seoId']) : $pageSeoLink=$subp['externalLink'];
    $_target=($subp['openNewTab']<1) ? '' : 'target="_blank"';
    ?> &nbsp; &nbsp;&nbsp;<a  title="<?php echo $subp['title'] ?>"   <?php echo $_target ?> href="<?php echo $pageSeoLink ?>"><?php echo $subp['title'] ?></a> <br /> 
<?php  }
    }
} ?>
</div>