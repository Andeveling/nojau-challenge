

# CRUD de Usuarios y Tags de Usuarios en Laravel

Este proyecto implementa un CRUD (Create, Read, Update, Delete) de Usuarios y Tags de Usuarios utilizando Laravel.

![Texto alternativo](https://res.cloudinary.com/dg84upfsp/image/upload/v1720728543/Captura_desde_2024-07-11_15-07-39_d4dt3n.png)

## Requisitos

- PHP >= 8.1
- Composer
- MySQL

## Instalación

1. **Clonar el repositorio:**

   ```bash
   git clone https://github.com/Andeveling/nojau-challenge.git
   ```

2. **Instalar dependencias:**

   ```bash
   cd nojau-challenge
   composer install
   npm install
   ```

3. **Configurar el archivo `.env`:**

   - Crear una copia del archivo `.env.example` y renombrarla a `.env`:

     ```bash
     cp .env.example .env
     ```

   - Configurar la conexión a la base de datos en el archivo `.env`. Asegúrate de establecer correctamente los valores de `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` y `DB_PASSWORD`.

4. **Generar la clave de la aplicación:**

   ```bash
   php artisan key:generate
   ```

5. **Ejecutar las migraciones y seeders:**

   - Ejecutar las migraciones para crear las tablas en la base de datos:

     ```bash
     php artisan migrate
     ```

   - (Opcional) Poblar la base de datos con datos de prueba utilizando seeders:

     ```bash
     php artisan db:seed
     ```

6. **Iniciar el servidor de desarrollo:**

   ```bash
   php artisan serve
   ```

   El servidor de desarrollo estará disponible en `http://localhost:8000`.

7. **Iniciar node:**

   ```bash
   npm run dev
   ```

## Uso

- Accede a `http://localhost:8000/users` para gestionar los usuarios.
- Accede a `http://localhost:8000/users/{id}` para ver la info de cada usuario.
- Accede a `http://localhost:8000/users/create` para crear un usuario y asignarle tags.
- Accede a `http://localhost:8000/users/{id}/edit` para editar usuario y actualizar los tags.


- Accede a `http://localhost:8000/tags` para gestionar los tags.
- Accede a `http://localhost:8000/tags/{id}` para ver la info de cada tag.
- Accede a `http://localhost:8000/tags/create` para crear un tag.
- Accede a `http://localhost:8000/tags/{id}/edit` para editar un tag.


- Desde la vista de editar de cada usuario, puedes asignar y desasignar tags.

## Funcionalidades adicionales implementadas

- Paginación en las vistas de listado de usuarios y tags.
- Búsqueda por nombre en la lista de usuarios y tags.
- Validación de formularios tanto para usuarios como para tags.

## Contribución

Si encuentras algún problema o quieres contribuir al proyecto, por favor abre un issue o envía un pull request.


