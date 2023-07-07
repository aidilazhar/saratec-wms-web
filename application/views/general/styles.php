<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/font-awesome.css") ?>">
<!-- ico-font-->
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/vendors/icofont.css") ?>">
<!-- Themify icon-->
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/vendors/themify.css") ?>">
<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/vendors/flag-icon.css") ?>">
<!-- Feather icon-->
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/vendors/feather-icon.css") ?>">
<!-- Plugins css start-->
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/vendors/slick.css") ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/vendors/slick-theme.css") ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/vendors/scrollbar.css") ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/vendors/animate.css") ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/vendors/datatables.css") ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/vendors/echart.css") ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/vendors/sweetalert2.css") ?>">
<!-- Plugins css Ends-->
<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/vendors/bootstrap.css") ?>">
<!-- App css-->
<link id="color" rel="stylesheet" href="<?= base_url("assets/css/color-1.css") ?>" media="screen">
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/responsive.css") ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/style.css") ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/vendors/chartist.css") ?>">

<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<style>
    .campaign-list {
        column-count: 4;
        column-gap: 20px;
        margin-bottom: 15px;
    }

    .campaign-list li {
        position: relative;
    }

    .campaign-list li+li::before {
        position: absolute;
        content: "";
        width: 1px;
        height: 20px;
        background-color: var(--chart-text-color);
        top: 50%;
        transform: translateY(-50%);
        left: -10px;
        opacity: 0.6;
    }

    [dir=rtl] .campaign-list li+li::before {
        left: unset;
        right: -10px;
    }

    .campaign-list .campaign-box {
        background: linear-gradient(180deg, var(--course-light-btn) 0%, rgba(242, 243, 247, 0) 100%);
        border-radius: 5px;
        padding: 6px 10px;
    }

    .campaign-list .campaign-box {
        background: linear-gradient(180deg, var(--course-light-btn) 0%, rgba(242, 243, 247, 0) 100%);
        border-radius: 5px;
        padding: 6px 10px;
    }

    .custom-filter {
        display: inline-block;
    }

    .dataTables_length>label>select,
    .dataTables_columns>label>select,
    .dataTables_filter>label>input {
        display: inline-block !important;
    }

    .dataTables_length>label>,
    .dataTables_columns>label>,
    .dataTables_filter>label> {
        display: inline-block;
    }

    .dataTables_wrapper .dataTables_columns {
        text-align: center;
    }

    .dataTables_wrapper button {
        color: initial;
        border-radius: 0px;
    }

    .swal-modal .swal-text {

        text-align: center;
    }

    @media (min-width: 1400px) {
        .page-wrapper.compact-wrapper .page-body-wrapper .page-body {
            min-height: calc(100vh - 55px) !important;
            padding-top: 50px;
            padding-left: 200px;
            padding-right: 200px;
            margin-top: 0px;
            margin-left: 0px;
        }
    }

    @media (min-width: 1000px) and (max-width: 1399.98px) {
        .page-wrapper.compact-wrapper .page-body-wrapper .page-body {
            min-height: calc(100vh - 55px) !important;
            padding-top: 50px;
            padding-left: 100px;
            padding-right: 100px;
            margin-top: 0px;
            margin-left: 0px;
        }
    }

    @media (max-width: 999.99px) {
        .page-wrapper.compact-wrapper .page-body-wrapper .page-body {
            min-height: calc(100vh - 55px) !important;
            padding-top: 50px;
            padding-left: calc(100wh - 50px) !important;
            padding-right: calc(100wh - 50px) !important;
            margin-top: 0px;
            margin-left: 0px;
        }
    }

    .dropdown-item.active {
        color: #fff;
        opacity: 0.6;
        font-size: 13px;
        padding: 6px 12px;
        border-top: 1px solid #f5f5f5;
        background-color: #0dcaf0;
        line-height: 19px;
    }


    .dropdown-item:hover {
        color: #fff;
        opacity: 0.6;
        font-size: 13px;
        padding: 6px 12px;
        border-top: 1px solid #f5f5f5;
        background-color: #000 !important;
        line-height: 19px;
    }
</style>