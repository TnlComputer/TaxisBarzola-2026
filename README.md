# Taxis Barzola 2026

Sitio de [taxisbarzola.com.ar](https://www.taxisbarzola.com.ar): landing de venta de taxis 0KM y usados
(con o sin licencia, permuta del auto como parte de pago) + intranet de administración.

## Estructura

| Parte | Archivos |
|---|---|
| Landing pública | `index.php`, `nuevos.php`, `usados.php`, `detalle.php`, `contacto.php`, `inc/`, `assets/` |
| Intranet | `login.php`, `administracion.php`, `*Admin.php`, altas/bajas/cambios, `usuarios/` |
| Fotos de autos | `images/0km`, `images/usados` (las carga la intranet) |
| Herramientas (solo línea de comandos) | `herramientas/migrar_claves.php`, `herramientas/columnas_fotos.php` |

## Configuración (archivos que NO están en git)

- `inc/entorno.php` — base de datos y mails de la landing (ver `inc/entorno.example.php`).
- `Connections/credenciales.php` — base de datos de la intranet (ver `Connections/credenciales.example.php`).
- En desarrollo: `Connections/conexion.local.php` apunta a la base local.

## Seguridad

- Consultas preparadas en todo el sitio; contraseñas cifradas (bcrypt) con migración automática.
- Subidas de fotos validadas por contenido; las carpetas de imágenes no ejecutan scripts.
- `.htaccess`: HTTPS, HSTS, CSP estricta en la landing, bloqueo de carpetas internas.
- `.user.ini`: errores ocultos, cookie de sesión `HttpOnly`/`Secure`/`SameSite=Lax`.

## Desarrollo local

`php -S 127.0.0.1:8767` en esta carpeta, con `inc/entorno.php` y `Connections/conexion.local.php` apuntando al MySQL local.

## Licencia

Código bajo **GNU AGPL-3.0** (ver `LICENSE`). Fotos, videos, textos y la marca "Taxis Barzola"
pertenecen a Taxis Barzola; todos los derechos reservados.
