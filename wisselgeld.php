<?php
define("GELD", array(50, 20, 10, 5, 2, 1, 0.50, 0.20, 0.10, 0.05, 0.02, 0.01));
try{
    if (isset($argv[1])) {
        $aantal = $argv[1];
    }else{
        throw new Exception("Geen geldig bedrag mee gegeven!".PHP_EOL);
    }if ($aantal < 0) {
        throw new Exception("Je kunt geen negative getalen opgeven!".PHP_EOL);
    }if (!is_numeric($aantal)){
        throw new Exception("Je hebt geen bedrag meegegeven dat omgewisseld dient te worden!".PHP_EOL);
    }
}catch (Exception $errorMelding){
    echo "Error: ".$errorMelding->getMessage();
    exit();
}
function wisselgeld($aantal)
{
    {
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
    }
}
 wisselgeld($aantal);


