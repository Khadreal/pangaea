Pangaea
## How to run 

Clone this repo, run composer install, `php artisan migrate`, and `php artisan db:seed` to run the seeder. Run `php artisan serve` , You can view the available topics on the index page at http://localhost:8080 or whatever your port is.

## Available Endpoint
- [POST] -- http://localhost:8080/api/subscribe/{topic-slug or topic ID}
- [POST] -- http://localhost:8080/api/publish/{topic-slug or topic ID}