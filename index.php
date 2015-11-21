<?php include('system/bootstrap.php'); ?>

<h1>Url Changer</h1>
<p>Program kecil pengubah url absolute di database. Cocok untuk orang yang pindahan server. <br/>
Tentunya tidak mau kan ubah record satu per satu?</p>

<form action="replace.php" method="post">

Table in change :<br/>
<select name="table">
  <?php
  $data = $model->get_tables();

  while($row = $data->fetch_array())
  {
    ?><option value="<?php echo $row['result'];?>"><?php echo $row['result'];?></option><?php
  }
  ?>
</select>
<br/><br/>
Field name in charge :<br/>
<input type="text" name="field" placeholder="ex : meta_value">
<br/><br/>
Field id name :<br/>
<input type="text" name="field_id" placeholder="ex : id or meta_id">
<br/><br/>
Current url segment :<br/>
<input type="text" name="old_domain" placeholder="ex : http://codepolitan.net">
<br/><br/>
Change url segment to :<br/>
<input type="text" name="domain" placeholder="ex : http://codepolitan.id">
<br/><br/>
<input type="submit" value="Change" placeholder="ex : domain.com">

</form>
