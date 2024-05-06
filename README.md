# WooCommerce Product Promotion

## Requirements

### PHP
- PHP 8.1.0 or higher

### WordPress & Plugins
- WordPress 5.6 or higher
- WooCommerce 4.8 or higher

### Composer
- v2.0

### Node
- v18.14.1 or higher

### NPM
- v9.3.1 or higher

## Installation

### Install Composer dependencies:
```sh
composer build
```

### Install NPM dependencies:

```sh
npm ci
```

### Build assets:

#### Development
```sh
npm run wpp:dev
```

#### Production
```sh
npm run wpp:build
```

#### Before commit
```sh
npm run:build && composer tests
```
