# Trabajo2Daw2
conjunto de carpetas y ficheros de un protal web desarrollado en Wordpress

Características
Una vez instalado el WordPress, se configuro para poder acceder como administrador y empezar a modificar el portal web, se empezó buscando un diseño básico para poder hacer nuestro portal más vistoso a las fotos, para que estuvieran bien cuadradas. Se lo siguió instalando ciertos plugin para darle forma al portal web, como fue el caso de WooComerce o Contact Form 7, el WooComerce se encarga de poner las bases de nuestra tienda online, Contact Form 7 sirve para poder hacer un formulario donde contacte con nosotros. Por último, pero no menos importante tenemos nuestros usuarios pueden ver el portal web y comprar, luego están los editores que pueden editar las páginas del sitio web, pero no pueden ni crear ni borrar una página, y por ultimo los autores que solo pueden añadir entradas al blog, también los dos pueden comprar en la tienda
Para la instalación de nuestro CMS primero pasaremos a instalar una pila LAMP como prerrequisito y a continuación se procederá a la instalación de Wordpress.

Prerrequisitos: Instalación pila LAMP
Paso 1: instalación de Apache y actualización del cortafuegos
El servidor web Apache se encuentra entre los servidores web más populares del mundo. Está bien documentado, tiene una comunidad activa de usuarios y se ha utilizado ampliamente durante gran parte de la historia de la web, lo que la convierte en una excelente opción predeterminada para alojar un sitio web.
Instalar Apache mediante el gestor de paquetes de Ubuntu, apt:

$ sudo apt update
$ sudo apt install apache2

Si es la primera vez que usa sudo en esta sesión, se le pedirá que proporcione su contraseña de usuario para confirmar que tiene los privilegios adecuados para administrar los paquetes del sistema apt. También se le pedirá que confirme la instalación de Apache presionando Y, luego ENTER.

Paso 2: instalar MySQL
Ahora que tiene un servidor web en funcionamiento, debe instalar el sistema de base de datos para poder almacenar y administrar los datos de su sitio. MySQL es un popular sistema de gestión de bases de datos que se utiliza en entornos PHP.
Nuevamente, utilice aptpara adquirir e instalar este software:

$ sudo apt install mysql-server

Cuando se le solicite, confirme la instalación escribiendo Yy luego ENTER.
Cuando finalice la instalación, se recomienda que ejecute un script de seguridad que viene preinstalado con MySQL. Este script eliminará algunas configuraciones predeterminadas inseguras y bloqueará el acceso a su sistema de base de datos. Inicie el script interactivo ejecutando:

$ sudo mysql_secure_installation

Responda Ysí, o cualquier otra cosa para continuar sin habilitar.
VALIDATE PASSWORD PLUGIN can be used to test passwords
and improve security. It checks the strength of password
and allows the users to set only those passwords which are
secure enough. Would you like to setup VALIDATE PASSWORD plugin?

Press y|Y for Yes, any other key for No:

Si responde "sí", se le pedirá que seleccione un nivel de validación de contraseña. Tenga en cuenta que, si ingresa 2 para el nivel más fuerte, recibirá errores cuando intente establecer una contraseña que no contenga números, letras mayúsculas y minúsculas y caracteres especiales, o que esté basada en palabras comunes del diccionario.



There are three levels of password validation policy:

LOW    Length >= 8
MEDIUM Length >= 8, numeric, mixed case, and special characters
STRONG Length >= 8, numeric, mixed case, special characters and dictionary              file

Please enter 0 = LOW, 1 = MEDIUM and 2 = STRONG: 1

Independientemente de si eligió configurar o no VALIDATE PASSWORD PLUGIN, su servidor le pedirá que seleccione y confirme una contraseña para el usuario root de MySQL . Esto no debe confundirse con la raíz del sistema . El usuario raíz de la base de datos es un usuario administrativo con privilegios completos sobre el sistema de la base de datos. Aunque el método de autenticación predeterminado para el usuario root de MySQL dispensa el uso de una contraseña, incluso cuando se establece una , debe definir una contraseña segura aquí como medida de seguridad adicional. Hablaremos de esto en un momento.
Si habilitó la validación de contraseña, se le mostrará la seguridad de la contraseña de root que acaba de ingresar y su servidor le preguntará si desea continuar con esa contraseña. Si está satisfecho con su contraseña actual, ingrese Y"sí" cuando se le solicite:
Para el resto de las preguntas, presione Y y presione la ENTER tecla en cada indicación. Esto eliminará algunos usuarios anónimos y la base de datos de prueba, deshabilitará los inicios de sesión de root remotos y cargará estas nuevas reglas para que MySQL respete inmediatamente los cambios que ha realizado.
Cuando haya terminado, pruebe si puede iniciar sesión en la consola MySQL escribiendo:

