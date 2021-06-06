[&laquo; back to index](../../README.md)
# Strategy Pattern
## How to execute the example code

# Example code
## If you're using Windows
- enter the .docker folder, and run the following command:
    ```
    .\build.bat
    ```
- get back to the root folder, and run the following command:
    ```
    .\run-container.ps1
    ```
  
## If you're using MacOS/Linux
- enter the .docker folder, and run the following command:
    ```
    ./build.sh
    ```
- get back to the root folder, and run the following command
    ```
    ./run-container.sh
    ```

## OS-independent part:  
- at this point we are inside the container, let's run the followng command:
    ```
    composer update
    ```
- then enter the project folder:
    ```
    cd HeroExample/src/
    ```
- Run the program as follows:
    ```
    php main.php
    ```

[next - References and useful links &raquo;](06_references.md)
