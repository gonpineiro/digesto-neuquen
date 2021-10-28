#### Digesto Neuquén

Busqueda de normas municipales históricas de la ciudad de Neuquén. Se realizo decretos y resoluciones.

El proyecto presenta las siguentes variables de entorno, configurado en `.env`


Nombre                               | Detalle
-------------                        | -------------
PROD                                 | Configuracion del entoro produccion o replica: `true || false`
BASE_FILE_PATH_DEV                   | URL Base del entorno de desarrollo, `entorno local`
BASE_FILE_PATH_PROD                  | URL Base del entorno de desarrollo, `entorno replica o producción`
APP_NAME                             | Nombre de la aplicación, no se utiliza esta variable
INDEX_URL                            | URL del index del proyecto, se utiliza para hacer la correcta redirección.

Para ver la configuración estandar se puede revisar el `.envexample`

Las normas que ya se encuentran implementadas son:

<b>1) Decretos</b>
Para realizar una busqueda por `decreto` es suficiente con ingresar el código sin la primera letra del nombre del archivo y sin los guiones, luego debe seleccionar el año solicitado

<b>Ejemplo:</b> para buscar el siguente archivo: `D-0045-70.PDF` se debe ingresar 45 en el campo de código y 1970 en el año.

<b>2) Resoluciones</b>
Para realizar una busqueda por `resolucion` es suficiente con ingresar el código sin la primera letra del nombre del archivo y sin los guiones, luego debe seleccionar el año solicitado

<b>Ejemplo:</b> para buscar el siguente archivo: `R-0368-95.pdf` se debe ingresar 368 en el campo de código y 1995 en el año.

<b>3) Ordenanzas:</b> redirecciona a una URL Externa
<b>4) Boletin Oficial</b>: redirecciona a una URL Externa

