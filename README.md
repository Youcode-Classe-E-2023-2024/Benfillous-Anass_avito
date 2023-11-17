# Avito Refactoring Project

## Overview

L'entreprise Avito, dans sa logique de refactorisation, souhaite redéfinir les modèles de son site d'annonces. Ce projet vise à accomplir plusieurs tâches, allant de la création de diagrammes à l'implémentation de scripts PHP et MySQL pour la gestion de la base de données.

## Project Structure

### 1. Use Case Diagram

- File: `use_case_diagram.png`

Description: This file contains the use case diagram illustrating the various interactions between users and the system.

### 2. Class Diagram

- File: `class_diagram.png`

Description: This file contains the class diagram outlining the essential classes and their relationships for the Avito annonces site.

### 3. Database Initialization

#### Files:

- `includes/config.php`
- `includes/checker.php`

Description: These files contain the PHP and MySQL code necessary to initialize the database based on the previously defined models. Ensure you have a proper MySQL server setup and configured.

### 4. Data Insertion

#### Files:

- `includes/formEdit.php`
- `includes/handleForm.php`

Description: These files include PHP code for inserting data into the database using a form. Users can interact with the form to add new entries to the system.

### 5. Data Retrieval

#### File:

- `includes/getData.php`

Description: This file contains PHP code to retrieve data from the database. This functionality is crucial for displaying information on the Avito annonces site.

### 6. Data Deletion

#### Files:

- `delete.php`
- `deleteAll.php`

Description: These files include PHP code for deleting specific entries (`delete.php`) or clearing the entire database (`deleteAll.php`).

### 7. Testing Database Connectivity

#### File:

- `test/connectDb.php`

Description: This file includes a script for testing the database connection (`connectDb.php`). Use this for improving your knowledge of database connectivity. Ensure that the database connectivity is established successfully.

### 8. Editing Data

#### File:

- `edit.php`

Description: This file contains PHP code for editing existing data in the database. Users can interact with this functionality to modify information as needed.

### 9. Main Application

#### File:

- `index.php`

Description: The main file for the Avito annonces site. It should include the necessary code for user interaction and data presentation. Ensure all other files and functionalities are appropriately included.

## Usage

1. Clone the repository: `git clone <repository_url>`
2. Set up your MySQL server and configure `includes/config.php` with the appropriate database credentials.
3. Execute the SQL scripts in `includes/checker.php` to initialize the database.
4. Access the `index.php` file in a web browser to interact with the Avito annonces site.

## Contributors

- [Benfillous Anass]

Feel free to contribute to the project by submitting pull requests or reporting issues.

## License

See the [LICENSE.md](LICENSE.md) file for details.
