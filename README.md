# 🏗️ MercarQ — Gestión y Venta de Planos Arquitectónicos

> 💬 *Colaboración en el desarrollo de una plataforma para gestionar y comprar planos arquitectónicos.
  Proyecto realizado para estudiantes de bachillerato como trabajo de grado.*

---

### 🧠 Descripción
**MercarQ** es una plataforma web desarrollada con **Laravel y Docker** que permite gestionar, visualizar y adquirir planos de arquitectura de forma digital. El sistema automatiza el proceso de compra y contacto con la empresa mediante **códigos de compra** y **envío automático por WhatsApp**, ofreciendo una experiencia de usuario ágil y moderna. 

Mi participación en el proyecto se centró en la **implementación de Docker**, la **configuración de variables de entorno** y la **creación del sistema de códigos de compra**, así como la integración con WhatsApp y la optimización de vistas y tablas internas.
  
---

### 🧩 Características principales
  - 🐳 Implementación de Docker para el despliegue y estandarización del entorno.
  - ⚙️ Configuración y actualización de variables de entorno para credenciales y settings.
  - 💳 Desarrollo del sistema de códigos de compra y registro automático en base de datos.
  - 💬 Integración con WhatsApp para el envío automático de mensajes tras la compra.
  - 🧭 Optimización de vistas y UX, mejorando la navegación y experiencia del usuario.
  - 🔍 Implementación de filtros dinámicos en tablas para la gestión de planos y usuarios.

---

### 🛠️ Tecnologías Utilizadas
- **Backend:** PHP, Laravel 
- **Frontend:** HTML5, CSS3, JavaScript
- **Base de Datos:** MySQL
- **Insfraestructura:** Docker

---

### ⚙️ Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/Enzen544/Mercarq.git
   ```
2. Copia el archivo de ejemplo de variables de entorno y configúralo.:
   ```bash
   cp .env.example .env
   ```
   Luego edita el archivo `.env` para definir tus credenciales de base de datos, URLs y claves necesarias.
3. Construye los contenedores de Docker:
   ```bash
   docker-compose up -d
   ```
   Esto levantará el entorno completo de Laravel, PHP, MySQL y Nginx.
4. Ejecuta las migraciones y el seeding inicial.
   ```bash
   docker exec -it app php artisan migrate --seed
   ```
    Luego accede a `http://localhost` en tu navegador para visualizar la aplicación.

---

### 🚀 Uso
  La plataforma permite:
  - Visualizar y gestionar planos arquitectónicos.
  - Realizar compras mediante códigos únicos.
  - Recibir confirmaciones automáticas por WhatsApp.
  - Administrar contenido desde un panel interno seguro.

  Ideal para empresas o estudios de arquitectura que deseen **digitalizar la venta y entrega de planos**
  con trazabilidad y control de inventario.

---

### 🧩 Estructura del Proyecto
```plaintext
  📦 MercarQ
   ┣ 📂 app/                  # Lógica principal del backend Laravel (modelos, controladores)
   ┣ 📂 bootstrap/            # Configuración inicial de Laravel
   ┣ 📂 config/               # Archivos de configuración del framework
   ┣ 📂 database/             # Migraciones y seeders
   ┣ 📂 public/               # Archivos públicos (index.php, assets)
   ┣ 📂 resources/            # Vistas Blade, componentes y recursos del frontend
   ┣ 📂 routes/               # Definición de rutas web y API
   ┣ 📂 storage/              # Archivos generados y logs
   ┣ 📂 tests/                # Pruebas unitarias y funcionales
   ┣ 🐳 docker-compose.yml    # Configuración del entorno Docker
   ┣ 📜 .env.example          # Ejemplo de variables de entorno
   ┣ 📜 artisan               # CLI de Laravel
   ┣ 📜 composer.json         # Dependencias PHP
   ┣ 📜 package.json          # Dependencias JS
   ┣ 📜 README.md             # Documentación del proyecto
   ┗ 📜 .gitignore
```

---

### 👨‍💻 Autor
  Creador y programador principal: **[Enzen544](https://github.com/Enzen544)**. 🧩 | 
  Colaboración técnica de **[Niiw.Dev](https://github.com/Niiw-dev)**. 🔥  
  Desarrollo y soporte técnico en Docker, entorno y sistema de compras
