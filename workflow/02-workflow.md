__Proyecto 3 - Puesta en contacto de empresarios con agricultores__

---

[Volver al listado](workflow.md)

---

# Flujo de trabajo con Github

Cada cambio en el repositorio estará provocado por una tarea creada en Github.

Para resolver cada tarea, se realizarán los siguientes pasos:

* A partir de la rama `main` sacaremos una nueva rama que llamaremos `i-NUMERO_TAREA`
* Trabajaremos sobre esa nueva rama (commits) actualizando los cambios en el repositorio (push)
* Cuando creamos terminada la tarea, crearemos una pull request de esta rama hacia la rama `main`
* Esta pull request ha de ser revisada por al menos un compañero
* Una vez revisada, se asignará al perfil QA, que es el único que podrá hacer merge a `main`, tras verificar que se ha resuelto correctametne la tarea.
   * En caso de encontrar errores, se indicarán en comentarios en la pull request y se asignará al responsable de la tarea para solventar el problema, e iniciando el flujo expuesto, de nuevo.

Cada tarea estará relacionada con un proyecto de Github.

Los proyectos proporcionan un panel kanban, así que iniciada una tarea, habrá que mover el estado de esta en ese tablero.
