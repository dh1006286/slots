<?php
//fields
$wins = 0;
$spins = 0;
$spin = [];
$letters = ['A' => 'A', 'B' => 'B', 'C' => 'C'];
// loop till wins over 499 or more than 19 spins
while($wins <= 499 && $spins < 20 )
{   
    //get three random letters
    for($i=0; $i<4; $i++)
    {
    $ranNum1 = array_rand($letters);
    $ranNum2 = array_rand($letters);
    $ranNum3 = array_rand($letters);
    }
    $result = "${ranNum1}${ranNum2}${ranNum3}";


    $points = match($result)
    {   //Combinations with three identical symbols
        'AAA', 'BBB', 'CCC' => 100,
        //Combinations with two identical symbol
        'AAB', 'ABA', 'BAA', 'ABB', 'BBA', 'BAB' => 50,
        'BCC', 'CBC', 'CCB', 'ACC', 'CAC', 'CCA' => 50,
        // no identical symbols
        default => 0,
    };
    //check wins
    $wins = $wins + $points;
    //check amount of spins
    $spins = $spins + 1;

    $display = "${result} Payoff ${points}\n";
    // push the display in the spin array
    array_push($spin, $display);
    
}
// foreach spin display the "display" veriable
foreach($spin as $s)
{
    echo $s;
}
//display how the wins
echo "Game Over. Total winnings: $wins";
