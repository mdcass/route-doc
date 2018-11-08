# Route Doc

A route-based documentation viewer for Laravel based on class phpdocs for local
development.

## Motivation

Documentation generators can often become time consuming to maintain where generation is
required after each change. I wanted the ability to maintain documentation in phpdocs as
any developer does autonomously and have that presented in a semantic and searchable way
for other developers to explore codebases more efficiently.

## Installation

You can install the package via composer:

```bash
composer require mdcass/route-doc
```

You can optionally publish the config file with

```bash
php artisan vendor:publish --provider="Mdcass\RouteDoc\Providers\ServiceProdiver" --tag="config"
```