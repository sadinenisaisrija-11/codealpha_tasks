# Social Media Platform

## CodeAlpha Full Stack Development Internship - Task 2

### Project Overview
This project is a Mini Social Media Platform developed as part of the CodeAlpha Full Stack Development Internship.

The application allows users to register, log in, create posts, like posts, comment on posts, follow other users, and manage their profiles. The project demonstrates full-stack web development using PHP, MySQL, HTML, CSS, and JavaScript.

---

## Features

### User Authentication
- User Registration
- User Login
- Secure Password Storage
- Session Management
- Logout Functionality

### User Profile
- View User Profile
- Profile Information Display
- Profile Picture Support
- User Activity Overview

### Posts
- Create New Posts
- View Posts Feed
- Upload Images with Posts
- Display Posts in Chronological Order

### Likes & Comments
- Like Posts
- View Total Likes
- Add Comments
- Display Comments on Posts

### Follow System
- Follow Users
- Unfollow Users
- Followers Count
- Following Count

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

---

## Database Tables

### Users
- id
- username
- email
- password
- profile_pic
- created_at

### Posts
- id
- user_id
- content
- image
- created_at

### Comments
- id
- post_id
- user_id
- comment
- created_at

### Likes
- id
- post_id
- user_id

### Followers
- id
- follower_id
- following_id

---

## Project Structure

```text
social-media-app/
│
├── index.php
├── register.php
├── login.php
├── profile.php
├── create_post.php
├── like.php
├── comment.php
├── follow.php
├── db.php
│
├── css/
│   └── style.css
│
├── images/
│
└── database/
    └── socialmedia.sql
```

---

## Installation Steps

1. Download or Clone the Repository

```bash
git clone <repository-link>
```

2. Move Project Folder to XAMPP htdocs

```text
C:\xampp\htdocs\
```

3. Start Apache and MySQL from XAMPP Control Panel.

4. Open phpMyAdmin.

5. Create Database

```sql
CREATE DATABASE socialmedia;
```

6. Import the SQL file.

7. Configure Database Connection in `db.php`.

```php
$conn = mysqli_connect(
"localhost",
"root",
"",
"socialmedia"
);
```

8. Run the project.

```text
http://localhost/social-media-app/
```
## Learning Outcomes

- Full Stack Web Development
- PHP & MySQL Integration
- User Authentication
- Session Management
- Database Design
- CRUD Operations
- Social Media Application Development

---
## Future Enhancements

- Real-time notifications
- Direct messaging between users
- Story sharing feature
- Profile customization
- Search users and posts
- Responsive mobile design

---

## Conclusion

This project successfully demonstrates the development of a Mini Social Media Platform using PHP, MySQL, HTML, CSS, and JavaScript. It implements essential social networking features such as user authentication, post creation, likes, comments, and user following functionality.

---

