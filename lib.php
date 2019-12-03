<?php
function getVp()
{
  $lines = file('vp.txt');


  $ret="";
  foreach ($lines as $key => $value) {
      $ret=$ret.trim($value)."\n";
  }

  return $ret;
}

function getJSON()
{
  $lines = file('vp.txt');
  $text="";
  $header="";
  $json=array("[");
// Осуществим проход массива и выведем содержимое в виде HTML-кода вместе с номерами строк.
foreach ($lines as $line_num => $line) {
  //  echo " $line  \n";

    $line = preg_replace('|[\s]+|s', ' ', $line);
    $line = trim($line);
    $bmass=explode(" ",$line);

    array_push($json,"{");

    foreach ($bmass as $key => $value){
      $value=trim($value);
      if (stripos($value, ":")===false) {
        $text=trim($text." ".$value)  ;
        if ($key==count($bmass)-1) {array_push($json,"\"text\":\"$text\""); } else {array_push($json,"\"text\":\"$text\","); }

      } else {

      $mass=explode (":",$value);
      $op=$mass[0];
      $zna=$mass[1];

      if (stripos($value, "%")===false) {$qo="\"";} else {$qo="";}

      if ($key==count($bmass)-1) {array_push($json,"\"$op\":".$qo.$zna.$qo); } else {array_push($json,"\"$op\":".$qo.$zna.$qo.","); }

            }


    }
    if ($line_num==count($lines)-1) {array_push($json,"}");} else {array_push($json,"},"); }



  $text="";

}

array_push($json,"]");
$ret="";
foreach ($json as $key => $value) {
    $ret=$ret.$value."\n";
}

return $ret;



}

function getHead()
{
  $lines = file('vp.txt');
  $text="";
  $header=array();
  $json=array();
// Осуществим проход массива и выведем содержимое в виде HTML-кода вместе с номерами строк.
foreach ($lines as $line_num => $line) {
  //  echo " $line  \n";

    $line = preg_replace('|[\s]+|s', ' ', $line);
    $line = trim($line);
    $bmass=explode(" ",$line);



    foreach ($bmass as $value){
      $value=trim($value);
      if (stripos($value, ":")===false) {

      } else {

      $mass=explode (":",$value);
      $op=$mass[0];
      $zna=$mass[1];
        array_push($header,"$op");
            }


    }

  $text="";

}

$header= array_unique($header);
$ret="<th>text</th>\n";
foreach ($header as $key => $value) {
    $ret=$ret."<th>$value</th>\n";
}

return $ret;
}



 ?>
