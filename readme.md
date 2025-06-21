# Elixir of Life

A simple PHP web application that encourages users to reflect on the qualities and habits that lead to success. Users select their preferred work style (smart work, hard work, or both) and choose from a set of "elixirs" (positive habits or mindsets) to receive personalized feedback and motivational messages.

---

## Version

**2.1**

---

## Updated File Structure

- **index.php**  
  Main entry point. Displays the form for user input and shows results after submission.

- **enum_elixir.php**  
  Defines the `Elixir` enum, which contains different elixirs, their names, descriptions, and rewards. Provides utility methods for working with elixirs.

- **brain_storm.php**  
  Contains the `BrainStorm` class, which processes user selections and generates feedback messages based on the chosen work types and elixirs.


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
- A web server (Apache, Nginx, or PHP's built-in server)

---

## Usage

1. Place all files in your web server's root directory.
2. Access `index.php` in your browser.
3. Select your preferred work type(s) and elixirs, then submit the form to view your personalized results.

---
## Author

- **Name:** taj
- **GitHub:** [taj54](https://github.com/taj54)
- **Email:** [tajulislamj200@gmail.com]

---


## License
This project is licensed under the MIT License.  
See the [LICENSE](LICENSE) file for details.

---
