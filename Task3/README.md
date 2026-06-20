# Project Management Tool

## CodeAlpha Full Stack Development Internship - Task 3

### Overview
The Project Management Tool is a web-based application developed using PHP and MySQL that helps users manage projects and tasks efficiently. Users can create projects, assign tasks, update task status, and add comments for better collaboration.

This project was developed as part of the CodeAlpha Full Stack Development Internship.

---

## Features

### User Authentication
- User Registration
- User Login
- Session Management
- Secure Logout

### Project Management
- Create New Projects
- View All Projects
- Store Project Details in Database

### Task Management
- Create Tasks
- Assign Tasks to Users
- Set Task Deadlines
- Update Task Status
  - Pending
  - In Progress
  - Completed
- View All Tasks

### Comments System
- Add Comments to Tasks
- Store Comments in Database

### Dashboard
- Total Projects Count
- Total Tasks Count
- Completed Tasks Count
- Pending Tasks Count

---

## Technologies Used

### Frontend
- HTML5
- CSS3
- JavaScript

### Backend
- PHP

### Database
- MySQL

### Tools
- XAMPP
- phpMyAdmin
- Visual Studio Code

---

## Project Structure

```text
project-management-tool/

├── assets/
│   └── css/
│       └── style.css
│
├── comments/
│   └── add_comment.php
│
├── config/
│   └── db.php
│
├── dashboard/
│   └── dashboard.php
│
├── js/
│   └── script.js
│
├── projects/
│   ├── create_project.php
│   └── view_projects.php
│
├── tasks/
│   ├── create_task.php
│   └── view_tasks.php
│
├── login.php
├── register.php
├── logout.php
├── index.php
└── README.md
```

---

## Database Tables

### users
| Field | Type |
|---------|---------|
| id | INT |
| name | VARCHAR |
| email | VARCHAR |
| password | VARCHAR |

### projects
| Field | Type |
|---------|---------|
| id | INT |
| project_name | VARCHAR |
| description | TEXT |
| created_at | TIMESTAMP |

### tasks
| Field | Type |
|---------|---------|
| id | INT |
| project_id | INT |
| assigned_to | INT |
| task_name | VARCHAR |
| status | VARCHAR |
| deadline | DATE |

### comments
| Field | Type |
|---------|---------|
| id | INT |
| task_id | INT |
| comment | TEXT |
| created_at | TIMESTAMP |

---

## Installation Steps

### Step 1
Install XAMPP and start:

- Apache
- MySQL

### Step 2
Copy the project folder into:

```text
C:\xampp\htdocs\
```

### Step 3
Create a database named:

```sql
project_management
```

### Step 4
Import the SQL file:

```text
project_management.sql
```

### Step 5
Configure database settings in:

```text
config/db.php
```

### Step 6
Run the application:

```text
http://localhost/project-management-tool
```

---

## Project Workflow

1. Register a User
2. Login to the System
3. Create a Project
4. View Project Details
5. Create Tasks
6. Assign Tasks
7. Update Task Status
8. Add Comments
9. Monitor Dashboard Statistics
10. Logout

---

## Screenshots

- Registration Page
- Login Page
- Dashboard
- Create Project
- View Projects
- Create Task
- View Tasks
- Add Comment

---

## Learning Outcomes

Through this project, I gained practical experience in:

- PHP Development
- MySQL Database Management
- CRUD Operations
- User Authentication
- Session Handling
- Frontend Design
- Full Stack Web Development

