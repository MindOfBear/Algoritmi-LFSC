<?php
$N = ["S", "A"];
$E = ["0", "1"];
$P = array(
    "S" => ["1A1", "1"],
    "A" => ["1A", "0A", "0"]
);
$S = "S";
function rec($w, $N, $P) {
    $L = strlen($w);
    if ($L <= 0) {
        if (in_array("", $P["S"])) {
            return "DA";
        }
        return "NU";
    }

    $M = ["S"];
    $M_prev = $M;
    while (true) {
        $M_next = array();
        foreach ($M_prev as $beta) {
            foreach ($N as $nt) {
                if (strpos($beta, $nt) !== false) {
                    foreach ($P[$nt] as $prod) {
                        $new_b = str_replace($nt, $prod, $beta);    
                        if (strlen($new_b) <= $L) {
                            $M_next[] = $new_b;
                        }
                    }
                }
            }
        }
        if (empty($M_next)) {
            break;
        }
        $M_prev = $M_next;
        $M = array_merge($M, $M_next);
    }
    print_r($M);
    if (in_array($w, $M)) {
        return "DA";
    }
    return "NU";
}


$word = "1101";
echo rec($word, $N, $P);
?>
