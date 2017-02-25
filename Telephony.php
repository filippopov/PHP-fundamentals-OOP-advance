<?php

interface CallInterface
{
    public function calling(array $numbers = []);
}

interface BrowseInterface
{
    public function browsing(array $sites = []);
}

class Smartphone implements CallInterface, BrowseInterface
{

    public function calling(array $numbers = [])
    {
        for ($j = 0; $j < count($numbers); $j++) {
            for ($i = 0; $i < strlen($numbers[$j]); $i++) {
                if (! is_numeric($numbers[$j][$i])) {
                    echo "Invalid number!";
                    if ($j < (count($numbers) - 1)) {
                        echo PHP_EOL;
                    }
                    continue 2;
                }
            }

            echo "Calling... {$numbers[$j]}";

            if ($j < (count($numbers) - 1)) {
                echo PHP_EOL;
            }
        }
    }

    public function browsing(array $sites = [])
    {
        for ($j = 0; $j < count($sites); $j++) {
            for ($i = 0; $i < strlen($sites[$j]); $i++) {
                if (is_numeric($sites[$j][$i])) {
                    echo "Invalid URL!";
                    if ($j < (count($sites) - 1)) {
                        echo PHP_EOL;
                    }
                    continue 2;
                }
            }

            echo "Browsing: {$sites[$j]}!";

            if ($j < (count($sites) - 1)) {
                echo PHP_EOL;
            }
        }
    }
}

$numbers = trim(fgets(STDIN));
$sites = trim(fgets(STDIN));

$numbersArray = explode(' ', $numbers);
$sitesArray = explode(' ', $sites);

$phone = new Smartphone();


$phone->calling($numbersArray);
echo PHP_EOL;
$phone->browsing($sitesArray);

?>