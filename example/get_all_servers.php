<?php

require 'vendor/autoload.php';

use VCManager\HetznerCloud;

$hetzner = new HetznerCloud([
    'token' => 'your-token',
]);

print_r(
    json_decode(
        $hetzner->getAllServers()
    )
);
