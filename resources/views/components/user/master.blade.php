<!DOCTYPE html>

<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>
        {{ $title ?? 'Welcome | Reporter'}}
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <link rel="shortcut icon" href="/user/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="/user/images/favicon.png" type="image/x-icon">

    <!-- theme meta -->
    <meta name="Website-name" content="reporter" />

    <!-- # Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Neuton:wght@700&family=Work+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- # CSS Plugins -->
    <link rel="stylesheet" href="/user/plugins/bootstrap/bootstrap.min.css">

    <!-- # Main Style Sheet -->
    <link rel="stylesheet" href="/user/css/style.css">
</head>

<body>

    <!-- Navbar will be here -->

    {{ $slot}}


    <!-- Footer will be here -->

    <!-- # JS Plugins -->
    <script src="/user/plugins/jquery/jquery.min.js"></script>
    <script src="/user/plugins/bootstrap/bootstrap.min.js"></script>

    <!-- Main Script -->
    <script src="/user/js/script.js"></script>

</body>

</html>