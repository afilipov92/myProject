<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Traffic layer</title>
    <link href="<?= Controller::url('styles' , 'style.css')?>" rel="stylesheet"/>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false&language=ru"></script>
    <script src="<?= Controller::url('javascript', 'jquery-2.1.3.js')?>"></script>
    <script src="<?= Controller::url('javascript', 'map.js'); ?>"></script>
    <script src="<?= Controller::url('javascript', 'form.js'); ?>"></script>
    <script>
        window.URLS = {
            MAP_POINTS: "<?= Controller::url('ajax', 'map') ?>"
        }
    </script>
</head>
<body>
<?= $this->displayPartial('common/navigation'); ?>