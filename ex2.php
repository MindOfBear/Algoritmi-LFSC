<?php

$graf = array("a" => ["c"], "b" => ["c", "e"], "c" => ["a", "b"], "d" => ["c"], "e" => ["c", "b"], "f" => [], "g" => ["e", "a"]);
$vizit = array();

function algo($graf, $start) {
    $Q = array();
    $Q[] = $start;
    global $vizit;
    $vizit[] = $start;
    $Q_prev = $Q;

    while (true) {
        $Q_next = array();
        foreach ($Q_prev as $nod) {
            foreach ($graf[$nod] as $adj) {
                if (!in_array($adj, $Q) && !in_array($adj, $vizit)) {
                    $Q_next[] = $adj;
                    $vizit[] = $adj;
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

print_r(algo($graf, "a"));
?>
