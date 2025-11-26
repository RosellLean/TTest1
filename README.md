Para instalar de manera local:

Clonar el repositorio

Iniciar el contenedor con docker

Ejecutar los comandos:

docker exec -it laravel_app bash

composer create-project laravel/laravel .

exit

Configurar .env (local)

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret

Generar APP_KEY

Utilizar la ruta de local (http://localhost)
