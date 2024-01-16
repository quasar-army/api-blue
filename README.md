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
