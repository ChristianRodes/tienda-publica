# 🛒 Proyecto Tienda Online – PHP + MySQL + Stripe

Proyecto final de **Desarrollo Web en Entorno Servidor** consistente en una tienda online funcional desarrollada en **PHP**, con base de datos **MySQL**, sistema de usuarios, panel de administración, carrito de la compra y **pasarela de pago Stripe** en entorno sandbox.

El proyecto sigue una arquitectura clara separando lógica de negocio, acceso a datos y presentación, y está preparado para su despliegue en hosting compartido.

---

## 📌 Funcionalidades principales

### 👤 Usuarios
- Registro y login de usuarios
- Roles: `cliente` y `admin`
- Gestión de sesión segura mediante `$_SESSION`
- Acceso restringido al panel de administración
- Compra posible como usuario registrado o invitado

### 🛍️ Tienda
- Listado dinámico de productos desde base de datos
- Productos organizados por categorías
- Visualización de nombre, descripción y precio
- Solo productos activos visibles para el cliente
- Control total desde panel admin

### 🛒 Carrito de la compra
- Añadir productos al carrito
- Incrementar y disminuir unidades individualmente
- Eliminar productos del carrito
- Cálculo automático de subtotales y total
- Mensajes de confirmación al añadir productos
- Persistencia del carrito mediante sesión
- Posibilidad de seguir comprando sin salir de la tienda

### 💳 Pagos con Stripe
- Integración con **Stripe Checkout**
- Pago seguro en entorno sandbox (test)
- Redirección automática a Stripe
- Confirmación de pago
- Creación del pedido solo tras pago exitoso
- Manejo de estados de pedido (`pendiente`, `pagado`, `enviado`, `entregado`)
- Preparado para ampliación mediante **webhooks**

### 📦 Pedidos
- Creación de pedidos en base de datos
- Tabla de detalle de pedido (productos, cantidades y precios)
- Asociación opcional a usuario (permite compra como invitado)
- Persistencia de pedidos para futuras consultas

### 🔐 Panel de administración
- Acceso exclusivo para usuarios con rol `admin`
- Gestión de productos (crear, editar, activar/desactivar)
- Gestión de categorías
- Baja lógica de productos (no se eliminan de la BD)
- Separación clara entre zona pública y zona privada

---

## 🎨 Front-End (UI / UX)

El proyecto incorpora una **capa de presentación clara y funcional**, pensada para ser ampliada visualmente:

### Diseño
- Interfaz limpia y minimalista
- Navegación clara entre tienda, carrito y panel admin
- Separación visual entre contenido y acciones
- Mensajes claros para el usuario (feedback)

### Bootstrap
- Integración de **Bootstrap 5** para:
  - Maquetación responsive
  - Tablas, botones y formularios
  - Mejor experiencia de usuario
- Preparado para:
  - Cards de productos
  - Navbar responsive
  - Alertas visuales
  - Mejoras estéticas sin tocar la lógica PHP

El enfoque del front-end es **funcional y escalable**, priorizando la comprensión del código y su defensa en un contexto académico, sin perder la posibilidad de evolución visual.

---

## 🧱 Tecnologías utilizadas

- **PHP 8**
- **MySQL**
- **PDO** (consultas preparadas)
- **Stripe API**
- **Composer**
- **HTML5**
- **CSS**
- **Bootstrap 5**
- **Git / GitHub**
- **MAMP (entorno local)**

---

## 🗂️ Estructura del proyecto

# 🛒 Proyecto Tienda Online – PHP + MySQL + Stripe

Proyecto final de **Desarrollo Web en Entorno Servidor** consistente en una tienda online funcional desarrollada en **PHP**, con base de datos **MySQL**, sistema de usuarios, panel de administración, carrito de la compra y **pasarela de pago Stripe** en entorno sandbox.

El proyecto sigue una arquitectura clara separando lógica de negocio, acceso a datos y presentación, y está preparado para su despliegue en hosting compartido.

---

## 📌 Funcionalidades principales

### 👤 Usuarios
- Registro y login de usuarios
- Roles: `cliente` y `admin`
- Gestión de sesión segura mediante `$_SESSION`
- Acceso restringido al panel de administración
- Compra posible como usuario registrado o invitado

### 🛍️ Tienda
- Listado dinámico de productos desde base de datos
- Productos organizados por categorías
- Visualización de nombre, descripción y precio
- Solo productos activos visibles para el cliente
- Control total desde panel admin

### 🛒 Carrito de la compra
- Añadir productos al carrito
- Incrementar y disminuir unidades individualmente
- Eliminar productos del carrito
- Cálculo automático de subtotales y total
- Mensajes de confirmación al añadir productos
- Persistencia del carrito mediante sesión
- Posibilidad de seguir comprando sin salir de la tienda

### 💳 Pagos con Stripe
- Integración con **Stripe Checkout**
- Pago seguro en entorno sandbox (test)
- Redirección automática a Stripe
- Confirmación de pago
- Creación del pedido solo tras pago exitoso
- Manejo de estados de pedido (`pendiente`, `pagado`, `enviado`, `entregado`)
- Preparado para ampliación mediante **webhooks**

