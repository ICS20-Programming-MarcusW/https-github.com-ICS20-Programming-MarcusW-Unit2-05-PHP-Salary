<!DOCTYPE html>
<html lang="en-ca">
   <head>
      <!-- Metadata -->
      <meta charset="utf-8" />
      <meta name="description" content="Salary, with PHP" />
      <meta name="keywords" content="immaculata, ics2o" />
      <meta name="author" content="Marcus Wehbi" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <!-- Link for Favicon -->
      <link rel="apple-touch-icon" sizes="180x180" href="./fav_index/apple-touch-icon.png" />
      <link rel="icon" type="image/png" sizes="32x32" href="./fav_index/favicon-32x32.png" />
      <link rel="icon" type="image/png" sizes="16x16" href="./fav_index/favicon-16x16.png" />
      <link rel="manifest" href="./fav_index/site.webmanifest" />
      <!-- Link for Stylesheet -->
      <link rel="stylesheet" href="./css/style.css" />
      <!-- Title -->
      <title>Salary, with PHP</title>
   </head>
   <center><body>
      <?php 
         echo '<h1>Salary Program, with PHP</h1>'; 
         echo '<h3>Please enter your employment information:</h3>';
         ?> 
      <?php
         // define variables and set to empty values
         $toTax = 0.1805;
         $hoursWorked = $hourlyRate = 0;
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
           $hoursWorked = $_POST["hoursWorked"];
           $hourlyRate = $_POST["hourlyRate"];
         }
          $total_pay = $hoursWorked * $hourlyRate;
          $tax = $toTax * $total_pay;
          $total_earned = $total_pay - $tax;
         ?>
      <form method="post">
         <p>Number of Hours Worked:</p>
         <input 
            class="mdl-textfield__input" 
            type="number" 
            pattern="[0-9]+([\.,][0-9]+)?" 
            min="0"
            step="0.01"
            placeholder="# of Hours Worked"
            name="hoursWorked">
         <br><br>
         <p>Hourly Rate: $</p>
         <input 
            class="mdl-textfield__input" 
            type="number" 
            pattern="[0-9]+([\.,][0-9]+)?"
            min="0"
            step="0.01"
            placeholder="Hourly Rate"
            name="hourlyRate">
         <br><br>
         <input type="submit" name="submit" value="Submit">  
      </form>
      <?php
         function pay($total_pay, $tax)
           
         {
             return round( $total_pay - $tax, 2);
         }
         
         // if (!empty($baseOfTriangle)) {
            echo "<h4>Your pay will be: " . "$" . pay($total_pay, $tax) . "</h4>";
         //    }
         ?>
      <?php
         function govPay($toTax, $total_pay)
         {
             return round( $toTax * $total_pay, 2);
         }
         
         // if (!empty($baseOfTriangle)) {
            echo "<h4>The government will take: " . "$" . govPay($toTax, $total_pay) . "</h4>";
         //    }
         ?>
   </body></center>
</html>