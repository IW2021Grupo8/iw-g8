__Proyecto 3__ - Puesta en contacto de empresarios con agricultores__

---

[Volver al listado](p2.md)

---

# Requisitos funcionales

En este apartado, vamos a indicar los requisitos funcionales del producto.

Estos requisitos conformas las funcionalidades que nuestro sistema debe satisfacer para un correcto cumplimiento de su propósito.

## Requisitos de información
__RF-1__ Los usuarios contarán con la información: nombre de usuario, nombre, apellidos, correo electrónico, contraseña y tipo de usuario.

__RF-2__ Las empresas contarán con la información: nombre, CIF, domicilio fiscal y país.

__RF-3__ Los usuarios empresarios estarán asociados a una empresa.

__RF-4__ Los usuarios agricultores completarán su información con: DNI/NIE, tipos de cultivos, maquinaria y disponibilidad laboral.

__RF-5__ Los usuarios agricultores podrán, opcionalmente, formar parte de una o varias cuadrillas.

__RF-6__ El sistema deberá almacenar información relativa a ofertas de empleo, concretamente, un título, descripción, empresa a la que pertenece, fecha de incorporación, duración, tipo de cultivo.

## Requisitos de proceso o área de negocio

Los requisitos de proceso, describen los objetivos del usuario o tareas que los usuarios deben de ser capaces de ejecutar con el producto.

__RF-7__ El sistema deberá permitir el registro de nuevos usuarios en la plataforma, diferenciando según el tipo (empresarios, agricultores).

__RF-8__ El sistema deberá permitir a los usuarios autorizados (administradores) el registro de nuevos usuarios administradores.

__RF-9__ El sistema deberá enviar un correo electrónico al usuario cuando se produzca una de las siguientes transacciones:

* Registro de un usuario
* Solicitud de cambio de contraseña
* Publicación de una oferta de empleo
* Inscripción a una oferta de empleo
* Aceptación de una solicitud a una oferta de empleo

__RF-10__ El sistema deberá enviar un correo electrónico al usuario cuando se produzca una de las siguientes transacciones (baja):

* Baja de una inscripción a una oferta de empleo.
* Rechazo de una solicitud a una oferta de empleo.
* Baja de una publicación de oferta de empleo

__RF-11__ El sistema permitirá a los usuarios autorizados (administradores) consultar toda la información de la plataforma, pudiendo denegar el acceso a usuarios que hagan un uso indebido.

__RF-12__ Todo usuario autorizado (empresario) estará relacionado con una empresa, pudiendo ésta estar asociada a uno o más usuarios de este tipo.

__RF-13__ El sistema permitirá a los usuarios autorizados (empresarios) a crear, actualizar, publicar y ocultar ofertas de empleo.

__RF-14__ Los usuarios autorizados (empresarios) podrán consultar la información relacionada con los usuarios inscritos en una oferta.

__RF-15__ Los usuarios autorizados (empresarios) podrán aceptar o rechazar las inscripciones a una de sus ofertas de empleo.

__RF-16__ Los usuarios autorizados (empresarios) podrán hacer comentarios y puntuar a los usuarios agricultores con los que han trabajado.

__RF-17__ Toda oferta de empleo ha de estar relacionada con una única empresa.

__RF-18__ Cada oferta de empleo deberá tener un identificador único, que será utilizado para identificarla en todos los procesos que se realicen con ella.

__RF-19__ Los usuarios autorizados (empresarios) podrán realizar búsquedas de agricultores con disponibilidad, en relación a las características de cada de sus ofertas de trabajo.

__RF-20__ Los usuarios autorizados (empresarios) podrán sugerir ofertas de empleo a agricultores con disponibilidad.

__RF-21__ El sistema permitirá a los usuarios autorizados (agricultores) detallar su curriculum y especificar su disponibilidad laboral.

__RF-22__ Los usuarios autorizados (agricultores) podrán añadir información acerca de la maquinaria de la cual dispone él y/o su cuadrilla o grupo.

