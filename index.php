<?php

function countPairs(array $numbers, int $target): int{
    $totalPairs = 0;
    $seen = [];

    // Now loop through numbers
    foreach ($numbers as $number) {
        $pair = $target - $number;
        
        // Put $number into seen
        if(!isset($seen[$number])){
            $seen[$number] = 1; // assign 1 as default
        }else{
            if(isset($seen[$pair]) and $seen[$pair] != 0) $seen[$number]++;
        }

        // Then check if pair number to form target number is seen in $seen
        // Check if number in seen were paired already
        if(isset($seen[$pair]) && $seen[$pair] != 0){
            // Pair set is found
            $totalPairs++;
            
            // Exclude numbers from the next checking 
            $seen[$pair] = 0;
            $seen[$number] = 0;

        }
    }

    // Now debug 
    print("[DEBUG] Total pairs: " . $totalPairs . "\n");
    // Separator debug
    print('[DEBUG] ------------' . "\n");

    return $totalPairs;
}


countPairs([1, 3, 2, 2, 3, 4], 5); // Output: 2
countPairs([1, 1, 1, 1], 2); // Output: 1
countPairs([1, 2, 3, 4, 5], 7); // Output: 2
// Add more tests
countPairs([1, 3, 2, 2, 3, 4,5,6,3,2,5,6,8,9,5,3,3,5,6,1,23,13,14,15,16,17], 23); 
/*
 * 17|6
 * 15|8
 * 14|9
 */
countPairs([1, 1, 1, 1,2,2,2,2,3,3,3,4,4,4,5,5,5,7], 7); 
/*
 * 2|5
 * 3|4
 * 
 */ 
countPairs([1, 2, 3, 4, 5,3,4,5,7,11,12,12,13,14,2,3,4,5], 18); 
/*
 * 14|4
 * 13|5
 * 11|7
 */ 
