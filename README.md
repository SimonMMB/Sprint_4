<a id="readme-top"></a>

<h1 align="center">STAY STRONG</h1>
<p align="center">Training programs platform</p>

<details>
  <summary>Table of Contents</summary>
  <ol>
    <li><a href="#about-the-project">About The Project</a></li>  
    <li><a href="#built-with">Built With</a></li>
    <li><a href="#getting-started">Getting Started</a></li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#comments">Comments</a></li>
  </ol>
</details>

## About The Project
Web application for creating and managing personalized training programs, with exercises and sessions tracking.

✨ Key Features
* ✅ Create programs with custom frequencies and durations
* ✅ Log weights lifted for each exercise in every training session and display progress
* ✅ Track completed sessions vs. total sessions
* ✅ Secure user authentication

<p align="left">(<a href="#readme-top">back to top</a>)</p>

### Built With

* **Backend**: Laravel 12
* **Frontend**: Tailwind CSS + Blade + Livewire + JS
* **Authentication**: Breeze
* **Database**: MySQL

<p align="left">(<a href="#readme-top">back to top</a>)</p>

## Getting Started
To get a local copy up and running follow these simple steps:

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
5. Create a DB called 'staystrong'.
6. Run the migrations
   ```sh
   php artisan migrate
   ```
7. Seed 'excercises' table
   ```sh
   php artisan db:seed --class=ExercisesTableSeeder
   ```
8. Log in and follow the instructions to create your personalized training programs.

<p align="left">(<a href="#readme-top">back to top</a>)</p>

## Usage
This app empowers you to plan, track, and crush your fitness goals with personalized training programs.

🚀 How It Works
* Log in to your personal space.
* Choose two key variables for your(s) program(s):
         * **Frequency**: How many days per week you want to train.
         * **Duration**: Your short-term goal timeline (e.g., 4 weeks to boost stamina or build strength).
         * Set your start date, and the app automatically calculates your end date.

🔥 Your Custom Program
* The app generates a tailored workout plan based on your preferences. Each session is designed to target all major muscle groups.

📊 Track & Conquer
* Log the weights you lift for every exercise, marking them as completed. Once all exercises are done, the session is automatically checked as completed. Once all sesions are done, the program is automatically checked as completed.

📈 See Your Progress
* Real-time stats: Sessions completed, remaining, and overall progress.
* Visualize your gains: A sleek graph tracks your weight-lifting history for every exercise, so you can see your progress over time.

<p align="left">(<a href="#readme-top">back to top</a>)</p>

## Comments
🚀 Project Overview (regarding Sprint 4 project statement)

📌 LEVEL 1: Architecture & Features
* MVC Architecture with clean organization:
   * **Models**: User, Program, Exercise, SessionExercise, TrainingSession.
   * **Controllers**: AuthenticatedSessionController, UserController, ProgramController, TrainingSessionController.
   * **Services**: TrainingSessionService.
   * **Views**: 
   - Auth: login, forgot-password, account-deleted.
   - User: create, delete-user-form.
   - Programs: create, index, show.
   - Training sessions: show. 
   - Exercises: progress.
   - Home: dashboard.

* CRUD Operations:
   - Users: Create & Delete.
   - Programs: Create, Read & Delete.
   - Sessions: Read, Update & Delete.

🔐 LEVEL 2: Security & UX
* Authentication: Powered by Laravel Breeze.
* 404 Error Page: Custom-designed to match the app’s aesthetic. Redirects based on login status.

💡 LEVEL 3: Advanced Tech
* Livewire: Drives dynamic progress-tracking graphs (shows weight lifted per exercise/session).
* Service Layer: TrainingSessionService handles business logic (clean, maintainable code).

<p align="left">(<a href="#readme-top">back to top</a>)</p>