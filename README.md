
---

# 🍽️ Yummy Project  

## 🚀 Installation Guide  

Follow these steps to set up the **Yummy** project on your local machine.  

### **1️⃣ Import Database**  
1. Locate the database file in:  
   ```
   Modules/Admin/Database/Database-Migration/yummy.sql
   ```
2. Open **phpMyAdmin** and create a new database.  
3. Import the `yummy.sql` file into your new database.  

---

### **2️⃣ Configure Environment**  
Edit the `.env` file in the **Modules/Admin** folder. Update the database credentials:  
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lv_db_yummy
DB_USERNAME=root
DB_PASSWORD=
```

---

### **3️⃣ Install Dependencies**  
Run the following commands in your terminal:  
```bash
composer install
php artisan key:generate
php artisan migrate
php artisan config:clear
php artisan optimize:clear
php artisan route:clear
php artisan serve
```

---

### **4️⃣ Access the Project**  
- Open your browser and visit:  
  🔗 [http://127.0.0.1:8000/](http://127.0.0.1:8000/)  

#### **Admin Panel Login**  
- URL: [http://127.0.0.1:8000/login](http://127.0.0.1:8000/login)  
- **Email:** `Ratanak123@gmail.com`  
- **Password:** `123`  

🛠️ *You can change the username and password in the admin settings.*  

---

## 🎉 Enjoy & Thanks for Using Yummy!  

Let me know if you need further improvements! 🚀