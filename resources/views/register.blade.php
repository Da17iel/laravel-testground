<x-login-layout>
    <x-slot name="title">Login</x-slot>
    <?php session_start(); ?>

    <?php if (empty($_GET)) { ?>
    <h1>Register:</h1>
    <form method="get">
        <table>
            <tr>
                <td class="w-64"><label for="name" class="text-center">Name:</label></td>
                <td><input type="text" name="name" placeholder="John Doe" autocomplete="off" required></td>
            </tr>
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" name="username" placeholder="john-doe" required></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" name="email" placeholder="example@email.com" required></td>
            </tr>
            <tr>
                <td><label for="Name">Password:</label></td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="2" class="text-left">Gender</td>
            </tr>

        </table>
        <input type="radio" name="gender" value="male" class="mt-2" required>
        <label for="male">Male</label>
        <input type="radio" name="gender" value="female">
        <label for="male">Female</label>
        <input type="radio" name="gender" value="other">
        <label for="male">Other</label><br>
        <input type="submit">
    </form>
    <?php
    } else {
// Puts all the $_GET into variables
        $name = $_GET['name'];
        $username = $_GET['username'];
        $gender = $_GET['gender'];
        $email = $_GET['email'];
        $password = $_GET['password'];
        $hashed_password = password_hash($password, PASSWORD_BCRYPT); // Simple password hash

// Start & Open the connection
        $conn = new mysqli("localhost", "root", "NzX3kOvUJ0ApcnLzoDK5", "laravel-freshstart") or die("Connect failed: %s\n" . $conn->error);

// Predefined sql statement, inserts $_GET values into table. Because of the mysql settings this won't be possible if $name is equal to $_GET["name"]
        $sql = "INSERT INTO users (name, username, gender, email, password) VALUES ('$name', '$username', '$gender', '$email', '$hashed_password');";

// Checks if the password is more or equal to 6 characters
        if (iconv_strlen($password) >= 6) {

            // Sees if the query is possible
            if ($conn->query($sql) === TRUE) {
                // Give those variables to the session
                $_SESSION["username"] = $_GET['username'];
                echo "<h1>You have now registered</h1>";

            } else { // result of an error
                // Empty the $_GET
                $_GET = array();

                // Tell User that this username is already taken
                echo "<h2>This username or email is already in use.</h2><br>";
            }
        } else {
            echo "Ihr Password muss 6 oder mehr Zeichen enthalten";
        }
        echo "<br><a href='/register' style='padding-top:15px;'>Back</a>";

// Closes connection to database
        $conn->close();
    } ?>

</x-login-layout>
