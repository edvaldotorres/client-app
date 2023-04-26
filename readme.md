<h1 align="center">Welcome to client-app 👋</h1>
<p>
  <img alt="Version" src="https://img.shields.io/badge/php-8.0-blue.svg?cacheSeconds=2592000" />
  <img alt="Version" src="https://img.shields.io/badge/laravel-9.0-red.svg?cacheSeconds=2592000" />
  <a href="https://documenter.getpostman.com/view/13040502/UzBjrney#c3212110-5be6-45bd-b000-95c6538746ca" target="_blank">
    <img alt="Documentation" src="https://img.shields.io/badge/documentation-yes-brightgreen.svg" />
  </a>
  <a href="#" target="_blank">
    <img alt="License: MIT" src="https://img.shields.io/badge/License-MIT-yellow.svg" />
  </a>
</p>

> Project boils down to customer crud! Where it follows good practices and RSP recommendations… its main objective is to improve the Laravel framework

## Prerequisites

* Docker

## Install

1. Clone your repository, example:

```sh
git clone https://github.com/edvaldotorres/client-app.git
```
2. Change directory into the newly created app/project.

```sh
cd client-app
```
3. Run the servers

```sh
sh script-start-docker-compose.sh
```
NOTE: This may take a while if this is the first time installing this as a container.

4. Install the dependencies

```sh
docker exec -it client-app-php-fpm-1 /bin/bash
```

or

```sh
docker exec -it client-app-php-fpm-1 /sh
```

```sh
cd app
```

```sh
composer intall
```

```sh
npm install
```

```sh
npm run build
```

5. Build the migrate.

```sh
php artisan migrate
```

## Usage

1. You can now open your application with platform: http://localhost:8000/

## Author

👤 **Edvaldo Torres de Souza**

* Website: [edvaldotorres.com.br](https://edvaldotorres.com.br/)
* Github: [@edvaldotorres](https://github.com/edvaldotorres)
* LinkedIn: [Edvaldo Torres](https://www.linkedin.com/in/edvaldo-torres-189894150/)

## 🤝 Contributing

Contributions, issues and feature requests are welcome!<br />Feel free to check [issues page](https://github.com/edvaldotorres/client-app/issues). 

## Show your support

Give a ⭐️ if this project helped you!