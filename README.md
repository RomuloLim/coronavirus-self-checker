<h1 align="center">
    <img src="https://vtdigger.org/wp-content/uploads/2020/05/covid-testing-288x288-ac1d37e5-b8e5-403f-b134-2a20a7c36763.png" width="100">
    
    Coronavirus self-checker
</h1>

<h3 align="center">
An interactive assessment tool to help you
</h3>

<p>❗ This project was developed for learning only (Laravel CRUD with AJAX) and is NOT a substitute for clinical examinations and medical appointments ❗</p>

<p align="center">
  <img alt="PHP version" src="https://img.shields.io/badge/php-v8.0.2-blue">
   
  <img alt = "Laravel version" src = "https://img.shields.io/badge/laravel-v8.28.1-blue">

  <img alt="Version" src="https://img.shields.io/badge/version-1.0.0-red">
    
   <img alt="License" src="https://img.shields.io/badge/license-MIT-brightgreen">

  <a href="https://www.linkedin.com/in/r%C3%B4mulo-lima-fonseca-1875351a0">
    <img alt="made by Rômulo Lima" src="https://img.shields.io/badge/made by-Rômulo Lima-orange">
  </a>
</p>

## About

This is a tool capable of measuring the probability of infection by COVID-19 based on the symptoms presented by registered patients. Developed for educational purposes on the programming tools used in development. This project has a CRUD with Laravel and AJAX and MySQL relating tables, have fun 😁.

---

## Features

- [x] Any user can register in the system without the need for login by sending the following data::

  - [x] An image of the patient
  - [x] Full name
  - [x] birth date
  - [x] Valid CPF
  - [x] WhatsApp number

After that, the user will be able to fill out a list of the symptoms presented and, based on that, receive his diagnosis.

---

### Pre-requisites

Before you begin, you will need to have the following tools installed on your machine:
[Git] (https://git-scm.com), [xampp] (https://www.apachefriends.org/pt_br/index.html) and [composer] (https://getcomposer.org/)
In addition, it is good to have an editor to work with the code like [VSCode] (https://code.visualstudio.com/)

#### Start project

```bash

# Clone this repository
$ git clone https://github.com/RomuloLim/coronavirus-self-checker

# Access the project folder cmd/terminal
$ cd coronavirus-self-checker

# install the dependencies
$ composer install

# Run the application in development mode
$ php artisan serve

# Starting Laravel development server: http://127.0.0.1:8000

```

---

## Tech Stack

Most of the tools used came pre-configured with Laravel (eloquent ORM, CORS, laramix, etc.), except

> See the file [composer.json](https://github.com/RomuloLim/coronavirus-self-checker/blob/master/composer.json)

#### **Utils**

- Editor: **[Visual Studio Code](https://code.visualstudio.com/)** → Extensions: **[PHP IntelliSense](https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-intellisense)**

---

## How to contribute

1. Fork the project.
2. Create a new branch with your changes: `git checkout -b my-feature`
3. Save your changes and create a commit message telling you what you did: `git commit -m "feature: My new feature"`
4. Submit your changes: `git push origin my-feature`

---

## Author

<a href="https://www.linkedin.com/in/ives-moreira-8871b318a/">
 <img style="border-radius: 50%;" src="https://media-exp1.licdn.com/dms/image/C4D03AQERhK2okW8U5w/profile-displayphoto-shrink_200_200/0/1579482490157?e=1619049600&v=beta&t=82Bki7tF3VrrKvaGITDP_pTe_IEGaOKehUDA8dnI8F8" width="100px;" alt="Ives Moreira"/>
 <br />
 <sub><b>Rômulo Lima</b></sub></a> <a href="https://www.linkedin.com/in/r%C3%B4mulo-lima-fonseca-1875351a0" title="Linkedin"></a>
 <br />

---

## License

This project is under the license [MIT](./LICENSE).

Made with 💜 by Romulo Lima.
