<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Rebeca's Web Page</title>
        </head>
        <body>
        <?php
            echo "<h1>Welcome To Rebeca's Web Page!</h1>";
            echo "<p>Hi, I am Rebeca and I hope to bring all of my creative ideas to life.</p>";
        ?>
        <?php
            $quote = "Be creative, be happy.";
            echo "<p>$quote</p>";
        ?>
        <?php
            //Defining variables for CodeStream Solutions (Brookhaven Campus) address
            $company = "CodeStream Solutions";
            $address = "3939 Valley View Ln";
            $city = "Farmers Branch";
            $state = "TX";
            $zip = "75244";
            //Concatenate address into formatted block
            $fullAddress = $company . "<br>" . $address . "<br>" . $city . ", " . $state . " " . $zip;
            //Display the result
            echo "$fullAddress";
        ?>
        <?php
            //Assign two numbers
            $x = 15;
            $y = 4;

            //Addition
            echo "<p>Addition: $x + $y = " . ($x + $y) . "</p>";
            //Subraction
            echo "<p>Subtraction: $x - $y = " . ($x - $y) . "</p>";
            //Multiplication
            echo "<p>Multiplication: $x * $y = " . ($x * $y) . "</p>";
            //Division
            echo "<p>Division: $x / $y = " . ($x / $y) . "</p>";
            //Modulus
            echo "<p>Modulus: $x % $y = " . ($x % $y) . "</p>";
        ?>
        <?php
            //Define a constant with my name
            define("My_Name", "Rebeca");
            //Display the constant
            echo "<p>My name is " . My_Name .".</p>";
            ?>
        </body>
    </html>
