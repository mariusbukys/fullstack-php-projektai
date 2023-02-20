<?php
echo '<h3>1. Uzduotis. Sugeneruokite masyvą iš 30 elementų (indeksai nuo 0 iki 29), kurių reikšmės yra atsitiktiniai skaičiai nuo 5 iki 25 </h3>';
for ($i=0; $i<30; $i++){
    echo $i.': (' .rand(5,25).') ';
}
echo '<br />';
echo '<h3>2. Uzduotis. Sugeneruokite masyvą, kurio reikšmės atsitiktinės raidės A, B, C ir D, o ilgis 200.  </h3>';

$alphabet =('abcd');

for($i=0; $i<200; $i++){
    echo $alphabet[rand(0,3)].' ,';  
}

echo '<br />';
echo '<h3>3. Uzduotis. Sugeneruokite 3 masyvus pagal 2 uždavinio sąlygą. Sudėkite masyvus, sudėdami reikšmes pagal atitinkamus indeksus.   </h3>';

$alphabet =('abcd');
$raides = array();
$raides1 = array();
$raides2 = array();
$masyvas = array();
echo '<h2>pirmas masyvas:</h2> ';
for($i=0; $i<200; $i++){
    $raides[]=$alphabet[rand(0,3)]; 
}
print_r($raides);

echo '</br>';
echo '<h2>antras masyvas:</h2> ';
    for($i=0; $i<200; $i++){ 
        $raides1[]=$alphabet[rand(0,3)]; 
         
    }
print_r($raides1) ;
    echo '</br>';
echo '<h2>trecias masyvas:</h2> ';
    for($i=0; $i<200; $i++){ 
        $raides2[]=$alphabet[rand(0,3)]; 
          
}
print_r($raides2);
echo '</br>';
echo '<h2>bendras masyvas:</h2> ';
for($i=0; $i<200; $i++){
    $masyvas[] =$raides[$i].$raides1[$i].$raides2[$i];
    
}
print_r($masyvas);

echo '<br />';
echo '<h3>4.Nupieškite kvadratą iš “*”, kurio kraštines sudaro 100 “*”. Panaudokite css stilių, kad kvadratas ekrane atrodytų kvadratinis. Nupieštam kvadratui nupieškite raudonas įstrižaines.   </h3>';

for ($i=0; $i<100; $i++){
    echo '</br>';
    echo '*';
   
    for ($j=0; $j<100; $j++){
       echo '*';
  }
       
}

?>
