<?php
$aantal = ($argv[1]);
define("GELD", array(50, 20, 10, 5, 2, 1, 0.50, 0.20, 0.10, 0.05, 0.02, 0.01));

function wisselgeld($aantal)
{
    if (is_numeric($aantal)) {
        foreach (GELD as $uitkomst) {
            $vloer = 0;
            if ($aantal >= $uitkomst) {
                $aantal = round($aantal, 2);
                $vloer = floor($aantal / $uitkomst);
                $aantal = round($aantal - ($vloer * $uitkomst), 2);
            }
            if ($vloer > 0) {
                if ($uitkomst < 1) {
                    $cent = $uitkomst * 100;
                    echo "$vloer * $cent Cent" . PHP_EOL;
                } else {
                    echo "$vloer * $uitkomst Euro" . PHP_EOL;
                }
            }
        }
    }else{
        throw new Exception("Je hebt geen bedrag meegegeven dat omgewisseld dient te worden");
    }
}try{
    wisselgeld($aantal);
}catch (Exception $errorMelding){
    echo "Error: ".$errorMelding->getMessage();
}