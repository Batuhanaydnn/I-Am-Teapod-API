# I AM A TEAPOD API

The project is a PHP-based web application that contains two HTTP client controller classes `GorevController` and `UsersController`. The application provides management of tasks and users. This README file provides details including general description of the project, usage and endpoints of the API.

## Class Diagrams

### TaskController

This class provides functions related to the management of tasks. It includes the following methods:

- `getTasks`: Gets all tasks.
- `getTask`: Gets a specific task.
- `postTask`: Adds a new task.
- `deleteTask`: Deletes a specific task.
- `putAdminTask`: Updates a specific task (requires administrator privilege).
- `putUserTask`: Updates a specific task (requires user authorization).
- `taskSelection`: Retrieves tasks based on a certain criteria.

### UserController

This class provides functions related to the administration of users. It includes the following methods:

- `getUsers`: Gets all users.
- `getUser`: Gets a specific user.
- `postUser`: Adds a new user.
- `deleteUser`: Deletes a specific user.
- `putUser`: Updates a specific user.
- `getLogin`: Authenticates user login.
- `userSelection`: Retrieves users based on a certain criteria.

### ApiKeyMiddleware

This class provides a middleware for authenticating the API key and granting user authorization.

## Endpoints

- `/v1/user`
    
    - `GET`: Fetch a specific user.
    - `DELETE`: Deletes a specific user.
    - `PUT`: Updates a specific user.
    - `POST`: Adds a new user.
- `/v1/users`
    
    - `GET`: Fetch all users.
- `/v1/userSelection`
    
    - `GET`: Fetch users based on a certain criteria.
- `/v1/login`
    
    - `GET`: Validates user input.
- `/v1/task`
    
    - `GET`: Brings a specific task.
    - `POST`: Adds a new task.
    - `DELETE`: Deletes a specific task.
    - `PUT`: Updates a specific task (requires administrator privilege).
- `/v1/tasks`
    
    - `GET`: Brings all tasks.
- `/v1/taskSelection`
    - `GET`: Brings tasks based on a certain criteria.

## Use

To use this web application, you can follow the steps below:

1. Clone or download the project.
2. Run the following command to install the requirements: `composer install`
3. Configure the database connection settings in the `config/database.php` file.
4. Run the project on a web server.

## Contribute

If you want to contribute to the project, you can follow the steps below:

1. Fork this repository (`repository`).
2. Create a `branch` for a new feature or improvement.
3. Commit your changes.
4. Push your `branch` to `forked repository`.
5. Create a `pull request`.

Please provide a descriptive explanation for your changes and test your code.

## Licence

This project is licensed under [MIT license](https://opensource.org/licenses/MIT). For detailed information, you can refer to the `LICENSE` file.

## Communication

If you have any questions or suggestions, you can reach me at [email](mailto:info@batuhanaydn.com).

In this README file you can find the basic usage of the project and the instructions to contribute. It also includes license information and contact details.

I hope this information is useful to you. If you have any other questions, I'm happy to help.