### 📦 Pedidos
- Creación de pedidos en base de datos
- Tabla de detalle de pedido (productos, cantidades y precios)
- Asociación opcional a usuario (permite compra como invitado)
- Persistencia de pedidos para futuras consultas

### 🔐 Panel de administración
- Acceso exclusivo para usuarios con rol `admin`
- Gestión de productos (crear, editar, activar/desactivar)
- Gestión de categorías
- Baja lógica de productos (no se eliminan de la BD)
- Separación clara entre zona pública y zona privada

---

## 🎨 Front-End (UI / UX)

El proyecto incorpora una **capa de presentación clara y funcional**, pensada para ser ampliada visualmente:

### Diseño
- Interfaz limpia y minimalista
- Navegación clara entre tienda, carrito y panel admin
- Separación visual entre contenido y acciones
- Mensajes claros para el usuario (feedback)

### Bootstrap
- Integración de **Bootstrap 5** para:
  - Maquetación responsive
  - Tablas, botones y formularios
  - Mejor experiencia de usuario
- Preparado para:
  - Cards de productos
  - Navbar responsive
  - Alertas visuales
  - Mejoras estéticas sin tocar la lógica PHP

El enfoque del front-end es **funcional y escalable**, priorizando la comprensión del código y su defensa en un contexto académico, sin perder la posibilidad de evolución visual.

---

## 🧱 Tecnologías utilizadas

- **PHP 8**
- **MySQL**
- **PDO** (consultas preparadas)
- **Stripe API**
- **Composer**
- **HTML5**
- **CSS**
- **Bootstrap 5**
- **Git / GitHub**
- **MAMP (entorno local)**

---

## 🗂️ Estructura del proyecto

# 🛒 Proyecto Tienda Online – PHP + MySQL + Stripe

Proyecto final de **Desarrollo Web en Entorno Servidor** consistente en una tienda online funcional desarrollada en **PHP**, con base de datos **MySQL**, sistema de usuarios, panel de administración, carrito de la compra y **pasarela de pago Stripe** en entorno sandbox.

El proyecto sigue una arquitectura clara separando lógica de negocio, acceso a datos y presentación, y está preparado para su despliegue en hosting compartido.

---

## 📌 Funcionalidades principales

### 👤 Usuarios
- Registro y login de usuarios
- Roles: `cliente` y `admin`
- Gestión de sesión segura mediante `$_SESSION`
- Acceso restringido al panel de administración
- Compra posible como usuario registrado o invitado

### 🛍️ Tienda
- Listado dinámico de productos desde base de datos
- Productos organizados por categorías
- Visualización de nombre, descripción y precio
- Solo productos activos visibles para el cliente
- Control total desde panel admin

### 🛒 Carrito de la compra
- Añadir productos al carrito
- Incrementar y disminuir unidades individualmente
- Eliminar productos del carrito
- Cálculo automático de subtotales y total
- Mensajes de confirmación al añadir productos
- Persistencia del carrito mediante sesión
- Posibilidad de seguir comprando sin salir de la tienda

### 💳 Pagos con Stripe
- Integración con **Stripe Checkout**
- Pago seguro en entorno sandbox (test)
- Redirección automática a Stripe
- Confirmación de pago
- Creación del pedido solo tras pago exitoso
- Manejo de estados de pedido (`pendiente`, `pagado`, `enviado`, `entregado`)
- Preparado para ampliación mediante **webhooks**

### 📦 Pedidos
- Creación de pedidos en base de datos
- Tabla de detalle de pedido (productos, cantidades y precios)
- Asociación opcional a usuario (permite compra como invitado)
- Persistencia de pedidos para futuras consultas

### 🔐 Panel de administración
- Acceso exclusivo para usuarios con rol `admin`
- Gestión de productos (crear, editar, activar/desactivar)
- Gestión de categorías
- Baja lógica de productos (no se eliminan de la BD)
- Separación clara entre zona pública y zona privada

---

## 🎨 Front-End (UI / UX)

El proyecto incorpora una **capa de presentación clara y funcional**, pensada para ser ampliada visualmente:

### Diseño
- Interfaz limpia y minimalista
- Navegación clara entre tienda, carrito y panel admin
- Separación visual entre contenido y acciones
- Mensajes claros para el usuario (feedback)

### Bootstrap
- Integración de **Bootstrap 5** para:
  - Maquetación responsive
  - Tablas, botones y formularios
  - Mejor experiencia de usuario
- Preparado para:
  - Cards de productos
  - Navbar responsive
  - Alertas visuales
  - Mejoras estéticas sin tocar la lógica PHP

El enfoque del front-end es **funcional y escalable**, priorizando la comprensión del código y su defensa en un contexto académico, sin perder la posibilidad de evolución visual.

---

## 🧱 Tecnologías utilizadas

