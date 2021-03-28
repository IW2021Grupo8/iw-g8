__Proyecto 3 - Puesta en contacto de empresarios con agricultores__

---

[Volver al listado](workflow.md)

---

# Flujo de trabajo con Github

Cada cambio en el repositorio estará provocado por una tarea creada en Github.

Para resolver cada tarea, se realizarán los siguientes pasos:

1. Partir de la rama `main` actualizada.

   ```
   git checkout main
   git pull
   ```
2. A partir de la rama `main` sacaremos una nueva rama que llamaremos `i-NUMERO_TAREA`

   ```
   git checkout -b i-NUMERO_TAREA
   ```
   
3. Trabajaremos sobre esa nueva rama (commits) actualizando los cambios en el repositorio (push)

   ```
   git status
   git add .
   git commit -m "Descripción del cambio"
   ```
4. Cuando creamos terminada la tarea, subiremos los cambios a GitHub y crearemos una pull request (PR) de esta rama hacia la rama `main`

   ```
   git push origin i-NUMERO_TAREA
   ```

5. Esta pull request ha de ser revisada por al menos un compañero

6. Una vez revisado el contenido de la PR, se asignará al perfil QA, que es el único que podrá hacer merge a `main`, tras verificar que se ha resuelto correctametne la tarea.
   * En caso de encontrar errores, se indicarán en comentarios en la PR y se asignará al responsable de la tarea para solventar el problema, e iniciando el flujo expuesto, de nuevo.

Cada tarea estará relacionada con un proyecto de Github.

Los proyectos proporcionan un panel kanban, así que iniciada una tarea, habrá que mover el estado de esta en ese tablero.
