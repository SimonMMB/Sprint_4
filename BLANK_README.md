<a id="readme-top"></a>

<br />
<div align="center">
  <a href="https://github.com/SimonMMB/Sprint_4">
    <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a>

<h3 align="center">STAY STRONG</h3>

  <p align="center">
    Web application for creating and managing personalized training programs, with exercises progress and session tracking.
    <br />
    <a href="https://github.com/SimonMMB/Sprint_4"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/SimonMMB/Sprint_4">View Demo</a>
    &middot;
    <a href="https://github.com/SimonMMB/Sprint_4/issues/new?labels=bug&template=bug-report---.md">Report Bug</a>
    &middot;
    <a href="https://github.com/SimonMMB/Sprint_4/issues/new?labels=enhancement&template=feature-request---.md">Request Feature</a>
  </p>
</div>

<details>
  <summary>Table of Contents</summary>
  <ol>
    <li><a href="#about-the-project">About The Project</a></li>  
    <li><a href="#built-with">Built With</a></li>
    <li><a href="#getting-started">Getting Started</a></li>
    <li><a href="#usage">Usage</a></li>
  </ol>
</details>

## About The Project
Web application for creating and managing personalized training programs, with exercises progress and session tracking.

✨ Key Features

✅ Create programs with custom frequencies and durations
✅ Log weights lifted for each exercise in every training session and display progress
✅ Track completed sessions vs. total sessions
✅ Responsive design (mobile and desktop friendly)
✅ Secure user authentication

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Built With
* [![Laravel][Laravel.com]][Laravel-url]

**Backend**: Laravel 12
**Frontend**: Tailwind CSS + Blade + Livewire
**Authentication**: Breeze
**Database**: MySQL

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Getting Started
To get a local copy up and running follow these simple example steps.

1. Clone the repo
   ```sh
   git clone https://github.com/SimonMMB/Sprint_4.git
   ```
2. Run NPM 
   ```sh
   npm run dev
   ```
3. Run PHP built-in web server 
   ```sh
   php artisan serve
   ```
4. Start a MySQL server (via XAMPP/WAMP/Laragon/MAMP or standalone).
5. Run the migrations
   ```sh
   php artisan migrate
   ```
6. Seed excercises table
   ```sh
   php artisan db:seed --class=ExercisesTableSeeder
   ```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Usage

Use this space to show useful examples of how a project can be used. Additional screenshots, code examples and demos work well in this space. You may also link to more resources.

_For more examples, please refer to the [Documentation](https://example.com)_

<p align="right">(<a href="#readme-top">back to top</a>)</p>