$ sudo mysql

Esto se conectará al servidor MySQL como la raíz del usuario de la base de datos administrativa, que se infiere por el uso de sudo cuando se ejecuta este comando. Debería ver un resultado como este:
Output
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 22
Server version: 8.0.19-0ubuntu5 (Ubuntu)

Copyright (c) 2000, 2020, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> 
Para salir de la consola MySQL, escriba:

$ exit
 

Tenga en cuenta que no es necesario que proporcione una contraseña para conectarse como usuario raíz, aunque haya definido una al ejecutar el mysql_secure_installationscript. Esto se debe a que el método de autenticación predeterminado para el usuario administrativo de MySQL es en unix_socketlugar de password. Aunque esto puede parecer un problema de seguridad al principio, hace que el servidor de la base de datos sea más seguro porque los únicos usuarios que pueden iniciar sesión como usuario raíz de MySQL son los usuarios del sistema con privilegios de sudo que se conectan desde la consola o mediante una aplicación que se ejecuta con los mismos privilegios. En términos prácticos, eso significa que no podrá utilizar el usuario raíz de la base de datos administrativa para conectarse desde su aplicación PHP. Establecer una contraseña para la raízLa cuenta MySQL funciona como protección, en caso de que el método de autenticación predeterminado cambie de unix_socketa password.
Para una mayor seguridad, es mejor tener cuentas de usuario dedicadas con privilegios menos expansivos configuradas para cada base de datos, especialmente si planea tener varias bases de datos alojadas en su servidor.
Su servidor MySQL ahora está instalado y protegido. A continuación, instalaremos PHP, el componente final de la pila LAMP.

Paso 3: instalación de PHP
Tiene Apache instalado para servir su contenido y MySQL instalado para almacenar y administrar sus datos. PHP es el componente de nuestra configuración que procesará el código para mostrar contenido dinámico al usuario final. Además del php paquete, necesitará php-mysql un módulo PHP que le permita a PHP comunicarse con bases de datos basadas en MySQL. También libapache2-mod-phpdeberá habilitar Apache para manejar archivos PHP. Los paquetes principales de PHP se instalarán automáticamente como dependencias.
Para instalar estos paquetes, ejecute:

$ sudo apt install php libapache2-mod-php php-mysql
 
Dupdo
Una vez finalizada la instalación, puede ejecutar el siguiente comando para confirmar su versión de PHP:

$ php -v
 

Output
PHP 7.4.3 (cli) (built: Mar 26 2020 20:24:23) ( NTS )
Copyright (c) The PHP Group
Zend Engine v3.4.0, Copyright (c) Zend Technologies
    with Zend OPcache v7.4.3, Copyright (c), by Zend Technologies
En este punto, su pila LAMP está completamente operativa.





Instalación WordPress en Ubuntu 20.04
Una vez instalada la pila LAMP procederemos a seguir los siguientes pasos para la instalación de WordPress en Ubuntu 20.04.

Paso 1: Creación de una base de datos de MySQL y un usuario para WordPress

El primer paso que daremos es preparatorio. WordPress utiliza MySQL para administrar y almacenar el sitio y la información del usuario. Ya instalamos MySQL, pero debemos crear una base de datos y un usuario para que use WordPress.
Para comenzar, inicie sesión en la cuenta root de MySQL (administrativa) emitiendo este comando (tenga en cuenta que este no es el usuario root de su servidor):

$ mysql -u root -p
 
Una vez instalado el software le solicitará la contraseña que configuró para la cuenta root de MySQL.
En la base de datos, puede crear una base de datos exclusiva para que WordPress la controle. Puede ponerle el nombre que quiera, pero usaremos el nombre wordpress en esta guía. Cree la base de datos para WordPress escribiendo lo siguiente:

mysql> CREATE DATABASE wordpress DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

A continuación, crearemos una cuenta de usuario separada de MySQL que usaremos exclusivamente para realizar operaciones en nuestra nueva base de datos. Crear bases de datos y cuentas específicas puede ayudarnos desde el punto de vista de administración y seguridad. Usaremos el nombre wordpressuser en esta guía, pero puede usar el nombre que sea más relevante para usted.
Crearemos esta cuenta, configuraremos una contraseña y concederemos acceso a la base de datos que hemos creado. Podemos hacerlo escribiendo el siguiente comando. Recuerde elegir una contraseña segura aquí para su usuario de base de datos donde tenemos password:

