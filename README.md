# Sistema de Gestión de Biblioteca

Sistema de préstamos de libros desarrollado en Laravel.

## Repositorio
https://github.com/irmasaquiza/prueba-rda.git

---

## Estructura de Base de Datos

### Tabla: `libros`

| Campo | Tipo | Nullable | Default | Descripción |
|-------|------|----------|---------|-------------|
| id | bigint (PK) | NO | auto | Identificador único |
| titulo | string | NO | - | Título del libro |
| autor | string | SÍ | null | Autor del libro |
| disponibles | integer | NO | 1 | Cantidad de ejemplares disponibles |
| activo | boolean | NO | true | Estado activo/inactivo del libro |
| created_at | timestamp | SÍ | null | Fecha de creación |
| updated_at | timestamp | SÍ | null | Fecha de actualización |

---

### Tabla: `lectors`

| Campo | Tipo | Nullable | Default | Descripción |
|-------|------|----------|---------|-------------|
| id | bigint (PK) | NO | auto | Identificador único |
| nombre | string | NO | - | Nombre completo del lector |
| telefono | string | NO | - | Teléfono de contacto |
| direccion | string | SÍ | null | Dirección del lector |
| email | string | SÍ | null | Correo electrónico |
| activo | boolean | NO | true | Estado activo/inactivo del lector |
| created_at | timestamp | SÍ | null | Fecha de creación |
| updated_at | timestamp | SÍ | null | Fecha de actualización |

---

### Tabla: `prestamos`

| Campo | Tipo | Nullable | Default | Descripción |
|-------|------|----------|---------|-------------|
| id | bigint (PK) | NO | auto | Identificador único |
| libro_id | bigint (FK) | NO | - | Relación con tabla `libros` |
| lector_id | bigint (FK) | NO | - | Relación con tabla `lectors` |
| fecha_prestamo | date | NO | - | Fecha en que se realizó el préstamo |
| fecha_limite_devolucion | date | NO | - | Fecha límite para devolver el libro |
| fecha_devolucion_real | date | SÍ | null | Fecha real de devolución (null si no se ha devuelto) |
| estado | enum | NO | 'prestado' | Estado del préstamo: `prestado`, `devuelto`, `atrasado` |
| created_at | timestamp | SÍ | null | Fecha de creación |
| updated_at | timestamp | SÍ | null | Fecha de actualización |

---

## Relaciones
```
libros (1) ----< (N) prestamos (N) >---- (1) lectors
```

- **libros → prestamos**: Un libro puede tener muchos préstamos (1:N)
- **lectors → prestamos**: Un lector puede tener muchos préstamos (1:N)
- **Restricción**: `onDelete('restrict')` - No se pueden eliminar libros o lectores con préstamos activos

---

## Reglas de Validación

### Préstamos
- La `fecha_limite_devolucion` debe ser igual o posterior a la `fecha_prestamo`
- La `fecha_prestamo` no puede ser anterior al día actual
- La `fecha_limite_devolucion` no puede ser anterior al día actual

---

## Instalación
```bash
# Clonar repositorio
git clone https://github.com/irmasaquiza/prueba-rda.git

# Instalar dependencias
composer install

# Configurar .env
cp .env.example .env

# Generar key
php artisan key:generate

# Migrar base de datos
php artisan migrate

# Iniciar servidor
php artisan serve
```

---

## Autor
Ignacio Masaquiza