# Relational Data Demo – Bookstore Inventory Explorer

This web app demonstrates a normalized relational database structure using a fictional bookstore inventory system. It showcases real-world relationships like one-to-many (authors to books, publishers to books) and many-to-many (books to genres), with filterable views and an embedded Entity-Relationship Diagram (ERD).

## 🔍 Features

- Fully normalized relational schema (5 related tables)
- SQL joins with real-time dropdown filters (Author, Genre)
- Display of relational data in a clean, user-friendly table
- Embedded ERD viewer via [dbdiagram.io](https://dbdiagram.io/)
- Highlighted use of primary keys, foreign keys, and join tables

## 🌐 Live Demo

👉 [jonathansovsky.com/relational-data-demo](https://jonathansovsky.com/relational-data-demo)

## ⚙️ Tech Stack

- PHP
- MySQL
- Bootstrap 5
- HTML/CSS

## 🗃️ Database Schema

**Tables:**
- `authors` (id, name)
- `publishers` (id, name)
- `genres` (id, name)
- `books` (id, title, author_id, publisher_id)
- `book_genres` (book_id, genre_id)

The schema is designed to demonstrate one-to-many and many-to-many relationships, with join conditions and aggregation via `GROUP_CONCAT()`.

## 📁 Project Structure

