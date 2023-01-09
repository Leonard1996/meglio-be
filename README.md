<p><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt=""></a></p>

## meglioquestio Backend

To run the project:

1. Create a `.env` file by following `.env.example`
2. Run `docker-compose up -d` to start the project
3. Run the migrations, seeds and other configurations of the project:
    1. execute the command `docker exec -it <docker_container_id> /bin/sh` to enter into the project backend container
    2. execute the commands `php artisan migrate` and `php artisan db:seed`
