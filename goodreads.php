<?php

//set header as json
header('Content-Type: application/json');

//set CORS header to allow all domains -- this is not exactly safe, but for our intents and purposes it will get the job done
header('Access-Control-Allow-Origin: *');

// goodreads dev key -- obtained from the goodreads api
$devKey = 'vLbPUyTk0k76BhxbiQRlCQ';

//get the book title from the url -- use urlenconde function to account for spacing
$bookTitle = urlencode($_GET['title']);

//build our API url string with the devkey and the title passed in from our javascript
$titleURL = 'https://www.goodreads.com/book/title.json?key=' . $devKey . '&title=' . $bookTitle;

//use php5-curl extension, and begin to use curl to get information
$ch = curl_init();

//curl settings
curl_setopt($ch, CURLOPT_URL, $titleURL); //this setting tells curl where to fetch information from
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1; //this setting tells curl to return information as a string

//get reviews widget
$reviews = curl_exec($ch); //this executes curl
curl_close($ch); //this closes curl on the system so it may be used by other utilities

//finally we echo out the review widget string and pass this information back to our JS
echo $reviews;
