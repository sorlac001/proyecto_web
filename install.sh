#Pasar a la carpeta de la instalacion
cd /var/www/proyecto_web

#Copiar y asignar permisos a las llaves del certificado para https
cd archivosConfiguracion

mv proyecto_web.key /etc/ssl/private/
mv proyecto_web.crt /etc/ssl/certs/

chmod 664 /etc/ssl/certs/proyecto_web.crt
chmod 640 /etc/ssl/private/proyecto_web.key

#Copiar los virtualhost a las carpetas de apache
sed -i '127.0.0.1	www.mochilasrimo.com.mx' /etc/hosts

cd archivosConfiguracion

mv proyecto_web.conf /etc/apache2/sites-available
mv proyecto_web_ssl.conf /etc/apache2/sites-available

#Activar los virtualhost
a2ensite proyecto_web.conf
a2ensite proyecto_web_ssl.conf

a2enmod ssl

systemctl reload apache2
systemctl restart apache2

#Instalar la base de datos

cd /var/www/proyecto_web/archivosConfiguracion
su postgres
psql < scriptBD.sql

