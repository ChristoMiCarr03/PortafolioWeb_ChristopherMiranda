create database if not exists app24_db;

use app24_db;

create table if not exists tasks (
	id int auto_increment primary key,
    tittle varchar(255) not null,
    description text,
    due_date date,
    priority enum('baja', 'media', 'alta') not null default 'media',
    status enum('pendiente', 'completada') not null default 'pendiente',
    create_at timestamp default current_timestamp,
    update_at timestamp default current_timestamp on update current_timestamp
)