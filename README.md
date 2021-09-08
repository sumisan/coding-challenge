<h1 align="center">Coding Challenge</h1>

## Project Installation

### Pull project from git

```bash
git pull origin master
```

### Set the right folder and file permissions 

```bash 
sudo chmod -R 755 rootfolder
```
And inside the project folder

```bash
sudo chmod -R 777 storage bootstrap/cache
```
### Server configuration
Set the virtual host for your site and point to the public folder inside the project.

[Apache Virtual Host](https://httpd.apache.org/docs/2.4/vhosts/examples.html)

[Nginx Server Block](https://www.nginx.com/resources/wiki/start/topics/examples/server_blocks/)

Run composer update

```bash
composer update
```

Rename the file .env.example to .env file

```bash
cp .env.example .env
```

#### Database configuration
- Create your database and assign it a user.
- Set the database details in the .env file.

```
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

#### Mailing
- Also set MailTrap credentials in the mail section of .env file

```
MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME="${APP_NAME}"
```

Run migration to create the necessary tables for the site.
```bash
php artisan migrate
```

Run your seeder to create the admin account

```bash
php artisan db:seed
```

The default Admin credentails for the site is; Email ```admin@admin.com```, Password: ```password```

Access the site using the domain you set in your virtual host.

## About Project

This project allows one(Admin), to create, edit and delete companies,
employees and todos.

Under empoyees the Admin can associate an employee with a given company.
As for todos the Admin is a position to create a task and mark it as completed
or not.

To add an item, click on the item on the menu then click on the add button to add it.
Once added the item will be listed along with edit and delete button corresponding to it
that you can use to edit the item or delete it.


