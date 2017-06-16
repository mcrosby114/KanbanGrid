# KanbanGrid website
##### (old domain name: http://www.kanbangrid.com/)

## Description:
A productivity organizer for visualizing and adjusting your projects and tasks for the week. 

Each day of the week gets a column, and each area/project gets a row. The user can then input tasks pertaining to each area/project – represented as text in moveable boxes. Then each task box can be dragged and dropped as things change.

The idea is modeled after the [“Kanban” workflow:](https://en.wikipedia.org/wiki/Kanban)

## Features:
* Written purely with PHP, HTML, CSS, Javascript (no frameworks)
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
