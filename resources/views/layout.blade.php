<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Auth | Laravel</title>

        <!--Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700" rel="stylesheet"> 

        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::to('resources/assets/css/styles.css') }}">
        <link rel="stylesheet" href="{{ URL::to('resources/assets/css/auth.css') }}">
        <link rel="stylesheet" href="{{ URL::to('resources/assets/css/includes/navigation.css') }}">
        <link rel="stylesheet" href="{{ URL::to('resources/assets/css/includes/verification.css') }}">
        
    </head>
    <body>
        @include('includes/navigation')
        @yield('content')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
