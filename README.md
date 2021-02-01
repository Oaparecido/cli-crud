# ✨ CLI-CRUD ✨
📌 cli-crud is a project to test create, read, update and delete in database with MySQL.

### 🚀 Installation 🚀
📌 It's very simple you just need to have the **docker** and **docker-compose** installed.<br/>
With that installed just run the following command.

```shell
 $ docker-compose build
```
```shell
 $ docker-compose up -d
```
```shell
 $ docker-compose exec app ./app/index.php
```
**🔥 It's very simple**

### 🔥 Usage 🔥

>📌 **[--create|-C]:** Creates an element in the table</br>
> **Usage:** </br>
>       - **First param:** Name from a table into database; </br>
>       - **Second param:** What wil be saved.

> 📌 **[--delete|-D]:** delete an element in the table</br>
> **Usage:**</br>
>       - **First param:** Name from a table into database;</br>
>       - **Second param:** id from an element in the table

> 📌 **[--update|-U]:** Update an element in the table</br>
> **Usage:**<br/>
>       - **First param:** Name from a table into database;<br/>
>       - **Second param:** id from an element in the table;.<br/>
>       - **Third param:** What wil be saved.


> 📌 **[--read|-R]:** Read all elements and all tables