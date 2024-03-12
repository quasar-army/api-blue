## Getting Started
1. clone this repo. We recommend using [degit](https://github.com/Rich-Harris/degit) to clone the repo, without keeping the .git file.
2. copy .env.example to .env `cp .env.example .env`
3. update the APP_SERVICE in your env file to a name that uniquely identifies this app. We do this to avoid clashes with sail
4. start the server with `./vendor/bin/sail up`. Add `-d` if you don't need the console output (we recommend only doing this once everything is working)
5. You may wish to alias `./vendor/bin/sail` to `sail`
```
alias sail="./vendor/bin/sail"
```
6. migrate and seed the database
```sh
sail php artisan migrate --seed
```

## Development Links
- blue api: http://localhost (will return a 404 by default, as blue is purely an api)
- telescope (mostly for debugging requests): http://localhost/telescope
- horizon (checking jobs): http://localhost/telescope
- mailpit (catches all email so we can easily test email): http://localhost:8025

## Update Strategy
Here's a quick checklist we can use to keep api-blue up to date:
  - run `composer outdated` and see what stands out
  - use `composer update some-package` to update packages where it makes sense
  - when upgrading Laravel, go through the Laravel upgrade guide
  - Using [docker hub](https://hub.docker.com/) and [sails stubs](https://github.com/laravel/sail/tree/1.x/stubs), upgrade docker images. Specifically:
    - laravel.test
    - pgsq
    - soketi (need to find a way to update this)
- updating configs
  - go to https://github.com/laravel/laravel/compare
  - compare latest to current
  - click "Fiels changed"
  - `ctrl + f` and search "config/"
- run tests
