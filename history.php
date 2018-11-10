<?php
require("classes/dataaccess.class.php");
$dao=new DataAccess();
require("header.php");


?> 
   <!-- Page level plugin CSS-->
    <link href="admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin.css" rel="stylesheet">

   <section id="" class="section-padding">
<div class="container">
<div class="row">

<button type="submit"  class="btn btn-warning" >UpComing</button>

<div id="pending"class="collapse">



<?php
$field=array('res_id','d_name','res_date','res_status');
$con="res_uname='".$_SESSION['uname']."'and reservation.res_did=doctor.d_id and res_status='pending'";
$tab=$msg=$dao->getHtmlRows($field,"reservation,doctor",$con);
?>
&nbsp;<table class="table table-bordered "><thead class="thead-dark"><tr><th>Chart No</th><th>Doctor</th><th>Date</th><th>Status</th></tr></thead><tbody>
<?php

echo $tab;
?>

</tbody>
</table></div></div></section>

   <!-- Page level plugin CSS-->
    <link href="admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin.css" rel="stylesheet">

   <section id="" class="section-padding">
<div class="container">
<div class="row">

<button type="submit"  class="btn btn-warning" >Disposed</button>

<div id="pending"class="collapse">



<?php
$field=array('res_id','d_name','res_date','res_status');
$con="res_uname='".$_SESSION['uname']."'and reservation.res_did=doctor.d_id and res_status!='pending'";
$tab=$msg=$dao->getHtmlRows($field,"reservation,doctor",$con);
?>
&nbsp;<table class="table table-bordered "><thead class="thead-dark"><tr><th>Chart No</th><th>Doctor</th><th>Date</th><th>Status</th></tr></thead><tbody>
<?php

echo $tab;
?>

</tbody>
</table></div></div></section>

<?php
require("footer.php");
?>