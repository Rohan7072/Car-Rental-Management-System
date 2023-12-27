<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Siddhi CarRental Pune</title>

    <style>
    /*-----------------------------------*\
  #FEATURED CAR
\*-----------------------------------*/

    .featured-car .title-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 10px 15px;
        margin-bottom: 30px;
    }

    .featured-car-link {
        display: flex;
        align-items: center;
        gap: 5px;
        color: hsl(219, 21%, 39%);
        font-size: 0.875rem;
    }

    .featured-car-link span {
        transition: 0.5s ease;
    }

    .featured-car-link:is(:hover, :focus) span {
        color: hsl(240, 22%, 25%);
    }

    .featured-car-link ion-icon {
        margin-top: 3px;
        transition: 0.5s ease;
    }

    .featured-car-link:is(:hover, :focus) ion-icon {
        color: hsl(204, 91%, 53%);
    }

    .featured-car-list {
        margin-left: -20px;
        margin-right: 20px;
        grid-template-columns: minmax(0, 1fr);
        gap: 30px;
    }

    .featured-car-card {
        background: linear-gradient(to top, hsl(216, 75%, 97%); , var(--alice-blue-3));
        border: 1px solid hsl(0, 0%, 100%);
        border-radius: 18px;
        padding: 10px;
        box-shadow: 3px 3px 9px hsla(240, 14%, 69%, 0.2);
    }

    .featured-car-card .card-banner {
        background: hsla(0, 0%, 0%, 0.2);
        aspect-ratio: 3 / 2;
        border-radius: 18px;
        overflow: hidden;
    }

    .featured-car-card .card-banner>img {
        height: 100%;
        object-fit: cover;
    }

    .featured-car-card .card-content {
        padding: 20px 10px 10px;
    }

    .featured-car-card .card-title-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 5px;
        margin-bottom: 15px;
    }

    .featured-car-card .card-title {
        width: calc(100% - 60px);
    }

    .featured-car-card .card-title>a {
        color: inherit;
        width: 100%;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .featured-car-card .card-title>a:is(:hover, :focus) {
        color: hsl(204, 91%, 53%);
    }

    .featured-car-card .year {
        font-family: 'Nunito', sans-serif;
        font-size: 0.875rem;
        font-weight: 600;
        padding: 3px 12px;
        border: 2px dashed hsla(204, 91%, 53%, 0.4);
        border-radius: 14px;
    }

    .featured-car-card .card-list {
        display: grid;
        grid-template-columns: 1fr;
        gap: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid hsla(0, 0%, 0%, 0.1);
        margin-bottom: 15px;
    }

    .featured-car-card .card-list-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .featured-car-card .card-list-item ion-icon {
        font-size: 20px;
        color: hsl(204, 91%, 53%);
        --ionicon-stroke-width: 38px;
    }

    .featured-car-card .card-item-text {
        color: hsl(219, 21%, 39%);
        font-size: 0.875rem;
    }

    .featured-car-card .card-price-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .featured-car-card .card-price {
        font-family: 'Nunito', sans-serif;
        font-size: 0.875rem;
        color: hsl(240, 22%, 25%);
    }

    .featured-car-card .card-price strong {
        font-size: 1.5rem;
        font-weight: 400;
    }

    .featured-car-card .btn:last-child {
        --height: 36px;
        min-width: 100%;
    }

    .featured-car-card .fav-btn {
        --background: hsl(208, 86%, 92%);
        --color: hsl(204, 80%, 63%);
        --height: 36px;
        --width: 36px;
        --shadow-2: none;
    }

    .featured-car-card .fav-btn ion-icon {
        font-size: 18px;
    }

    .featured-car-card .fav-btn:is(:hover, :focus) {
        --background: hsl(336, 35%, 92%);
        --color: hsl(0, 79%, 63%);
    }

    .blog .section-title {
        margin-bottom: 30px;
    }

    .get-start .section-title {
        margin-bottom: 25px;
    }

    .blog-card .card-banner {
        aspect-ratio: 3 / 2;
        position: relative;
        overflow: hidden;
    }

    .blog-card .card-banner a:first-child {
        height: 100%;
    }

    .blog-card .card-banner img {
        height: 100%;
        object-fit: cover;
    }

    .blog-card .card-title {
        margin-bottom: 20px;
    }

    .blog-card .card-title>a {
        color: inherit;
    }

    img ion-icon {
        display: block;
    }

    .blog-card .card-banner img {
        height: 100%;
        object-fit: cover;
    }

    .featured-car-card .card-banner>img {
        height: 100%;
        object-fit: cover;
    }

    .w-100 {
        width: 100%;
    }


    @media (min-width: 350px) {
        /**
   * FEATURED CAR
   */

        .featured-car-card .card-list {
            grid-template-columns: 1fr 1fr;
        }

        .featured-car-card .card-price {
            margin-right: auto;
        }

        .featured-car-card .btn:last-child {
            min-width: max-content;
            padding-inline: 15px;
        }
    }
    </style>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="assets/plugins/fullcalendar/main.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


    <!-- map -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">