- **PHP 8**
- **MySQL**
- **PDO** (consultas preparadas)
- **Stripe API**
- **Composer**
- **HTML5**
- **CSS**
- **Bootstrap 5**
- **Git / GitHub**
- **MAMP (entorno local)**

---

## 🗂️ Estructura del proyecto

# 🛒 Proyecto Tienda Online – PHP + MySQL + Stripe

Proyecto final de **Desarrollo Web en Entorno Servidor** consistente en una tienda online funcional desarrollada en **PHP**, con base de datos **MySQL**, sistema de usuarios, panel de administración, carrito de la compra y **pasarela de pago Stripe** en entorno sandbox.

El proyecto sigue una arquitectura clara separando lógica de negocio, acceso a datos y presentación, y está preparado para su despliegue en hosting compartido.

---

## 📌 Funcionalidades principales

### 👤 Usuarios
- Registro y login de usuarios
- Roles: `cliente` y `admin`
- Gestión de sesión segura mediante `$_SESSION`
- Acceso restringido al panel de administración
- Compra posible como usuario registrado o invitado

### 🛍️ Tienda
- Listado dinámico de productos desde base de datos
- Productos organizados por categorías
- Visualización de nombre, descripción y precio
- Solo productos activos visibles para el cliente
- Control total desde panel admin

### 🛒 Carrito de la compra
- Añadir productos al carrito
- Incrementar y disminuir unidades individualmente
- Eliminar productos del carrito
- Cálculo automático de subtotales y total
- Mensajes de confirmación al añadir productos
- Persistencia del carrito mediante sesión
- Posibilidad de seguir comprando sin salir de la tienda

### 💳 Pagos con Stripe
- Integración con **Stripe Checkout**
- Pago seguro en entorno sandbox (test)
- Redirección automática a Stripe
- Confirmación de pago
- Creación del pedido solo tras pago exitoso
- Manejo de estados de pedido (`pendiente`, `pagado`, `enviado`, `entregado`)
- Preparado para ampliación mediante **webhooks**

### 📦 Pedidos
- Creación de pedidos en base de datos
- Tabla de detalle de pedido (productos, cantidades y precios)
- Asociación opcional a usuario (permite compra como invitado)
- Persistencia de pedidos para futuras consultas

### 🔐 Panel de administración
- Acceso exclusivo para usuarios con rol `admin`
- Gestión de productos (crear, editar, activar/desactivar)
- Gestión de categorías
- Baja lógica de productos (no se eliminan de la BD)
- Separación clara entre zona pública y zona privada

---

## 🎨 Front-End (UI / UX)

El proyecto incorpora una **capa de presentación clara y funcional**, pensada para ser ampliada visualmente:

### Diseño
- Interfaz limpia y minimalista
- Navegación clara entre tienda, carrito y panel admin
- Separación visual entre contenido y acciones
- Mensajes claros para el usuario (feedback)

### Bootstrap
- Integración de **Bootstrap 5** para:
  - Maquetación responsive
  - Tablas, botones y formularios
  - Mejor experiencia de usuario
- Preparado para:
  - Cards de productos
  - Navbar responsive
  - Alertas visuales
  - Mejoras estéticas sin tocar la lógica PHP

El enfoque del front-end es **funcional y escalable**, priorizando la comprensión del código y su defensa en un contexto académico, sin perder la posibilidad de evolución visual.

---

## 🧱 Tecnologías utilizadas

- **PHP 8**
- **MySQL**
- **PDO** (consultas preparadas)
- **Stripe API**
- **Composer**
- **HTML5**
- **CSS**
- **Bootstrap 5**
- **Git / GitHub**
- **MAMP (entorno local)**

---

## 🗂️ Estructura del proyecto

tienda-publica/
│
├── admin/ # Panel de administración
│ ├── productos.php
│ ├── categorias.php
│ └── editar_producto.php
│
├── public/ # Zona pública
│ ├── index.php
│ ├── carrito.php
│ ├── finalizar_compra.php
│ ├── success.php
│ └── cancel.php
│
├── includes/ # Componentes reutilizables
│ ├── header.php
│ ├── footer.php
│ ├── menu.php
│ └── auth.php
│
├── config/ # Configuración
│ ├── db.php
│ └── stripe.php
│
├── vendor/ # Dependencias (Composer)
├── .gitignore
├── composer.json
└── README.md


---

## 🔐 Seguridad y buenas prácticas

- Uso de **PDO con consultas preparadas**
- Control de acceso por roles
- Claves privadas fuera del repositorio (`.gitignore`)
- Separación clara entre lógica, vistas y configuración
- No se confía en datos del cliente para estados críticos
- Estructura preparada para webhooks de Stripe

---

## 🚀 Estado del proyecto

✔️ Funcional  
✔️ Pagos reales en entorno sandbox  
✔️ Preparado para producción  
✔️ Defendible en examen  
✔️ Escalable (UI, webhooks, emails, facturación)

---

## 👨‍💻 Autor

**Christian Rodes Vidal**  
Proyecto académico – Desarrollo Web en Entorno Servidor
