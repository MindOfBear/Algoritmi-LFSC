<?php

$graf = array("a" => ["b"],
"b" => ["e", "c"],
"c" => ["b", "a"],
"d" => ["c"],
"e" => ["c", "b"],
"f" => ["a", "b"],
"g" => ["e", "a"]);
$vizit = array();

function acc($graf, $start) {
    $Q = array();
    $Q[] = $start;
    $vizit[] = $start;
    $Q_prev = $Q;

    while (true) {
        $Q_next = array();
        foreach ($Q_prev as $nod) {
            foreach ($graf[$nod] as $vec) {
                if (!in_array($vec, $Q) && !in_array($vec, $vizit)) {
                    $Q_next[] = $vec;
                    $vizit[] = $vec;
                }
            }
        }
        if (empty($Q_next)) {
            break;
        }
        $Q_prev = $Q_next;
        $Q = array_merge($Q, $Q_next);
    }
    print_r($Q);
    return array_keys(array_diff_key($graf, array_flip($Q)));
}

print_r(acc($graf, "a"));
?>