mysql> CREATE USER 'wordpressuser'@'%' IDENTIFIED WITH mysql_native_password BY 'password';


A continuación, deje saber a la base de datos que nuestro wordpressuser debería tener acceso completo a la base de datos que configuramos:

mysql> GRANT ALL ON wordpress.* TO 'wordpressuser'@'%';
 
Ahora tiene una base de datos y una cuenta de usuario, creadas específicamente para WordPress. Debemos eliminar los privilegios de modo que la instancia actual de MySQL sepa sobre los cambios recientes que hemos realizado:

mysql> FLUSH PRIVILEGES;
 
Cierre MySQL escribiendo lo siguiente:

mysql> EXIT;
 
En el siguiente paso, crearemos la base para los complementos de WordPress descargando extensiones PHP para nuestro servidor.

Paso 2: Instalación de extensiones de PHP adicionales
Cuando configuramos nuestra pila LAMP, solo necesitamos un conjunto de extensiones muy reducido para que PHP se comunicara con MySQL. WordPress y muchos de sus complementos aprovechan las extensiones de PHP adicionales.
Podemos descargar e instalar algunas de las extensiones de PHP más populares para usarlas con WordPress escribiendo lo siguiente:

$ sudo apt update
$ sudo apt install php-curl php-gd php-mbstring php-xml php-xmlrpc php-soap php-intl php-zip
 
Esto sentará las bases para instalar complementos adicionales en nuestro sitio WordPress.
Necesitaremos reiniciar Apache para cargar estas nuevas extensiones; realizaremos más configuraciones en Apache en la próxima sección, así que puede esperar hasta entonces o reiniciar ahora para completar el proceso de extensión de PHP.

$ sudo systemctl restart apache2

Paso 3: Ajuste de la configuración de Apache para permitir reemplazos y reescrituras .htaccess
A continuación, realizaremos algunos ajustes de menor importancia en nuestra configuración de Apache. Conforme a los tutoriales de los requisitos previos, debe tener un archivo de configuración para su sitio en el directorio /etc/apache2/sites-available/.
En esta guía, utilizaremos /etc/apache2/sites-available/wordpress.conf, pero debe sustituir la ruta a su archivo de configuración cuando proceda. Además, emplearemos /var/www/wordpresscomo el directorio root de nuestra instalación de WordPress. Debería usar el root web especificada en su propia configuración. Si siguió nuestro tutorial LAMP, puede ser su nombre de dominio en vez de wordpress en ambas instancias.

Con nuestras rutas identificadas, podemos pasar a trabajar con .htaccess de forma que Apache pueda manejar los cambios en la configuración directorio por directorio.
Habilitar reemplazos .htaccess
Actualmente, el uso de archivos .htaccess está desactivado. WordPress y muchos de sus complementos utilizan estos archivos de forma amplia para realizar ajustes de comportamiento del servidor web dentro del directorio.
Abra el archivo de configuración de Apache para su sitio web con un editor de texto como nano.

$ sudo nano /etc/apache2/sites-available/wordpress.conf
 
Para permitir archivos .htaccess, debemos configurar la directiva AllowOverride dentro de un bloque Directory orientado a nuestro root de documentos. Agregue el siguiente bloque de texto dentro del bloque VirtualHost en su archivo de configuración. Asegúrese de utilizar el directorio root web correcto:

/etc/apache2/sites-available/wordpress.conf
<Directory /var/www/wordpress/>
    AllowOverride All
</Directory>

Cuando termine, guarde y cierre el archivo. En nano, puede hacer esto pulsando CTRL y X juntos, luego Y, y luego ENTER.
Habilitar el módulo de reescritura
A continuación, podemos habilitar mod_rewrite para usar la característica de permalink de WordPress:

$ sudo a2enmod rewrite
 
Esto le permite tener permalinks a sus publicaciones más legibles por el ser humano, como en los siguientes dos ejemplos:
http://example.com/2012/post-name/
http://example.com/2012/12/30/post-name
El comando a2enmod invoca una secuencia de comandos que habilita el módulo especificado en la configuración Apache.
Habilitar los cambios
Antes de implementar los cambios realizados, compruebe que no hay errores de sintaxis ejecutando la siguiente prueba.

$ sudo apache2ctl configtest
 
