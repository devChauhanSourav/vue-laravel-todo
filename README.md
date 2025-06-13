
# 📝 Vue + Laravel Todo App

A full-stack TODO list application built with **Vue 3 (Vite)** on the frontend and **Laravel 11** as the backend API. This project demonstrates CRUD operations, API integration, and component-based development.

---

## 🔧 Tech Stack

### Frontend:
- Vue 3 with Composition API
- Axios for HTTP requests
- Tailwind CSS (optional styling)
- Vite for development & build

### Backend:
- Laravel 11
- RESTful API (CRUD)
- MySQL/PostgreSQL (configurable)
- Eloquent ORM
- CORS & API middleware

---

## 📁 Project Structure

```
vue-laravel-todo/
│
├── todo-api/          # Laravel Backend
│   ├── app/
│   ├── routes/api.php
│   └── .env
│
├── todo-frontend/     # Vue Frontend
│   ├── src/
│   │   ├── components/
│   │   ├── App.vue
│   │   └── main.js
│   └── vite.config.js
```

---

## 🚀 Features

- Add, update, delete, and mark tasks as completed
- "Are you sure?" alerts before delete/complete
- Axios abstraction with `api.js`
- Clean component-based structure
- Soft delete in Laravel (optional)

---

## 🔄 API Endpoints

| Method | URL               | Action           |
|--------|--------------------|------------------|
| GET    | `/api/tasks`       | Fetch all tasks  |
| POST   | `/api/tasks`       | Add a new task   |
| PUT    | `/api/tasks/{id}`  | Update task      |
| DELETE | `/api/tasks/{id}`  | Delete task      |

---

## 🛠️ Setup Instructions

### 1. Clone Repository
```bash
git clone https://github.com/devChauhanSourav/vue-laravel-todo.git
cd vue-laravel-todo
```

### 2. Backend (Laravel)
```bash
cd todo-api
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan serve
```

### 3. Frontend (Vue)
```bash
cd ../todo-frontend
npm install
npm run dev
```

Visit: `http://localhost:5173` (Vue) and `http://localhost:8000/api/tasks` (API)

---

## 📸 Screenshots

 ![image](https://github.com/user-attachments/assets/457ff37b-37a3-44c9-a83d-f0dd34f338af)


---

## 📃 License
MIT License

---

## 🙋‍♂️ Author
**Sourav Chauhan**   
