# Prueba Técnica: CRUD de Usuarios y Tags de Usuarios

### Objetivo
Crear una aplicación en Laravel que permita gestionar usuarios y sus tags mediante operaciones CRUD (Create, Read, Update, Delete).

### Requisitos

#### Instalación y Configuración
- [✅] Crear proyecto de Laravel 10.x o superior.
- [✅] Configurar una base de datos MySQL.

#### Migraciones y Modelos
- [✅] Crear una migración para la tabla `users` con los siguientes campos:
  - [✅] `id` (autoincremental)
  - [✅] `name` (string)
  - [✅] `timestamps` (created_at, updated_at)
- [✅] Crear una migración para la tabla `tags` con los siguientes campos:
  - [✅] `id` (autoincremental)
  - [✅] `name` (string, único)
  - [✅] `timestamps` (created_at, updated_at)
- [✅] Crear una migración para la tabla `tag_user` (relación muchos a muchos entre usuarios y tags) con los siguientes campos:
  - [✅] `user_id` (foreign key)
  - [✅] `tag_id` (foreign key)
- [✅] Crear los modelos `User` y `Tag` y definir las relaciones necesarias.

#### Controladores
- [✅] Crear un controlador `UserController` con métodos para manejar las operaciones CRUD.
- [✅] Crear un controlador `TagController` con métodos para manejar las operaciones CRUD.

#### Rutas
- [✅] Definir rutas para los recursos `users` y `tags`.

#### Vistas

##### CRUD de Usuarios
- [✅] Crear vistas Blade para las operaciones CRUD de usuarios que permitan:
  - [✅] Listar todos los usuarios.
  - [✅] Crear un nuevo usuario.
  - [✅] Editar un usuario existente.
  - [✅] Eliminar un usuario existente.

##### CRUD de Tags
- [✅] Crear vistas Blade para las operaciones CRUD de tags que permitan:
  - [✅] Listar todos los tags.
  - [✅] Crear un nuevo tag.
  - [✅] Editar un tag existente.
  - [✅] Eliminar un tag existente.
- [✅] Añadir la funcionalidad para asignar y desasignar tags a los usuarios desde la vista de detalles del usuario.

#### Extras (Opcional)
- [✅] Crear seeders para poblar la base de datos.
- [✅] Implementar paginación en las vistas de listado de usuarios y tags.
- [✅] Añadir búsqueda por nombre en la lista de usuarios.
- [✅] Implementar validación de formularios.

### Entrega
- [✅] Crear un repositorio en GitHub y subir el código de la aplicación.
- [✅] Incluir un archivo `README.md` con instrucciones claras sobre cómo configurar y ejecutar la aplicación.
- [✅] Enviar el entregable al correo edwarsanz.nojau@gmail.com con copia a dani@nojau.co.