Puede recibir un resultado como el siguiente:
Output
AH00558: apache2: Could not reliably determine the server's fully qualified domain name, using 127.0.1.1. Set the 'ServerName' directive globally to suppress this message
Syntax OK
Si desea eliminar la línea superior, simplemente agregue una directiva ServerName a su archivo de configuración principal (global) de Apache en /etc/apache2/apache2.conf. ServerName puede ser el dominio o la dirección IP de su servidor. Este es solo un mensaje, sin embargo, y no afecta a la funcionalidad de su sitio. En tanto el resultado contenga Sintaxis OK, podrá continuar.
Reinicie Apache para implementar los cambios: Asegúrese de reiniciar ahora, incluso si ha reiniciado anteriormente en este tutorial.

$ sudo systemctl restart apache2
 
A continuación, descargaremos y configuraremos el propio WordPress.
Paso 4: Descargar WordPress
Ahora que el software de nuestro servidor está configurado, podemos descargar y configurar WordPress. Preferentemente por motivos de seguridad, siempre se recomienda obtener la versión más reciente de WordPress del sitio del producto.
Cambie a un directorio que permita la escritura (recomendamos uno temporal como /tmp) y descargue la versión comprimida.

$ cd /tmp
$ curl -O https://wordpress.org/latest.tar.gz
 
Extraiga el archivo comprimido para crear la estructura de directorios de WordPress:

$ tar xzvf latest.tar.gz
 
Moveremos estos archivos a nuestro root de documentos por ahora. Antes de hacerlo, podemos añadir un archivo ficticio .htaccess de modo que esté disponible para que WordPress lo use más adelante.
Cree el archivo escribiendo lo siguiente:

$ touch /tmp/wordpress/.htaccess
 
También copiaremos sobre el archivo de configuración de muestra al nombre de archivo que lee WordPress:

$ cp /tmp/wordpress/wp-config-sample.php /tmp/wordpress/wp-config.php
 
También podemos crear el directorio de actualización, de modo que WordPress no tenga problemas de permisos al intentar hacerlo por su cuenta siguiendo una actualización a su software:

$ mkdir /tmp/wordpress/wp-content/upgrade
 
Ahora podemos copiar todo el contenido del directorio en nuestro root de documentos. Usaremos un punto al final de nuestro directorio de origen para indicar que todo lo que está dentro del directorio debe copiarse, incluyendo archivos ocultos (como el archivo .htaccess que hemos creado):

$ sudo cp -a /tmp/wordpress/. /var/www/wordpress
 
Asegúrese de sustituir el directorio /var/www/wordpress por el directorio que haya configurado en su servidor.
Paso 5: Configurar el directorio de WordPress
Antes de realizar la configuración basada en web de WordPress, debemos ajustar algunos elementos en nuestro directorio de WordPress.
Realizar ajustes de propiedad y permisos
Un paso importante que debemos lograr es configurar permisos de archivo razonables y la propiedad.
Empezaremos por dar la propiedad de todos los archivos al usuario y al grupo www-data. Este es el usuario como el que se ejecuta el servidor web Apache, y este último deberá poder leer y escribir archivos de WordPress para presentar el sitio web y realizar actualizaciones automáticas.
Actualice la propiedad con el comando chown que le permite modificar la propiedad del archivo. Asegúrese de apuntar al directorio relevante de su servidor.

$ sudo chown -R www-data:www-data /var/www/wordpress
 
A continuación, ejecutaremos dos comandos find para establecer los permisos correctos de los directorios y archivos de WordPress:

$ sudo find /var/www/wordpress/ -type d -exec chmod 750 {} \;
$ sudo find /var/www/wordpress/ -type f -exec chmod 640 {} \;
 
Estos permisos deberían hacer que pueda trabajar de forma efectiva con WordPress, pero tenga en cuenta que algunos complementos y procedimientos pueden requerir ajustes adicionales.
Configurar el archivo de configuración de WordPress
Ahora, debemos realizar algunos cambios en el archivo de configuración principal de WordPress.
Cuando abramos el archivo, nuestra primera tarea será ajustar algunas claves secretas para proporcionar un nivel de seguridad a nuestra instalación. WordPress proporciona un generador seguro para estos valores, para que no tenga que crear valores correctos por su cuenta. Solo se utilizan internamente, de modo que no dañará la usabilidad el tener valores complejos y seguros aquí.
Para obtener valores seguros del generador de claves secretas de WordPress, escriba lo siguiente:

$ curl -s https://api.wordpress.org/secret-key/1.1/salt/

Obtendrá valores únicos que se parecen al resultado del bloque siguiente.
Advertencia: Debe solicitar valores únicos cada vez. NO copie los siguientes valores.

