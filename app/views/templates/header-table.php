<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RS Kasih Ibu - <?= $data['title']; ?></title>

    <!-- favicon-->
    <link rel="icon" href="<?= BASEURL; ?>/img/hospital.png">
    <link href="<?= BASEURL; ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/css/simple-sidebar.css" rel="stylesheet">
    <link href="<?= BASEURL; ?>/css/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- //link untuk memanggil Datatables -->
    <link href="<?= BASEURL; ?>/libs/DataTables/datatables.min.css" rel="stylesheet">

    <!-- Script for Chart js-->
    <script type="text/javascript" src="<?= BASEURL; ?>/vendor/ckeditor/ckeditor/ckeditor.js"></script>
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="<?= BASEURL; ?>/home">
                        <span class="text-primary"><b>Rumah Sakit Kasih Ibu</b></span>  
                    </a>
                </li>

                <?php 
                foreach( $data['menu'] as $m ):?>
                <?php if ( $data['title'] == $m['title'] ){ ?>
                    <li class="active">
                <?php } else { ?>
                    <li>
                <?php } ?>                    
                        <a href="<?= BASEURL; ?>/<?= $m['url']; ?>"><?= $m['title']; ?></a>
                    </li>
                <?php endforeach; ?>
                

                <li>
                    <a href="<?= BASEURL; ?>/auth/logout" class="tombol-logout"> <span class="text-danger"><?= $data['user']['nama_user']; ?><small> (Logout) </small></span></a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">