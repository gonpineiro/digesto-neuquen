#### Digesto Neuquén

Busqueda de normas municipales históricas de la ciudad de Neuquén.

El proyecto presenta las siguentes variables de entorno, configurado en `.env`


Nombre                               | Detalle
-------------                        | -------------
PROD                                 | Configuracion del entoro produccion o replica: `true || false`
BASE_FILE_PATH_DEV                   | URL Base del entorno de desarrollo, `entorno local`
BASE_FILE_PATH_PROD                  | URL Base del entorno de desarrollo, `entorno replica o producción`
APP_NAME                             | Nombre de la aplicación, no se utiliza esta variable
INDEX_URL                            | URL del index del proyecto, se utiliza para hacer la correcta redirección.

Para ver la configuración estandar se puede revisar el `.envexample`