Output
define('AUTH_KEY',         '1jl/vqfs<XhdXoAPz9 DO NOT COPY THESE VALUES c_j{iwqD^<+c9.k<J@4H');
define('SECURE_AUTH_KEY',  'E2N-h2]Dcvp+aS/p7X DO NOT COPY THESE VALUES {Ka(f;rv?Pxf})CgLi-3');
define('LOGGED_IN_KEY',    'W(50,{W^,OPB%PB<JF DO NOT COPY THESE VALUES 2;y&,2m%3]R6DUth[;88');
define('NONCE_KEY',        'll,4UC)7ua+8<!4VM+ DO NOT COPY THESE VALUES #`DXF+[$atzM7 o^-C7g');
define('AUTH_SALT',        'koMrurzOA+|L_lG}kf DO NOT COPY THESE VALUES  07VC*Lj*lD&?3w!BT#-');
define('SECURE_AUTH_SALT', 'p32*p,]z%LZ+pAu:VY DO NOT COPY THESE VALUES C-?y+K0DK_+F|0h{!_xY');
define('LOGGED_IN_SALT',   'i^/G2W7!-1H2OQ+t$3 DO NOT COPY THESE VALUES t6**bRVFSD[Hi])-qS`|');
define('NONCE_SALT',       'Q6]U:K?j4L%Z]}h^q7 DO NOT COPY THESE VALUES 1% ^qUswWgn+6&xqHN&%');
Son líneas de configuración que podemos pegar directamente en nuestro archivo de configuración para establecer claves seguras. Copie el resultado que obtuvo ahora.
A continuación, abra el archivo de configuración de WordPress:

$ sudo nano /var/www/wordpress/wp-config.php
 
Busque la sección que contiene los valores de ejemplo para esos ajustes.

/var/www/wordpress/wp-config.php
. . .

define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

. . .
 
Elimine esas líneas y pegue los valores que copió de la línea de comandos:
/var/www/wordpress/wp-config.php
. . .

define('AUTH_KEY',         'VALUES COPIED FROM THE COMMAND LINE');
define('SECURE_AUTH_KEY',  'VALUES COPIED FROM THE COMMAND LINE');
define('LOGGED_IN_KEY',    'VALUES COPIED FROM THE COMMAND LINE');
define('NONCE_KEY',        'VALUES COPIED FROM THE COMMAND LINE');
define('AUTH_SALT',        'VALUES COPIED FROM THE COMMAND LINE');
define('SECURE_AUTH_SALT', 'VALUES COPIED FROM THE COMMAND LINE');
define('LOGGED_IN_SALT',   'VALUES COPIED FROM THE COMMAND LINE');
define('NONCE_SALT',       'VALUES COPIED FROM THE COMMAND LINE');

. . .
 
A continuación, vamos a modificar algunos de los ajustes de conexión de la base de datos al principio del archivo. Debe ajustar el nombre de la base de datos, su usuario y la contraseña asociada que configuramos dentro de MySQL.
El otro cambio que debemos realizar es configurar el método que debe emplear WordPress para escribir el sistema de archivos. Debido a que hemos dado permiso al servidor web para escribir donde debe hacerlo, podemos fijar de forma explícita el método del sistema de archivos a “direct”. Si no lo configuramos con nuestros ajustes actuales, WordPress solicitaría las credenciales de FTP cuando realicemos algunas acciones.
Este ajuste se puede agregar debajo de los ajustes de conexión de la base de datos o en cualquier otra parte del archivo:
/var/www/wordpress/wp-config.php
. . .

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpressuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'password' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );


. . .

define('FS_METHOD', 'direct');
 
Guarde y cierre el archivo cuando termine.
Paso 6: Completar la instalación a través de la interfaz web
Ahora que la configuración del servidor está completa, podemos finalizar la instalación a través de la interfaz web.
En su navegador web, vaya al nombre de dominio o a la dirección IP pública de su servidor:
https://localhost
Seleccione el idioma que desee usar:







A continuación, accederá a la página principal de configuración.
Seleccione un nombre para su sitio WordPress y seleccione un nombre de usuario. Se recomienda elegir algo único y evitar nombres de usuario comunes como “admin” por motivos de seguridad. De forma automática, se generará una contraseña segura. Guárdela o seleccione una contraseña segura alternativa.
Introduzca su dirección de correo electrónico y defina si quiere que los motores de búsqueda no indexen su sitio:

 










Cuando haga clic para seguir, irá a una página que le pide que inicie sesión. 








Tras iniciar sesión, accederá al panel de administración de WordPress:






En este momento, puede comenzar a diseñar su sitio web WordPress. Si es la primera vez que utiliza WordPress, explore la interfaz un poco para conocer su nuevo CMS.
