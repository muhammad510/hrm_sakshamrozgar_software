<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<div class="inner-body">
    <!-- Page Header -->

    <!-- End Page Header -->
    <style>
        .miSlwdth {
            width: 92.33%;
            margin: -38px 0px 0px 39px !important;
        }

        .datetimepicker {
            z-index: 100009 !important;
        }

        #searchBranchDetails {
            display: none;
        }

        .miBck a:hover {
            background-color: #645bca;
            color: #fff;
        }

        .miBck {
            font-weight: 600;
            text-transform: uppercase;
            float: right;
            margin-right: 10px;
            padding-top: 7px;
        }

        .miBck a {
            border: 1px solid #645bca;
            padding: 8px 12px 8px 12px;
            border-radius: 5px;
            color: #645bca;
            font-weight: bold;
        }

        .miLst {
            font-weight: 600;
            text-transform: uppercase;
        }

        .miLst i {
            background-color: #645bca;
            padding: 11px 11px 10px 10px;
            margin-right: 10px;
            border-radius: 20px;
            color: #fff;
            font-weight: bold;
        }

        .miHeader {
            padding: 10px 15px 10px 15px;
            border-bottom: 1px solid #cccece;
            margin: 0px -10px 20px -10px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .cardTtl {
            border: 1px solid #fff;
            padding: 0px 0px 40px 0px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #fff;
        }

        .mibdge {
            padding: 6px 0px 6px 0px;
            width: 70px;
            color: #fff;
            text-align: center;
            font-weight: 600;
        }

        .miHeader1 {
            padding: 18px 15px 18px 15px;
            border-bottom: 1px solid #cccece;
            margin: 0px -10px 20px -10px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .ami_tHeader {
            background-color: #088;
        }

        .ami_tHeader>tr>th {
            color: #fff !important;
            font-weight: 600;
            padding: 13px 7px 13px 7px;
            height: 25px;
        }

        .miSuccess {
            padding: 6px 10px 6px 10px;
            color: #19b159;
            border: 1px solid #19b159;
            border-radius: 2px;
        }

        .miSuccess:hover {
            background-color: #19b159;
            color: #fff;
        }

        .miDefault {
            padding: 6px 10px 6px 10px;
            color: #3b4863;
            border: 1px solid #3b4863;
            border-radius: 2px;
        }

        .miDefault:hover {
            background-color: #3b4863;
            color: #fff;
        }

        .miDanger {
            padding: 6px 10px 6px 10px;
            color: #f16d75;
            border: 1px solid #f16d75;
            border-radius: 2px;
        }

        .miDanger:hover {
            background-color: #f16d75;
            color: #fff;
        }

        .wrKng {
            color: white;
            background-color: rgb(4, 155, 215);
            padding: 3px 8px 3px 8px;
            font-size: .65rem;
            border-radius: 12px;
        }

        .miClr {
            height: 38px;
        }

        #daily_log_list thead>tr>th {
            padding: 5px !important;
            border: 1px solid #088 !important;
        }

        #loggedDate {
            color: #506ddb;
            margin: -10px 0px 10px 0px;
            text-transform: uppercase;
            font-weight: 600;
        }

        .noRcrd {
            text-align: center;
            color: #b00616;
            font-weight: bold;
            text-transform: uppercase;
        }

        .locateNow {
            color: #fbf7f7;
            padding: 5px 10px 3px 10px;
            background-color: #0051b9;
            cursor: pointer;
            border-radius: 3px;
        }

        .locateNow:hover {
            background-color: #045fd5;
        }

        #traceMap {
            width: 100%;
            margin-top: -10px;
            display: none;
        }

        .trcSuccess {
            height: 350px;
        }

        .trcErr {
            padding: 10px 0px 10px 10px;
            background-color: #ff63475e;
            color: #d52000;
        }

        #mUser {
            margin: -48px 0px 5px 55px;
            font-size: 11px;
        }

        .mEmpID {
            font-weight: 700;
            color: #5b5b5a;
        }

        #memDetails {
            padding: 5px 0px 5px 0px;
        }

        .mEmpName {
            font-weight: 700;
            font-size: 12px;
            color: #005ec1;
        }

        #memDetails img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .mEmpTime {
            font-weight: 600;
            color: #039b29;
        }

        .mEmpOutTime {
            font-weight: 600;
            color: #d06b00;
        }

        .wrkHr {
            color: #005462;
            font-weight: 700;
        }
    </style>

    <div class="row row-sm">
        <div class="cardTtl">
            <div class="miHeader"> <span class="miLst"><i class="fe fe-sliders"></i><?php echo $title; ?></span>
               
            </div>
            <div class="col-md-12 col-lg-12">
                <input type="hidden" id="target" value="<?php echo $target; ?>" />
                <div class="row row-sm" id="amiResult">
                    <div class="table-responsive">
                        <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="enquiry_list">
                            <thead class="ami_tHeader">
                                <tr>
                                    <th>S. No. </th>
                                    <th>Name</th>
                                    <th>EmailId</th>
                                    <th>Phone No.</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Row -->
    </div>

    <script src="<?php echo base_url('assets/js/admin/website_data.js'); ?>"></script>