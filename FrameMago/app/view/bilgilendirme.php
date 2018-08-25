<h2>Burası Bilgilendirme Sayfasıdır</h2>

<p>Aşağıda Sayfanın Parametreleri Vardır </p>


<div style="background:red"><h4>
<h4>Parametreler</h4>

<?php


foreach($_url as $yazdır)
{
	echo $yazdır."<br>";
}


?>

<form action="" method="post">

<button value="1" name="submit3">asdasd</button>


<?php

if(ifsession('firat2'))
{
	echo "Burdasın";
	
}

?>
</form>
</div>