__RF-23__ Los usuarios autorizados (agricultores) podrán realizar búsquedas, en base a diferentes criterios, sobre las ofertas de trabajos publicadas.

__RF-24__ Los usuarios autorizados (agricultores) podrán inscribirse o darse de baja de ofertas de empleo.

__RF-25__ Los usuarios autorizados (agricultores) podrán consultar en cualquier momento, las ofertas de empleo a las que se han inscrito o que han sido sugeridas personalmente por empresarios.

__RF-26__ Los usuarios autorizados (agricultores) podrán hacer comentarios y puntuar a las empresas con las que han trabajado.

__RF-27__ El sistema deberá permitir registrar una cuadrilla de agricultores, es decir, crear un grupo con varios perfiles unidos a un perfil principal.

## Requisitos de interfaz gráfica

En relación a la información de usuarios:

__RF-28__ El campo nombre de acceso del usuario acepta caracteres alfanuméricos, sin espacios.

__RF-29__ El campo nombre del usuario acepta caracteres alfabéticos únicamente.

__RF-30__ El campo apellidos del usuario acepta caracteres alfabéticos únicamente.

__RF-31__ El campo contraseña de acceso deberá contener al menos 1__ mayúscula, 1__ minúscula, 1__ número y tener al menos 8__ caracteres.

En relación a la información de empresas:

__RF-32__ El campo del nombre de la empresa acepta caracteres alfanuméricos.

__RF-33__ El campo CIF de empresa ha de cumplir el patrón acorde al formato español.

__RF-34__ El campo dirección acepta caracteres alfabéticos, numéricos y especiales.

__RF-35__ El campo estado o provincia consistirá en una lista de preselección. A los usuarios se les presentará únicamente los estados asociados al país seleccionado previamente.

__RF-36__ El campo país consistirá en una lista de preselección. El país asociado a una dirección debe ser previamente registrado en el sistema.

En relación a la puntuación/comentarios a empresarios:

__RF-37__ El campo de puntuación a empresario consistirá en una lista de preselección.

__RF-38__ El campo comentario a empresario acepta caracteres alfanuméricos.

En relación a la información de agricultores:

__RF-39__ El campo DNI/NIE ha de cumplir el patrón acorde al formato español.

__RF-40__ El campo tipos de cultivo consistirá en una lista de preselección múltiple.

En relación a la puntuación/comentarios a agricultores:

__RF-41__ El campo puntuación a agricultor consistirá en una lista de preselección.

__RF-42__ El campo comentario a agricultor acepta caracteres alfanuméricos.

## Relacionado con las ofertas de empleo:

__RF-43__ El campo título de oferta acepta caracteres alfanuméricos.

__RF-44__ El campo descripción de oferta acepta caracteres alfanuméricos.

__RF-45__ El campo tipos de cultivo consistirá en una lista de preselección múltiple.

__RF-46__ El campo lugar del trabajo acepta caracteres alfanuméricos.

__RF-47__ El campo fecha de publicación acepta únicamente fechas posteriores al día de hoy (día actual).

__RF-48__ El campo inicio del trabajo acepta únicamente fechas posteriores al día de hoy (día actual).

__RF-49__ El campo duración del trabajo acepta únicamente números, para indicar días.

## Requisitos de seguridad

__RF-50__ El sistema controlará el acceso y lo permitirá solamente a usuarios autorizados. Los usuarios deben ingresar al sistema con un nombre de usuario y contraseña.

__RF-51__ Cualquier intercambio de datos vía internet que realice el software se realizará por medio del protocolo encriptado https.

__RF-52__ Los usuarios autorizados (empresarios) sólo podrán consultar y modificar ofertas de empleo asociadas a su empresa.

__RF-53__ Los usuarios autorizados (agricultores) solo podrán rechazar ofertas a las que se hayan inscrito previamente.

## Requisitos de interfaces externas

__RF-54__ La aplicación debe poder utilizarse sin necesidad de instalar ningún software adicional desde un navegador web.
__RF-55__ La aplicación debe poder utilizarse con los navegadores web Chrome, Firefox, Internet Explorer y Safari.