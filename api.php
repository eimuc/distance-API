<?php 

session_start();

if (!empty($_POST)) {
    $city1 = $_POST['city1'];
    $city2 = $_POST['city2'];

    $ch = curl_init();
    curl_setopt(
    $ch, CURLOPT_URL,
    'https://www.distance24.org/route.json?stops='.$city1.'|'.$city2
    );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    $response = json_decode($response);
    $distance = $response->distance;
    $image1 = $response->stops[0]->wikipedia->image;
    $image2 = $response->stops[1]->wikipedia->image;

    $_SESSION['distance'] = $distance;
    $_SESSION['city1'] = $city1;
    $_SESSION['city2'] = $city2;
    $_SESSION['image1'] = $image1;
    $_SESSION['image2'] = $image2;

    header('Location: https://eimantas-andrejevas.lt/distance/');
    die;
}

if (isset($_SESSION['distance'])) {
    $distance = $_SESSION['distance'];
    $city1 = $_SESSION['city1'];
    $city2 = $_SESSION['city2'];
    $image1 = $_SESSION['image1'];
    $image2 = $_SESSION['image2'];
    unset($_SESSION['distance'], $_SESSION['city1'], $_SESSION['city2'], $_SESSION['image1'], $_SESSION['image2']);
}

?>