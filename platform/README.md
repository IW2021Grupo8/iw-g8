# Instalación de docker

```
docker-compose up -d --build --remove-orphans
```


Actualización de base de datos

```
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```