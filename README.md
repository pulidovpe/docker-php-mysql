# Docker-php-mysql

En este proyecto, pretendo probar formas alternativas para desplegar aplicaciones desarrolladas en cualquier lenguaje y dejarlas funcionando en producción; "independientemente" del servicio de hosting que se use para tal fin. Es obvio, dicho servicio debe soportar esta tecnología, cuyo nombre es [Docker](https://www.docker.com/).

El proyecto es algo antiguo pero es funcional. Consta de una pequeña aplicación de prueba la cual se ejecutará en un contenedor aislado, pero al que también se puede tener acceso conociendo los parámetros adecuados de red y puerto. También consta de una base de datos, con una tabla y un par de registros ejecutándose en otro contenedor. Se agregaron también 2 contenedores más al proyecto. Uno con la aplicación PhpMyAdmin ya configurada para poder administrar la base de datos importada y otro con MailCatcher; el cual es un servicio que ejecuta un simple servidor SMTP que captura todos los mensajes enviados y los muestra en una interfaz web.

## ¿Que es Docker?

>Docker es un proyecto de código abierto que automatiza el despliegue de aplicaciones dentro de contenedores de software, proporcionando una capa adicional de abstracción y automatización de virtualización de aplicaciones en múltiples sistemas operativos.2​ Docker utiliza características de aislamiento de recursos del kernel Linux, tales como cgroups y espacios de nombres (namespaces) para permitir que "contenedores" independientes se ejecuten dentro de una sola instancia de Linux, evitando la sobrecarga de iniciar y mantener máquinas virtuales.3​. 

Cita tomada de [Wikipedia](https://es.wikipedia.org/wiki/Docker_(software))

## Screenshots / Capturas de Pantalla


## Tech-framework used / Tecnologías Usadas
- Docker  17.05.0-ce 
	- Para [Linux](https://docs.docker.com/install/linux/docker-ce/debian/)
	- Para [Windows](https://docs.docker.com/docker-for-windows/) 
	- Para [Mac](https://docs.docker.com/docker-for-mac/)
- Docker-compose 1.22.0
- Imagenes descargadas desde el repositorio de [docker](https://hub.docker.com):
	- php:7-apache
	- mysql:5.7
	- phpmyadmin/phpmyadmin
	- schickling/mailcatcher

## Install / Instalación
#### OS X, Linux y Windows
*Abra un terminal y ejecute:*
```Shell
git clone http://github.com/pulidovpe/docker-php-mysql.git

cd docker-php-mysql
```
Para iniciar los contenedores:
```Shell
docker-compose up -d --build
```
Para detenerlos:
```Shell
docker-compose down
```

Una vez ejecutándose, puede abrirse un navegador y dirigirse a la dirección http://localhost:8080 para ver la aplicación web. Ó, si desea revisarse la base de datos usando la aplicación phpmyadmin, basta con dirigirse a la url http://localhost:8181

Para ingresar en la app de PHP puede usar estos valores:
- Usuario: 99009009
- Contraseña: 123456

En caso de que se quisiera entrar a un contenedor sin usar el docker-compose, puede hacerse ejecutándolo de manera individual:
```Shell
docker run -it  mysql bash
```
Al usarse las banderas -it esto nos permitira iniciar el contenedor (basandose en la imagen elegida) en modo interactivo en el terminal por defecto. Y en este caso, en un consola.

## Tasks / Lista de Tareas
- [x] Inicialización de repositorio
- [x] Instalación de Docker
- [x] Instalación de Docker-compose
- [x] Desarrollo de aplicación web en PHP
- [x] Pruebas en local
- [x] Actualización de repositorio
- [ ] Despliegue en heroku

<!-- > Se puede ver la app (actualmente en desarrollo) desplegada en [heroku](https://docker-php-mysql.herokuapp.com/) -->

## Contribute / Para contribuir
1. Has un [Fork](https://github.com/pulidovpe/docker-php-mysql/fork)
2. Crea tu propia rama (git checkout -b feature/fooBar)
3. Sube tus cambios (git commit -am 'Add some fooBar')
4. Actualiza tu rama (git push origin feature/fooBar)
5. Has un "Pull Request"

## Credits / Créditos
En este proyecto, me he guiado de la documentacion oficial de [Docker](https://docs.docker.com/compose/) y de diversos blogs de tecnología.

## License / Licencia
Pulido V.P.E. – @github/pulidovpe – pulidovpe.dev@gmail.com
Distributed under the MIT license. See [LICENSE](LICENSE) for more information.
