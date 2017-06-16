# KanbanGrid website
##### (old domain name: http://www.kanbangrid.com/)

## Description:
A productivity organizer for visualizing and adjusting your projects and tasks for the week. 
Each day of the week gets a column, and each area/project gets a row. The user can then input tasks pertaining to each area/project – represented as text in moveable boxes. Then each task box can be dragged and dropped as things change.
The idea is modeled after the “Kanban” workflow: (https://en.wikipedia.org/wiki/Kanban)

## Features:
* written purely with PHP, HTML, CSS, Javascript (no frameworks)
* designed database schema with full CRUD support for accounts, projects, tasks
* UX considerations (input validation, persistent and context-aware navigation)
* security: form inputs sanitized and validated (prepared statements, regular expressions), passwords hashed, URL access restriction, client side input sanitizing
* session management (PHP), persisting state across pages (permissions, errors, login state)
* account signup, login, logout
* data access object (PDO, design pattern)
* customizable grid layout, task boxes, colors, checkboxes
* product branding, content pages
* JQuery: image gallery, tooltips, fading effects, AJAX data loading 
