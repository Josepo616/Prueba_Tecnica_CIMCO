# Sistema de inventarios 

Técnologias usadas

- Laravel en su version 11
- MySQL utilizando wampserver
- Javascript
- blade


Logica de negocio 

La lógica manejada en el proyecto ha sido a traves del model MVC que trae Laravel, y utilizando las migraciones se crean las tablas y la base de datos a utilizar con sus respectivas relaciones, llaves primarias y foraneas 

las pantallas basicamente son en primera instancia el login y desde ahí acceder a un sing in por el cual son rutas publicas

una vez el usuario accede correctamente tenemos la pagina principal en la cual nos permite 4 diferentes apartados, los cuales son productos, proveedores, transacciones, usuarios
en productos es basicamente un crud completo donde se pueden realizar entradas de nuevos productos y ajustes, entradas y salidas de ya existentes. Si se hace una de un nuevo producto se maneja la opcion de añadir a un nuevo proveedor por si no se tiene registrado

proveedores vendría a ser crear y listar proveedores

transacciones sería listar basicamente todas las transacciones

y el apartado de usuarios que lastimosamente no complete de implementar su verdarea funcion la cual era que yo como administrador tener acceso a todos los usuarios y poder crear o eliminar y eso sería manejado a traves de roles de empleados y admin, pero como les comento no pude implementarla así que basicamente cualquiera tiene acceso a ellos (cualquier usuario dentro)


En el apartado del front tambien quedé un poco corto, estuve intentando varias tecnologias.
- React
- Javascript
- Vue
- Angular

Pero no logré integrar correctamente mi backend y por cuestiones de tiempo prefería utiliar las vistast blade que basicamente son anotaciones php conjugadas con html, y javascript en unos casos y así mismo estilizarlas con marcados css y bootstrap 
