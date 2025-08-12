To check valid mobile numbers, get mobile operator's name, sanitize mobile numbers and get mobile network types.

### Installation

```
TODO
```

### Usage
```php
<?php
	require __DIR__ . "/vendor/autoload.php";

    use PHONE\PhoneNumber;

    $phoneNumber = new PhoneNumber();

    $phoneNumber->is_telecom('Telenor', "09794303891");
    $phoneNumber->is_telecom('mpt', "09794303891");
    $phoneNumber->is_telecom('ooredoo', "09794303891");

    $phoneNumber->is_valid('09794303891');
    $phoneNumber->telecom_name('09794303891');
    $phoneNumber->add_prefix("0979403891");
?>
```