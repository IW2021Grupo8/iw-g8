__Proyecto 3 - Puesta en contacto de empresarios con agricultores__

---

[Volver al listado](workflow.md)

---

# Repositorio

Para iniciar el trabajo con Git, hay que tener bien configurado nuestro entorno de trabajo:

1. Descarga

> git clone https://github.com/IW2021Grupo8/iw-g8.git

2. Configuración de tu usuario

> git config --global user.name "Nombre completo"
>
> git config --global user.email tuemail@uco.es

3. Configuración de hooks para git

> git config core.hooksPath .githooks

Estos hooks impedirán que trabajemos directamente con la rama principal, ya que es más recomendable que cualquier modificación en el repositorio se haga mediante ramas y pull request.
