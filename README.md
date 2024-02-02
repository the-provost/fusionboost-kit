# FusionBoost Kit for Laravel+Vue Apps

This project is a scaffold for developers who want to build web applications using Laravel, Vue 3, Vite, Bootstrap, Laravel Fortify, and Laravel Passport. It includes AdminLTE dashboard and AdminLTE Auth templates for easy integration.

## Features

- **Laravel**: The backend is powered by Laravel, a popular PHP framework known for its elegant syntax and powerful features.
- **Vue 3**: The frontend is built with Vue 3, a progressive JavaScript framework for building user interfaces.
- **Vite**: Vite is used as the build tool for fast and efficient development and production builds.
- **Bootstrap**: The project includes Bootstrap for responsive and mobile-first front-end web development.
- **Laravel Fortify**: Laravel Fortify is included for easy authentication and authorization management.
- **Laravel Passport**: Laravel Passport is included for API authentication using OAuth2 tokens.
- **AdminLTE Dashboard and Auth Templates**: The project includes AdminLTE dashboard and Auth templates for quick setup of admin panels and authentication pages.
- **Easy Setup Script**: A setup script (`setup.sh`) is provided to help users clone the repository, initialize a new Git repository, and push the changes to a new remote repository with minimal manual effort.

## Getting Started

To get started with this scaffold, follow these steps:

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/your-project.git
   ```

2. Navigate into the project directory:

   ```bash
   cd your-project
   ```

3. Run the setup script (`setup.sh`) to initialize a new Git repository and push the changes to a new remote repository. Follow the prompts to enter your Personal Access Token, the URL of the new repository, the primary branch name, and a commit message for the initial commit:

   ```bash
   bash setup.sh
   ```

   **Explanation of `setup.sh` Process**:

   - **Remove Existing Git Repository**: Removes the existing `.git` directory to start fresh.
   - **Remove `.gitattributes` File**: Removes the `.gitattributes` file if it exists.
   - **Initialize New Git Repository**: Initializes a new Git repository in the current directory.
   - **Add All Files to Staging Area**: Adds all files in the current directory to the staging area.
   - **Prompt for Personal Access Token (PAT)**: Prompts the user to enter their Personal Access Token (PAT).
   - **Prompt for New Repository URL**: Prompts the user to enter the URL of the new remote repository.
   - **Construct Repository URL with PAT**: Constructs the repository URL with the provided Personal Access Token.
   - **Set Remote Origin**: Sets the remote origin of the Git repository to the new repository URL.
   - **Prompt for Primary Branch Name**: Prompts the user to enter the name of the primary branch for the new repository.
   - **Rename Current Branch**: Renames the current branch to the primary branch name specified by the user.
   - **Prompt for Commit Message**: Prompts the user to enter a commit message for the initial commit.
   - **Commit Changes**: Commits the changes in the staging area with the provided commit message.
   - **Push Changes to Remote Repository**: Pushes the committed changes from the local repository to the new remote repository.

4. Once the setup is complete, you can start making changes to the project and push them to the new remote repository.

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).

---

Feel free to customize the instructions further based on your project's specific details and requirements!
