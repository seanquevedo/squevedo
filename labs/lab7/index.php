<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>

        <h1> OtterMart - Admin Login </h1>
        
        <form method="POST" action="loginProcess.php">
            
            Username: <input type="text" name="username"/> <br />
            Password: <input type="password" name="password"/> <br />
            
            <input type="submit" name="submitForm" value="Login!" />
            
        </form>

    </body>
</html>