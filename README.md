# FusionBoost Kit for Laravel+Vue Apps

<p align="center"><a href="https://jesilsnotes.com" target="_blank"><img src="[https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg](https://github.com/yourusername/yourrepository/raw/main/path/to/your/image.png](https://github.com/jesiljose-bridge/laravel-vue-scaffold/blob/main/fusionboost_logo.png?raw=true)" width="400" alt="FusionBoost Logo"></a></p>


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
   The `setup.sh` script automates the process of initializing a new Git repository, adding all files to the repository, and pushing them to a new remote repository. Here's a more detailed explanation of each step in the script:

1. **Remove Existing Git Repository**: 
   ```bash
   rm -rf .git
   ```
   This command removes the existing `.git` directory, which contains the Git history and configuration of the current repository. It effectively "unlinks" the current repository from Git.

2. **Remove `.gitattributes` File**: 
   ```bash
   rm -rf .gitattributes
   ```
   This command removes the `.gitattributes` file, if it exists. The `.gitattributes` file specifies attributes for pathnames in the repository, such as handling of line endings and binary files.

3. **Initialize New Git Repository**: 
   ```bash
   git init
   ```
   This command initializes a new Git repository in the current directory. It creates a new `.git` directory and sets up the necessary Git configuration files to start tracking changes.

4. **Add All Files to Staging Area**: 
   ```bash
   git add .
   ```
   This command adds all files in the current directory to the staging area, preparing them to be committed to the Git repository. It stages both new and modified files.

5. **Prompt for Personal Access Token (PAT)**:
   ```bash
   read -p "Enter Personal Access Token:" token
   ```
   This command prompts the user to enter their Personal Access Token (PAT). The PAT is used for authentication when pushing changes to the new remote repository.

6. **Prompt for New Repository URL**:
   ```bash
   read -p "Enter Git Repo of new project:" url
   ```
   This command prompts the user to enter the URL of the new remote repository where they want to push the changes.

7. **Construct Repository URL with PAT**:
   ```bash
   domain="${url#https://}"
   repo="https://${token}@${domain}"
   ```
   These commands extract the domain from the repository URL and construct a new repository URL with the provided Personal Access Token for authentication.

8. **Set Remote Origin**:
   ```bash
   git remote add origin "$repo"
   ```
   This command sets the remote origin of the Git repository to the new repository URL. It establishes the connection between the local repository and the remote repository.

9. **Prompt for Primary Branch Name**:
   ```bash
   read -p "Primary branch name (main/master):" branch
   ```
   This command prompts the user to enter the name of the primary branch for the new repository (e.g., `main` or `master`).

10. **Rename Current Branch**:
    ```bash
    git branch -M $branch
    ```
    This command renames the current branch to the primary branch name specified by the user. It ensures that the primary branch is correctly named in the local repository.

11. **Prompt for Commit Message**:
    ```bash
    read -p "Enter commit message:" commitmessage
    ```
    This command prompts the user to enter a commit message for the initial commit that will be pushed to the new remote repository.

12. **Commit Changes**:
    ```bash
    git commit -m "$commitmessage"
    ```
    This command commits the changes in the staging area with the provided commit message. It creates a new commit in the local repository.

13. **Push Changes to Remote Repository**:
    ```bash
    git push -u origin $branch
    ```
    This command pushes the committed changes from the local repository to the new remote repository. It sets the upstream branch and pushes changes to the specified branch.

By automating these steps, the `setup.sh` script simplifies the process of cloning the repository, initializing a new Git repository, and pushing the changes to a new remote repository, making it easier for users to get started with the project.

4. Once the setup is complete, you can start making changes to the project and push them to the new remote repository.



## License

This project is open-sourced software licensed under the [MIT license](LICENSE). AS well as the licences under which the components/plugins used in this project are released.

---

Feel free to customize the instructions further based on your project's specific details and requirements! If you have any queries, please raise an issue or feel free to contribute to the codebase.
