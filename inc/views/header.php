<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Traffic layer</title>
    <link href="<?= Controller::url('styles', 'bootstrap.css') ?>" rel="stylesheet"/>
    <link href="<?= Controller::url('styles', 'style.css') ?>" rel="stylesheet"/>
    <script>
        window.URLS = {
            MAP_POINTS: "<?= Controller::url('ajax', 'map') ?>"
        }
    </script>
</head>
<body>