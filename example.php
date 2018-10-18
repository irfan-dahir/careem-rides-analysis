<?php
/*
 * Author: Irfan Dahir
 * Email: irfan@dahir.co
 *
 * Analyzes your careem rides dataset
 * Learn more on downloading the data in the README
 *
 * This is an example script utilzing the library
 */


require __DIR__ . '/vendor/autoload.php';



$careem = new \Careem\RideAnalysis();
$careem->load([
    'data/raw/getAllAccessibleCompletedTrips.json', // refer to README.md for getting this JSON file
    'data/raw/getAllAccessibleCompletedTrips (1).json',
]);

$rides = $careem->parse();


$totalDistance = 0;
$totalPrice = 0;
$waivedRides = 0;
$initialWaitTime = 0;
$inJourneyWaitTime = 0;

$carTypes = [];


try {

    $csv = \League\Csv\Writer::createFromFileObject(new SplTempFileObject());
    $csv->insertOne([
        'Driver Name',
        'Driver Number',
        'Driver Full Detail',
        'Car Type',
        'Car Make',
        'Car Model',
        'Car Color',
        'Car Build Year',
        'Car License',
        'Car License Authority',
    ]);

    foreach ($rides as $ride) {

        $csv->insertOne([
            $ride->getDriver()->getName(),
            $ride->getDriver()->getPhoneNumber(),
            $ride->getDriver()->getLimoCompanyName(),
            $ride->getCarType()->getName(),
            $ride->getCar()->getMake(),
            $ride->getCar()->getModel(),
            $ride->getCar()->getColor(),
            $ride->getCar()->getBuildYear(),
            $ride->getCar()->getLicensePlate(),
            $ride->getCar()->getLicenseAuthority(),
        ]);

        $totalPrice += $ride->getTripChargedPrice();
        $totalDistance += $ride->getTotalDistance();
        $waivedRides += ($ride->isWaivedForCustomer() ?  1 : 0);
        $initialWaitTime += $ride->getInitialWaitTime();
        $inJourneyWaitTime += $ride->getInJourneyWaitTime();


        if (!array_key_exists(
            $ride->getCarType()->getName(),
            $carTypes
        )) {
            $carTypes[$ride->getCarType()->getName()] = [
                'rides' => 0,
                'distance' => 0,
                'amount' => 0,
                'pickupTimestamps' => [],
                'dropoffTimestamps' => [],
                'duration' => 0
            ];
        }

        $carTypes[$ride->getCarType()->getName()]['rides']++;


        foreach ($ride->getTripPricingComponents() as $component) {
            $carTypes[$ride->getCarType()->getName()]['amount'] += round($component->getAmount(), 2);
        }

        $carTypes[$ride->getCarType()->getName()]['distance'] += $ride->getTotalDistance();
        $carTypes[$ride->getCarType()->getName()]['duration'] += ($ride->getDropoffTime() - $ride->getPickupTime());
        $carTypes[$ride->getCarType()->getName()]['pickupTimestamps'][] = $ride->getPickupTime();
        $carTypes[$ride->getCarType()->getName()]['dropoffTimestamps'][] = $ride->getDropoffTime();

    }

    $csv->output('drivers.csv');

    $totalDistance = round($totalDistance, 4);
} catch (\Exception $e) {
    echo $e->getMessage();
    die;
}

echo "Total Rides {$careem->dataCount}" . PHP_EOL;
echo "Total Spent: Rs. {$totalPrice}" . PHP_EOL;
echo "Total Distance: {$totalDistance} Km" . PHP_EOL;
echo "Average price per km: ".round($totalPrice/$totalDistance, 4)." Per Km" . PHP_EOL;
echo "Traveled in: " . implode(", ", array_keys($carTypes)) . " car types" . PHP_EOL . PHP_EOL;

echo "Waived Rides: {$waivedRides}" . PHP_EOL;
echo "Avg. In Journey Wait Time: " . round(($inJourneyWaitTime/(count($rides)-1)), 2) . " min" . PHP_EOL;
echo "Avg. Initial Wait Time: " . round(($initialWaitTime/(count($rides)-1)), 2) . " min" . PHP_EOL;
echo "Total In Journey Wait Time: {$inJourneyWaitTime} min" . PHP_EOL;
echo "Total Initial Wait Time: {$initialWaitTime} min" . PHP_EOL;

echo PHP_EOL . "---BREAKDOWN---" . PHP_EOL;
foreach ($carTypes as $type => $data) {

    echo "Car Type: \"{$type}\"" . PHP_EOL;
    echo "\tRides: {$data['rides']} ride(s)" . PHP_EOL,
        "\tRs. {$data['amount']}" . PHP_EOL,
        "\tAvg Rs. " . round(($data['amount']/$data['rides']),2) . " /Ride" . PHP_EOL,
        "\tAvg Rs. " .round($data['amount']/$data['distance'], 2) . " /Km" . PHP_EOL,
        "\tAvg Distance. " .round($data['distance']/$data['rides'], 2) . " Km/Ride" . PHP_EOL,
        "\tAvg Duration. " .round(($data['duration']/60)/$data['rides'], 2) . " Min/Ride" . PHP_EOL,
        "\tTotal Distance: " . round($data['distance']) . " Km" . PHP_EOL,
        "\tTotal Duration: " . round(($data['duration']/60)/60, 2) . " Hours" . PHP_EOL . PHP_EOL,

        "\tFirst Ride: " . date('l M j, Y \a\t g.ia', $data['pickupTimestamps'][count($data['pickupTimestamps'])-1]),
        PHP_EOL . PHP_EOL;
}
