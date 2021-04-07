__Proyecto 3 - Puesta en contacto de empresarios con agricultores__

---

[Volver al listado](p2.md)

---

# Requisitos funcionales

En este apartado, vamos a indicar los requisitos funcionales del producto.

Estos requisitos conformas las funcionalidades que nuestro sistema debe satisfacer para un correcto cumplimiento de su propósito.

## Requisitos de información

__RF-001__ Los usuarios contarán con la información: nombre de usuario, nombre, apellidos, contraseña y tipo de usuario.

__RF-002__ Las empresas contarán con la información: nombre, CIF, domicilio fiscal y país.

__RF-003__ Los usuarios empresarios estarán asociados a una empresa.

__RF-004__ Los usuarios agricultores completarán su información con: DNI/NIE, tipos de cultivos, maquinaria y disponibilidad laboral.

__RF-004__ Los usuarios agricultores podrán, opcionalmente, formar parte de una o varias cuadrillas.

__RF-005__ El sistema deberá almacenar información relativa a ofertas de empleo, concretamente, un título, descripción, empresa a la que pertenece, fecha de incorporación, duración, tipo de cultivo.


## Requisitos de proceso o área de negocio

Los requisitos de proceso describen los objetivos del usuario o tareas que los usuarios deben de ser capaces de ejecutar con el producto.

__RF-006__ El sistema deberá permitir el registro de nuevos usuarios en la plataforma, diferenciando según el tipo (empresarios, agricultores).

__RF-007__ El sistema deberá permitir a los usuarios autorizados (administradores) el registro de nuevos usuarios administradores.

__RF-008__ El sistema enviará un correo electrónico al usuario cuando se produzca una de las siguientes transacciones:
* Registro de un usuario
* Solicitud de cambio de contraseña
* Publicación y baja de una oferta de empleo
* Inscripción o baja de una oferta de empleo
* Aceptación o rechazo de una solicitud a una oferta de empleo

__RF-009__ El sistema permitirá a los usuarios autorizados (administradores) consultar toda la información de la plataforma, pudiendo denegar el acceso a usuarios que hagan un uso indebido.

__RF-010__ Todo usuario autorizado (empresario) estará relacionado con una empresa, pudiendo esta estar asociada a uno o más usuarios de este tipo.

__RF-011__ El sistema permitirá a los usuarios autorizados (empresarios) a crear, actualizar, publicar y ocultar ofertas de empleo.

__RF-012__ Los usuarios autorizados (empresarios) podrán consultar la información relacionada con los usuarios inscritos en una oferta.

__RF-013__ Los usuarios autorizados (empresarios) podrán aceptar o rechazar las inscripciones a una de sus ofertas de empleo.

__RF-014__ Los usuarios autorizados (empresarios) podrán hacer comentarios y puntuar a los usuarios agricultores con los que han trabajado.

__RF-015__ Toda oferta de empleo ha de estar relacionada con una única empresa.

__RF-016__ Cada oferta de empleo deberá tener un identificador único, que será utilizado para identificarla en todos los procesos que se realicen con ella.

__RF-017__ Los usuarios autorizados (empresarios) podrán realizar búsquedas de agricultores con disponibilidad, en relación a las características de cada de sus ofertas de trabajo.

__RF-018__ Los usuarios autorizados (empresarios) podrán sugerir ofertas de empleo a agricultores con disponibilidad.

__RF-019__ El sistema permitirá a los usuarios autorizados (agricultores) detallar su curriculum y especificar su disponibilidad laboral.

__RF-020__ Los usuarios autorizados (agricultores) podrán añadir información acerca de la maquinaria de la cual dispone él y/o su cuadrilla o grupo.

__RF-021__ Los usuarios autorizados (agricultores) podrán realizar búsquedas, en base a diferentes criterios, sobre las ofertas de trabajos publicadas.

__RF-022__ Los usuarios autorizados (agricultores) podrán inscribirse o darse de baja de ofertas de empleo.

