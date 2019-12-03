<?php
include ("lib.php");

if ($_POST) {
    //echo '<pre>';
  //  echo htmlspecialchars(print_r($_POST, true));
  //  echo '</pre>';
    file_put_contents('vp.txt', $_POST['vp']);
}



?>
<!DOCTYPE html>
<html>

<head>
   <link rel="stylesheet" media="all" href="https://s3.amazonaws.com/dynatable-docs-assets/css/reset.css" />
   <link rel="stylesheet" media="all" href="https://s3.amazonaws.com/dynatable-docs-assets/css/bootstrap-2.3.2.min.css" />
   <script type='text/javascript' src='https://s3.amazonaws.com/dynatable-docs-assets/js/jquery-1.9.1.min.js'></script>
   <link rel="stylesheet" media="all" href="https://s3.amazonaws.com/dynatable-docs-assets/css/jquery.dynatable.css" />

<script type='text/javascript' src='https://s3.amazonaws.com/dynatable-docs-assets/js/jquery.dynatable.js'></script>

   <script type='text/javascript' src='https://s3.amazonaws.com/dynatable-docs-assets/js/highcharts.js'></script>

  <style>
        tr {height: 20px;}
  </style>

</head>

<body>
  <table id="my-final-table" style="width: 600px;">
    <thead>
      <?php echo getHead(); ?>
    </thead>
    <tbody>
    </tbody>
  </table>


<pre id="json-records" style="display: none;">
    <?php echo getJSON(); ?>
</pre>
<button id="edit">Редактор</button>
<form id="frm"  method="post">

<textarea id="vp" type="text" name="vp" style="border:2px solid green; height: 200px; width: 600px;" contenteditable="true" >
<?php echo getVp(); ?>
</textarea>
<input type="submit" value="coхранить"  >
</form>

<script>
$( "#frm" ).toggle( "slow" );

$( "#edit" ).click(function() {
  $( "#frm" ).toggle( "slow" );
});



 var $records = $('#json-records'),
  myRecords = JSON.parse($records.text());
$('#my-final-table').dynatable({
dataset: {
  records: myRecords
}
});

</script>


</body>

</html>
