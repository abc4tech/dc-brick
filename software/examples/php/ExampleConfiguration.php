<?php

require_once('Tinkerforge/IPConnection.php');
require_once('Tinkerforge/BrickDC.php');

use Tinkerforge\IPConnection;
use Tinkerforge\BrickDC;

$host = 'localhost';
$port = 4223;
$uid = 'a4GePuz3m29'; // Change to your UID

$ipcon = new IPConnection(); // Create IP connection
$dc = new BrickDC($uid, $ipcon); // Create device object

$ipcon->connect($host, $port); // Connect to brickd
// Don't use device before ipcon is connected

$dc->setPWMFrequency(10000); // Use PWM frequency of 10khz
$dc->setDriveMode(1); // Use 1 = Drive/Coast instead of 0 = Drive/Brake

$dc->enable();
$dc->setAcceleration(5000); // Slow acceleration
$dc->setVelocity(32767); // Full speed forward

echo "Press key to exit\n";
fgetc(fopen('php://stdin', 'r'));
$ipcon->disconnect();

?>
