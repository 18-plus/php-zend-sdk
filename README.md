# AgeGateZend
## Install

Add to config/modules.config.php
```php
return [
    // ...
    'EighteenPlus\AgeGateZend',
]
```

or if not exists to config/application.config.php
```php
return [
    'modules' => [
        // ...
        'EighteenPlus\AgeGateZend',
    ],
]
```

## Options
Add folowing options to config/application.config.php

agegate_title - Text in the <title> tag
agegate_logo - Site logo before 'Age Gate' text and inside Qr-Code
agegate_site_name - Text before 'Age Gate'
agegate_custom_text - Text before 'reference to Digital Economy Act' or after
agegate_custom_text_location - Position of 'agegate_custom_text'. Values: 'top', 'bottom'
agegate_background_color - background color. Default: rgb(247, 241, 241)
agegate_text_color - text color. Default: #212529
agegate_remove_reference - Remove 'reference to Digital Economy Act'. Values: true, false
agegate_remove_visiting - Remove 'you are visiting from UK' text. Values: true, false
agegate_test_mode - start AgeGate immediatelly. Values: true, false
agegate_test_anyip - start AgeGate at any ip. Value: true, false
agegate_test_ip - set ip for testing. Example: '192.168.0.1'
agegate_start_from - start AgeGate after this time. Default: 2019-07-15T12:00
agegate_desktop_session_lifetime - reset AgeGate confirmation after this time in hours on Desktop. Default: 24
agegate_mobile_session_lifetime - reset AgeGate confirmation after this time in hours on Mobile devices. Default: 24