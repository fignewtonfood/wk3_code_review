# Hair Salon

##### An app to store and retrieve hair salon stylists and clients, 2015 August 21st

#### By Timothy White

## Description

Using PHP, SQL, and Silex, this app will create a database to store the names of stylists and their clients. Salon data can will include name. Client entries are unique to each stylist. Users can search for a client by stylist.

## Setup

* clone git repository: https://github.com/fignewtonfood/wk3_code_review.git
* import database hair_salon.zip using phpMyAdmin
* run composer install in project folder in terminal
* start local php server in project subfolder labeled 'web'
* navigate to localhost in browser

## Technologies Used

This app utilizes PHP, Silex, SQL, Twig, CSS, and HTML

## SQL Commands Used

CREATE DATABASE hair_salon;
USE hair_salon;
CREATE TABLE stylists (name VARCHAR (255), id serial PRIMARY KEY);
CREATE TABLE clients (name VARCHAR (255), stylist_id INT, id serial PRIMARY KEY);


### Legal



Copyright (c) 2015 **Tim White**

This software is licensed under the MIT license.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
