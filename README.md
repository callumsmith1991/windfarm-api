# Windfarm API

## About 

This is an example REST API built in Laravel.

It basically shows a example windfarm with turbines and their components, as well as inspection listings for each turbine

The API uses Laravel sanctum to authenticate requests, with a basic frontend built with Laravel Breeze to allow the ability to generate API tokens for each user.

## Getting Started

Run:

configure .env

php artisan migrate

php artisan db:seed

Once the application is up and running, on the frontend of the application, register as a user. Then generate the API token in the dashboard to gain access to the API routes

### Postman example

- Include Authorization header "bearer" in your headers and include your token
- Configure Accept type to be "application/json"

## Paths:

### GET: 

- /api/windfarm
- /api/windfarm/{id}
- /api/windfarm/{id}/turbines

- /api/turbines
- /api/turbines/{id}
- /api/turbines/{id}/components

- /api/inspections
- /api/inspections/{id}
- /api/inspections/{id}/turbines-inspections

- /api/turbine-inspections
- /api/turbine-inspections/{id}
- /api/turbine-inspections/{id}/component-inspection
- /api/turbine-inspections/{tiid}/component-inspection/{ciid}