__RF-023__ Los usuarios autorizados (agricultores) podrán consultar en cualquier momento, las ofertas de empleo a las que se han inscrito o que han sido sugeridas personalmente por empresarios.

__RF-024__ Los usuarios autorizados (agricultores) podrán hacer comentarios y puntuar a las empresas con las que han trabajado.

__RF-025__ El sistema deberá permitir registrar una cuadrilla de agricultores, es decir, crear un grupo con varios perfiles unidos a un perfil principal.

### Requisitos de interfaz gráfica

En relación a la información de usuarios:

__RF-026__ El campo nombre de acceso del usuario acepta caracteres alfanuméricos, sin espacios.

__RF-027__ El campo nombre del usuario acepta caracteres alfabéticos únicamente.

__RF-028__ El campo apellidos del usuario acepta caracteres alfabéticos únicamente.

__RF-029__ El campo contraseña de acceso deberá contener al menos 1 mayúscula, 1 minúscula, 1 número y tener al menos 8 caracteres.

En relación a la información de empresas:

__RF-030__ El campo nombre de empresa acepta caracteres alfanuméricos.

__RF-031__ El campo CIF de empresa ha de cumplir el patrón acorde al formato español.

__RF-032__ El campo dirección acepta caracteres alfabéticos, numéricos y especiales.

__RF-033__ El campo estado o provincia consistirá en una lista de preselección. A los usuarios se les presentará únicamente los estados asociados al país seleccionado previamente.

__RF-034__ El campo país consistirá en una lista de preselección. El país asociado a una dirección debe ser previamente registrado en el sistema.

En relación a la puntuación/comentarios a empresarios:

__RF-035__ El campo puntuación a empresario consistirá en una lista de preselección.

__RF-036__ El campo comentario a empresario acepta caracteres alfanuméricos.

En relación a la información de agricultores:

__RF-037__ El campo DNI/NIE ha de cumplir el patrón acorde al formato español.

__RF-038__ El campo tipos de cultivo consistirá en una lista de preselección multiple.

En relación a la puntuación/comentarios a agrigultores:

__RF-039__ El campo puntuación a agrigultor consistirá en una lista de preselección.

__RF-040__ El campo comentario a agrigultor acepta caracteres alfanuméricos.

Relacionado con las ofertas de empleo:

__RF-041__ El campo título de oferta acepta caracteres alfanuméricos.

__RF-042__ El campo descripción de oferta acepta caracteres alfanuméricos.

__RF-043__ El campo tipos de cultivo consistirá en una lista de preselección multiple.

__RF-044__ El campo lugar del trabajo acepta caracteres alfanuméricos.

__RF-045__ El campo fecha de publicación acepta únicamente fechas posteriores al día de hoy (día actual).

__RF-046__ El campo inicio del trabajo acepta únicamente fechas posteriores al día de hoy (día actual).

__RF-047__ El campo duración del trabajo acepta únicamente números, para indicar días.


## Requisitos de seguridad

__RF-048__ El sistema controlará el acceso y lo permitirá solamente a usuarios autorizados. Los usuarios deben ingresar al sistema con un nombre de usuario y contraseña.

__RF-049__ Cualquier intercambio de datos vía internet que realice el software se realizará por medio del protocolo encriptado https.

__RF-050__ Los usuarios autorizados (empresarios) solo podrán consultar y modificar ofertas de empleo asociadas a su empresa.

__RF-051__ Los usuarios autorizados (agricultores) solo podrán rechazar ofertas a las que se hayan inscrito previamente.


## Requisitos de interfaces externas

__RF-052__ El software podrá ser utilizado en los sistemas operativos Windows, Linux/Android y OSX.

__RF-053__ La aplicación debe poder utilizarse sin necesidad de instalar ningún software adicional desde un navegador web.

__RF-054__ La aplicación debe poder utilizarse con los navegadores web Chrome, Firefox, Internet Explorer y Safari.