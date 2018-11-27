# Wakeonweb Gelf Extra Logger Bundle

Add a processor to monolog to append dynamic extra fields.


## Installation


Composer.json

```
"wakeonweb/gelf-extra-logger-bundle": "^1.0",
```

config/bundles.php

```
    Wakeonweb\GelfExtraLogger\WakeonwebGelfExtraLoggerBundle::class => ['all' => true],
```

## Configuration

config/packages/wakeonweb_gelf_extra_logger.yaml

```
wakeonweb_gelf_extra_logger:
    extra_fields:
        my_extra_field: '%env(resolve:MY_EXTRA_ENV_VAR)%'
        my_other_field: 'foo'
```


Then configure your monolog to use gelf handler:

```
#This is an example, use fingers_crossed in prod enviroment !
monolog:
    handlers:
        gelf:
            type: gelf
            publisher:
                hostname: "..."
                port: "..."
            level: debug
```

It'll add `my_extra_field` and `my_other_field` at the root of the record in gelf destination.
