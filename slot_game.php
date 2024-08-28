<?php

//Create an array
$slot_symbols = ['A', 'B', 'C',];

//Game Loop
//Initialize Variables
$spin_count = 0;
$total_winnings = 0;
$spin_array = [];
while ($total_winnings <= 500) { //Loop until total winnings are greater than or equal to 500
    //Loop 20 times for 20 spins
    for ($i = 0; $i < 20; $i++) {
        //Generate 3 Random Symbols from the array
        $output1 = array_rand($slot_symbols);
        $output2 = array_rand($slot_symbols);
        $output3 = array_rand($slot_symbols);
        //Concatenate the 3 symbols to form a string that represents the spin
        $spin = $slot_symbols[$output1] . $slot_symbols[$output2] . $slot_symbols[$output3];
        //Use match expression to determine the payout for the spin
        $spin_winnings = match($spin) {
            'AAA', 'BBB', 'CCC' => 100,
            'AAB', 'ABA', 'BAA', 'ABB', 'BBA', 'BCB', 'BAB', 'BCC', 'BBC', 'CBC', 'CCB', 'AAC', 'ACC', 'CAC', 'CCA', 'CAA' => 50,
            default => 0,
        };
        //Create a string for the spin that holds the spin and its corresponding payoff, add to array
        $spin_array[$i] = $spin . " Payoff $" . $spin_winnings;
        //Update Results and Track Spins
        $total_winnings += $spin_winnings;
        $spin_count++;

        //Check if total winnings are greater than or equal to 500
        if ($total_winnings >= 500) {
            break 2; //Break out of both loops if total winnings are greater than or equal to 500
        }
    }
}
//Output Results
foreach ($spin_array as $spin) {
    echo $spin . "\n";
}
echo "Total Winnings: $" . $total_winnings;