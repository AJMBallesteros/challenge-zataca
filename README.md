
# Prueba técnica ZATACA SYSTEMS




## Author

- [@AJMBallesteros](https://github.com/AJMBallesteros)


## Deployment

Para ver el resultado de la prueba

Step 1: Añadir en el .env las siguientes variables

```code
DB_CONNECTION_ZATACA=zataca
DB_HOST_ZATACA= {{ Usar las credenciales que se facilitaron para la prueba }}
DB_PORT_ZATACA=5432
DB_DATABASE_ZATACA= {{ Usar las credenciales que se facilitaron para la prueba }}
DB_USERNAME_ZATACA= {{ Usar las credenciales que se facilitaron para la prueba }}
DB_PASSWORD_ZATACA= {{ Usar las credenciales que se facilitaron para la prueba }}
```

Step 2: Lanzar el servidor local de Laravel
```bash
php artisan serve
```

Step 3: Acceder a la ruta http://127.0.0.1:8000/web/facturacion/facturas-impagadas


# Prueba del Cron

Para comprobar el Cron se puede ver el resultado del comando de forma independiente:

```bash
php artisan unpaid-invoices:get
```

O indicando para que se ejecute cada minuto por ejemplo en lugar de mensualmente y ejecutando un:

```bash
php artisan schedule:run
```

# Testing

Para arrancar el proyecto hay que ejecutar:

```bash
make up
```

Para parar los contenedores de docker:

```bash
make down
```

El resultado de la prueba será accesible desde http://0.0.0.0:8000/web/facturacion/facturas-impagadas

(*) Es posible que aparezcan errores relacionados con los permisos en el fichero /storage/logs/laravel.log. Para
solucionarlo es necesario darle los permisos adecuados en función del usuario que ejecuta los contenedores. Como posible
solución podemos usar en la raiz del proyecto:

```code
sudo chown -R $USER storage
```

Para ejecutar los test bastaría con ejecutar:

```bash
make tests
```
