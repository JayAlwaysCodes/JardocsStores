<?php

//$con = mysqli_connect('sql109.ezyro.com', 'ezyro_34791701', 'Jardocs100%', 'ezyro_34791701_jardocsestore');
//$con = mysqli_connect('localhost', 'id21169348_jardocs', 'Jardocs100%', 'id21169348_jardocsestore');
 $con = mysqli_connect('localhost', 'root', '', 'jardocsstore');
if(!$con){
    die(mysqli_error($con));
}


?>