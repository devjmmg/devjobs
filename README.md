![DevJobs](/screenshots/devjobs.jpg)

# DevJobs

Plataforma web de vacantes y postulaciones desarrollada con Laravel y Livewire, enfocada en conectar candidatos con oportunidades laborales y proporcionar a los reclutadores herramientas para administrar sus ofertas de empleo y candidatos.

## Tecnologías

* **Laravel 12**
* **Livewire 4**
* **PHP**
* **Laravel Breeze**
* **Blade Components**
* **Tailwind CSS**
* **MySQL**
* **Mailtrap**
* **Alpine.js**
* **SweetAlert2**
* **Vite**

## Funcionalidades

### Candidatos

* Registro e inicio de sesión.
* Verificación de correo electrónico.
* Consulta de vacantes disponibles.
* Búsqueda y filtrado de vacantes.
* Visualización del detalle de cada vacante.
* Postulación a ofertas de empleo.
* Carga de CV durante la postulación.

### Reclutadores

* Registro e inicio de sesión como reclutador.
* Creación de vacantes.
* Administración de vacantes propias.
* Edición y eliminación de vacantes.
* Consulta de candidatos que se han postulado.
* Gestión de las postulaciones recibidas.

### Notificaciones

* Envío de correos electrónicos mediante Mailtrap.
* Notificaciones relacionadas con nuevas postulaciones.
* Comunicación entre las diferentes acciones del proceso de postulación.

## Conceptos aplicados

* Arquitectura MVC de Laravel.
* Autenticación mediante Laravel Breeze.
* Autorización basada en roles.
* Componentes Blade reutilizables.
* Componentes dinámicos con Livewire.
* Validación de formularios.
* Manejo de archivos y carga de CV.
* Relaciones entre modelos de Eloquent.
* Notificaciones y envío de correos electrónicos.
* Consultas y filtrado de información.
* Protección de rutas y recursos.
* Migraciones y seeders de base de datos.
* Variables de entorno para configuración de la aplicación.

## Livewire

Livewire se utiliza para construir interfaces interactivas sin depender de una arquitectura frontend independiente.

Entre las funcionalidades implementadas se encuentran:

* Búsqueda dinámica de vacantes.
* Filtrado de resultados.
* Formularios interactivos.
* Actualización de información sin recargar la página.
* Manejo de estados en componentes.
* Interacción entre componentes y la base de datos.

Esto permite mantener la lógica de la aplicación principalmente dentro del ecosistema Laravel, utilizando Blade y Livewire para la capa de presentación.

## Autenticación y roles

La autenticación se implementó utilizando Laravel Breeze.

La aplicación diferencia las funcionalidades disponibles dependiendo del rol del usuario:

```text
Usuario
├── Candidato
│   ├── Consultar vacantes
│   ├── Buscar y filtrar
│   ├── Ver detalles
│   ├── Postularse
│
└── Reclutador
    ├── Crear vacantes
    ├── Administrar vacantes
    ├── Consultar postulaciones
    └── Gestionar candidatos
```

El acceso a las diferentes funcionalidades se controla mediante autenticación y autorización.

## Manejo de postulaciones

El flujo principal de una postulación es:

```text
Candidato
    ↓
Consulta una vacante
    ↓
Revisa los requisitos
    ↓
Carga su CV
    ↓
Envía la postulación
    ↓
Se registra la postulación
    ↓
El reclutador recibe una notificación
    ↓
El reclutador consulta al candidato
```

Este flujo permite relacionar candidatos, vacantes y postulaciones dentro de la aplicación.

## Correos y notificaciones

La aplicación utiliza el sistema de notificaciones y correo de Laravel para comunicar eventos relacionados con las postulaciones.

Durante el desarrollo se utilizó **Mailtrap** para probar el envío de correos electrónicos sin utilizar un servidor de correo real.

## Interfaz

La interfaz está construida con Blade y Tailwind CSS, utilizando componentes reutilizables para mantener una estructura consistente en las diferentes vistas.

Para determinadas interacciones de la interfaz también se utilizan Livewire y Alpine.js.

## Instalación

Clonar el repositorio:

```bash
git clone https://github.com/devjmmg/devjobs.git
cd devjobs
```

Instalar las dependencias de PHP:

```bash
composer install
```

Instalar las dependencias de JavaScript:

```bash
npm install
```

Crear el archivo de configuración:

```bash
cp .env.example .env
```

Generar la clave de la aplicación:

```bash
php artisan key:generate
```

Configurar en `.env` las credenciales de la base de datos y los parámetros necesarios para el envío de correos.

Ejecutar las migraciones:

```bash
php artisan migrate
```

Iniciar Vite:

```bash
npm run dev
```

En otra terminal iniciar el servidor de Laravel:

```bash
php artisan serve
```

La aplicación estará disponible en:

```text
http://127.0.0.1:8000
```

## Demo

[Ver aplicación](https://devjobs-jmmg.mnz.dom.my.id/)

## Autor

Juan Manuel Martínez García

GitHub: [devjmmg](https://github.com/devjmmg)
