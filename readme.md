Kiwi API
===

# Dependencies

- php
- postgres

# Env

create `env.php`

```
<?php

define('CACHE_DEBUG', true);

\Kiwi\Connection::$pdo_config = [
    'db' => 'kiwi',
    'user' => 'homestead',
    'password' => 'secret'
];
```

