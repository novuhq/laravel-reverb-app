# Laravel Reverb CarryOn App

## Start the Project

Follow the steps below to install and run the project successfully:

1.  **Copy the `.env.example` file to `.env`**

    ```bash
    cp .env.example .env
    ```

2.  **Generate a key for your project**

    ```bash
    php artisan key:generate
    ```

3.  **Install all PHP dependencies**

    ```bash
    composer install
    ```

4.  **Install all JavaScript dependencies**

    ```bash
    npm install
    ```

5.  **Run migrations**

    ```bash
    php artisan migrate
    ```

6.  **Run the Queue via a terminal**

        ```
        php artisan queue:listen
        ```

7.  **Run Reverb via a terminal**

    ```
    php artisan reverb:start --debug
    ```

8.  **Run Vite via a terminal**

    ```
    npm run dev
    ```
