# How to Create Server

## Example Code

```php
<?php

require 'vendor/autoload.php';

use VCManager\HetznerCloud;

$hetzner = new HetznerCloud([
    'token' => 'your-token',
]);

print_r(
    json_decode(
        $hetzner->createServer([
            'name'               => 'test-dev',
            'server_type'        => 'cx11',
            'start_after_create' => true,
            'image'              => 'ubuntu-20.04',
            'location'           => 'hel1',
        ])
    )
);
```

## Server Type List (Check: 24/5/2020)

### Request
```php
// raw array result
$hetzner->getAllServerTypes();

// table cli result
$hetzner->getAllServerTypesTable(true);

// array result
$hetzner->getAllServerTypesTable(false);
```

### Table Result

| ID | Name      | Cores | memory | Disk | Storage Type | CPU Type  | Price Hourly | Price Monthly |
|----|-----------|-------|--------|------|--------------|-----------|--------------|---------------|
| 1  | cx11      | 1     | 2      | 20   | local        | shared    | 0.004        | 2.49          |
| 2  | cx11-ceph | 1     | 2      | 20   | network      | shared    | 0.004        | 2.49          |
| 3  | cx21      | 2     | 4      | 40   | local        | shared    | 0.008        | 4.90          |
| 4  | cx21-ceph | 2     | 4      | 40   | network      | shared    | 0.008        | 4.90          |
| 5  | cx31      | 2     | 8      | 80   | local        | shared    | 0.014        | 8.90          |
| 6  | cx31-ceph | 2     | 8      | 80   | network      | shared    | 0.014        | 8.90          |
| 7  | cx41      | 4     | 16     | 160  | local        | shared    | 0.026        | 15.90         |
| 8  | cx41-ceph | 4     | 16     | 160  | network      | shared    | 0.026        | 15.90         |
| 9  | cx51      | 8     | 32     | 240  | local        | shared    | 0.050        | 29.90         |
| 10 | cx51-ceph | 8     | 32     | 240  | network      | shared    | 0.050        | 29.90         |
| 11 | ccx11     | 2     | 8      | 80   | local        | dedicated | 0.030        | 19.90         |
| 12 | ccx21     | 4     | 16     | 160  | local        | dedicated | 0.060        | 34.90         |
| 13 | ccx31     | 8     | 32     | 240  | local        | dedicated | 0.120        | 69.90         |
| 14 | ccx41     | 16    | 64     | 360  | local        | dedicated | 0.240        | 139.90        |
| 15 | ccx51     | 32    | 128    | 600  | local        | dedicated | 0.480        | 269.90        |
| 22 | cpx11     | 2     | 2      | 40   | local        | shared    | 0.006        | 3.49          |
| 23 | cpx21     | 3     | 4      | 80   | local        | shared    | 0.011        | 6.90          |
| 24 | cpx31     | 4     | 8      | 160  | local        | shared    | 0.020        | 12.40         |
| 25 | cpx41     | 8     | 16     | 240  | local        | shared    | 0.038        | 22.90         |
| 26 | cpx51     | 16    | 32     | 360  | local        | shared    | 0.080        | 49.90         |

## Image List (Check: 24/5/2020)

### Request
```php
// raw array result
$hetzner->getAllImages();

// table cli result
$hetzner->getAllImagesTable(true);

// array result
$hetzner->getAllImagesTable(false);
```

### Table Result

| ID       | Name         | Status    | Description  | Created                   |
|----------|--------------|-----------|--------------|---------------------------|
| 1        | ubuntu-16.04 | available | Ubuntu 16.04 | 2018-01-15T11:34:45+00:00 |
| 2        | debian-9     | available | Debian 9     | 2018-01-15T11:34:45+00:00 |
| 3        | centos-7     | available | CentOS 7     | 2018-01-15T11:34:45+00:00 |
| 168855   | ubuntu-18.04 | available | Ubuntu 18.04 | 2018-05-02T11:02:30+00:00 |
| 5924233  | debian-10    | available | Debian 10    | 2019-07-08T06:35:48+00:00 |
| 8356453  | centos-8     | available | CentOS 8     | 2019-10-07T13:18:43+00:00 |
| 15512617 | ubuntu-20.04 | available | Ubuntu 20.04 | 2020-04-23T17:55:14+00:00 |
| 15759618 | fedora-32    | available | Fedora 32    | 2020-04-29T10:32:02+00:00 |


## Datacenter and Location List (Check: 24/5/2020)

### Request
```php
// raw array result
$hetzner->getAllDatacenters();

// table cli result
$hetzner->getAllDatacentersTable(true);

// array result
$hetzner->getAllDatacentersTable(false);
```

### Table Result

| Datacenter ID | Datacenter Name | Location ID | Location Name | Description      |
|---------------|-----------------|-------------|---------------|------------------|
| 2             | nbg1-dc3        | 2           | nbg1          | Nuremberg1DC3    |
| 3             | hel1-dc2        | 3           | hel1          | Helsinki1DC2     |
| 4             | fsn1-dc14       | 1           | fsn1          | Falkenstein1DC14 |
