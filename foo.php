<?php

    function sortTable ($item1, $item2) {        
        return array_shift($item1)<=> array_shift($item2);
    }
      
    function foo(array $data):array {
        //trier les elements du tableau
        usort($data, 'sortTable');

        $combinedArray = [];
        $resTab = [];

        foreach ($data as $interval) {
            if (empty($resTab)) {
                //remplir le nouveau tableau par les intervalles du tableau initial
                $resTab = $interval;
        
                //vérifier s'il y a une intersection entre les intervalles
            } elseif ($resTab[1] >= $interval[0]) {
              //  verifier quelle est la borne supéruere
              if($interval[1] > $resTab[1] ){
                   $resTab[1] = $interval[1] ;
              }
            } else {
                array_push($combinedArray,$resTab);
                //s'il n'y a pas s'intersection on garde la meme valeur
                $resTab = $interval;
            }
        }

        if ($resTab) array_push($combinedArray,$resTab);

    return $combinedArray;
    }


    //jeux de données
    print_r(foo([[0, 3], [6, 10]])); // [0,3],[6,10]
    print_r(foo([[0, 5], [3, 10]])); //[0, 10]
    print_r(foo([[0, 5], [2, 4]])); // [0, 5]
    print_r(foo([[7, 8], [3, 6], [2, 4]])); // [2,6],[7,8]
    print_r(foo([[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]])); // [1,10],[15,20]
         
?>
