<!DOCTYPE html>

<html lang="en-us">

<head>
    <meta charset="utf-8">
    <title>
        {{ $title ?? 'Welcome | Reporter'}}
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="description"
        content="Repoter is a article writting website. Its a solo project based application Made by TheAlter71">
    <meta name="author" content="Mehedi Hasan">
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

    <!-- Line Awesome -->
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/6d6a33e717.js" crossorigin="anonymous"></script>

    <!-- # CSS Plugins -->
    <link rel="stylesheet" href="/user/plugins/bootstrap/bootstrap.min.css">

    <!-- # Main Style Sheet -->
    <link rel="stylesheet" href="/user/css/style.css">

    <!-- Tags input -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" />

    <!-- CKeditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
    <style>
    #inputTag {
        color: black !important;
        background-color: black !important;
        text-align: center !important;
    }

    .ck-editor__editable {
        min-height: 200px;
    }
    </style>

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

    <!-- Tags -->
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="/user/js/script-tag.js"></script>



</body>

</html>