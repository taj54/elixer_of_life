# Elixir of Life

A simple PHP web application that encourages users to reflect on the qualities and habits that lead to success. Users select their preferred work style (smart work, hard work, or both) and choose from a set of "elixirs" (positive habits or mindsets) to receive personalized feedback and motivational messages.

---

## Version

**2.1**

---

## Table of Contents

- [Features](#features)
- [File Structure](#file-structure)
- [How It Works](#how-it-works)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Author](#author)
- [License](#license)

---

## Features

- Select work style(s): smart work, hard work, or both.
- Choose from a variety of motivational "elixirs" (habits/mindsets).
- Personalized feedback and motivational messages based on selections.
- Clean, simple UI for easy interaction.

---

## File Structure

```
app/
  Controllers/
    BaseController.php
    ...
  enum/
    Elixir.php
  services/
    BrainStormService.php
  views/
  bootstrap.php
  cache/
    ...
public/
  index.php
vendor/
  ...
composer.json
composer.lock
readme.md
```

- **public/index.php**  
  Main entry point. Displays the form for user input and shows results after submission.

- **app/enum/Elixir.php**  
  Defines the `Elixir` enum, which contains different elixirs, their names, descriptions, and rewards. Provides utility methods for working with elixirs.

- **app/Controllers/BaseController.php**  
  Contains the base controller logic for handling requests.

- **app/services/BrainStormService.php**  
  Contains the `BrainStormService` class, which analyzes user selections (work style and chosen elixirs) and generates personalized feedback and motivational messages. This service is responsible for the core logic that powers the application's results.

- **app/views/**  
  Contains view templates for rendering HTML.

- **app/bootstrap.php**  
  Application bootstrap file for initial setup.

---

## How It Works

1. **User Input:**  
   Users select their preferred work type(s) and the elixirs they believe will help them succeed.

2. **Processing:**  
   On form submission, the application uses the `BrainStorm` class to analyze the selections and generate feedback.

3. **Output:**  
   Results are displayed as a list of motivational messages and rewards associated with the selected elixirs.

---

## Requirements

- PHP 8.1 or higher (for enum support)
- Composer (for dependency management)
- A web server (Apache, Nginx, or PHP's built-in server)

---

## Installation

1. **Clone the repository:**
   ```sh
   git clone https://github.com/taj54/elixer_of_life.git
   cd elixer_of_life
   ```

2. **Install dependencies:**
   ```sh
   composer install
   ```

3. **Set up your web server:**
   - Point your web server's document root to the `public/` directory.
   - Or use PHP's built-in server:
     ```sh
     php -S localhost:8000 -t public
     ```

---

## Usage

1. Open your browser and navigate to `http://localhost:8000` (or your configured domain).
2. Select your preferred work type(s) and elixirs.
3. Submit the form to view your personalized results.

---

## Author

- **Name:** taj
- **GitHub:** [taj54](https://github.com/taj54)
- **Email:** tajulislamj200@gmail.com

---

## License

This project is licensed under the MIT License.  
See the [LICENSE](LICENSE) file for details.

---
