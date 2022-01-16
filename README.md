## Welcome :D 

## This project was designed in 9 tasks

1. Create project laravel
2. Drawing the database 
3. Create migration 
4. Create routes 
5. Create job function to import people json 
6. Create function createUser 
7. Create function verifyUserExist 
8. Create function verifyAgeUser 
9. Create Read.me
10. Added repository pattern
11. Added DTO pattern
### 1º) you should create a database named userImport

#### After that you need configure the file .env and modified these variables and put your configuration

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=userImport
DB_USERNAME=
DB_PASSWORD=

QUEUE_DRIVER=database​
QUEUE_CONNECTION=database​

```
### 2º) you need install some packages

```

composer install

```

### 3º) you need run this command, to generate a new key

```

php artisan key:generate

```

### 4º) you should run the migrations, you can use that command:

```

php artisan migrate

```

### 5º) you might start the serve and queue

```

php artisan serve

```

```

php artisan queue:work 

```

### Do you ready to start :D ?
## Route API BACKEND

### GET /importPeople
That endpoint is responsable to running the job and starting the import file /public/filesImport/challenge.json
### Response

#### OK! 200


Example of response:
```
{
    "msg": "created order to import file"
}
```

### Additional
#### You could see the drawing the database in the folder /database/UML.png


## I hope you like it, That's all today