# INSTRUCCIONES

1. Importar la base de datos en el phpmyadmin
    - Crear una nueva base de datos llamada "inventory_management" desde el panel phpmyadmin
    - Seleccionar la Base de datos Creada Anteriormente
    - Dar Click en la pestaña "Importar"
    - Importar el script sql de la base de datos se encuentra en la carpeta "db/inventory_management.sql"
    
2. Descomprimir el archivo del proyecto

3. Guardar la carpeta descargada en la ruta correspondiente para acceder a ella localmente: "htdocs" si es XAMPP o "www" si es WAMP

4. Para acceder al CRUD de los productos es necesario iniciar sesion con las siguientes Credenciales
    - User: admin@admin.com
    - Password: admin

#SENTENCIAS SQL SOLICITADAS

Select del producto con más stock:

    SELECT * FROM products ORDER BY stock  DESC LIMIT 1;



Select del producto más vendido:

    SELECT *, COUNT(sales.product_id) AS ventas FROM products LEFT JOIN sales ON products.id = sales.product_id GROUP BY sales.product_id ASC LIMIT 1;


De igual manera estas sentencias tambien se encuentran dentro del proxecto en un archivo de texto


