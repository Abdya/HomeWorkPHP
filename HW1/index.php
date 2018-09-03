<!doctype html>
<html>
<head>
    <style>
        .colo1{
            color: lightskyblue;
        }
        .colo2{
            color: sienna;
        }
    </style>
</head>
<body>
<h2>Ne chet</h2>
<?php
$comoon=[];
for ($i=0; $i<100; $i+=1){
    array_push($comoon, $i*25/13);
}
for ($i=1; $i<count($comoon); $i+=2){
    echo "{$comoon[$i]} <strong><span class='colo1'>$i</span></strong> <br>";
}
?>
<h2>Chet</h2>
<?php
for ($i=0; $i<count($comoon); $i+=2){
    $bdya=round($comoon[$i],2);
    echo "$bdya <strong><span class='colo2'>$i</span></strong> <br>";
}
?>
&copy;AbdyaProduction<br>
</body>
</html>