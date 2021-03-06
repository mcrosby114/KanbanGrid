# KanbanGrid web application

A productivity tool to model your workflow as a grid of projects for the week.

Each day of the week gets a column, and each area/project gets a row. The user can then input tasks pertaining to each area/project – represented as text in moveable boxes. Then each task box can be dragged and dropped as things change.

The idea is modeled after the [“Kanban” workflow](https://en.wikipedia.org/wiki/Kanban).

## Highlights:
* Written purely with PHP, HTML, CSS, Javascript, MySQL (no frameworks)
* Designed database schema with full CRUD support for accounts, projects, tasks
* Designed with UX in mind (e.g., input validation, persistent and context-aware navigation)
* Security across the board:
  * Form inputs sanitized and validated on client and server (prepared statements, regular expressions)
  * Passwords salted and hashed
  * URL access restriction
* Supports session management, persisting state across pages (e.g., permissions, errors, login state)
* Supports account signup, login, logout
* Uses PHP data access object (a design pattern) for database operations
* Customizable grid layout, task boxes, colors, checkboxes
* Product branding, content pages
* JQuery enhancements: image gallery, tooltips, fading effects, AJAX data loading

##### https://mcrosby114.github.io/KanbanGrid/
##### https://github.com/mcrosby114/KanbanGrid
##### (old domain name: http://www.kanbangrid.com/)
