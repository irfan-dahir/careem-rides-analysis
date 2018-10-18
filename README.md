# Careem Analyzer
This library is a **Proof Of Concept**. It objectifies the data dump of your Rides from Careem's user Dashboard into PHP and allows you to use it for analysis.


## How To Get Data Dump
Note: You need to be logged in to the dashboard.

1. Login to Careem's [User Dashboard](https://app.careem.com/?lang=en)
2. Go to `https://app.careem.com/getAllAccessibleCompletedTrips.json?start=0&limit=100`
3. Play with `start` and `limit`. It sometimes only works with 100 rides request at a time.
4. Download it, change `start` offset and repeat

## Using CareemAnalyzer

`composer require irfan/careem-rides-analysis`

```php
$careem = new \Careem\RideAnalysis();
$careem->load([
    'path/to/getAllAccessibleCompletedTrips.json', // 0-100 rides JSON data
    'path/to/getAllAccessibleCompletedTrips (1).json', // 101-200 rides JSON data
]);

$rides = $careem->parse();
```

Run & check out [example.php](example.php) for an in-depth use.


### Dependencies
- PHP 7.1+
- Guzzle (needed by the library)
- League/CSV (needed by [example.php](example.php) ONLY to parse Captain (Driver) data)

### Disclaimer
- This project is only a fun Proof of Concept for analysing Ride data
- This is not affiliated with Careem
- I am not responsible for how you do use this library