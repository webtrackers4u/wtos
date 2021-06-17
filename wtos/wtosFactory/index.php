<? 
if(isset($_POST['codeCheck']))
{
  if($_POST['codeCheck']=='ok'){
  
   if($_POST['code']=='OK')
   {
    header('location:wtosFactoryForm.php');
   
  
  }
  
  }

}


?>


<div style="padding:200px 0px 0px 300px; font-family:'Courier New', Courier, monospace;">
<form action="" method="post">
Enter Code <input type="text" name="code" /><input type="submit" value="OK" />
<input type="hidden" name="codeCheck" value="ok" />
</form>

</div>