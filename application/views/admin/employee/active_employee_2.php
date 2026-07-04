
    <style>
    .ami_tHeader {background-color: #088 !important;}.ami_tHeader > tr >th {border: 1px solid #088 !important;color: #fff !important;padding-left: 5px !important;}
    .table-responsive{min-height: 420px !important;}
    .amtltip {position: relative;display: inline-block;cursor: pointer;/*  border-bottom: 1px dotted black;*/}
    .amtltip .tlptext{visibility:hidden;width: 180px; background-color: rgba(0, 18, 19, 0.99);color: #fff; text-align: center;border-radius: 6px;padding: 10px 10px 10px 10px;position: absolute;z-index: 1;  bottom: 110%;  left: 50%;  margin-left: -50%;white-space: pre-wrap;white-space: -moz-pre-wrap;white-space: -pre-wrap;white-space: -o-pre-wrap;word-wrap: break-word;}.amtltip .tlptext::after {content: ""; position: absolute;top: 100%; left: 50%;margin-left: -5px;border-width: 5px; border-style: solid;border-color: rgba(0, 18, 19, 0.99) transparent transparent transparent;}.amtltip:hover .tlptext {visibility:visible;}
    #perfrmView{display:none;}.timeDisplay{float: right;font-size: 11px; color:#7b7b7b;}
    .memMessageList{background-color: #ECF2EF;padding:15px;border:1px solid #e1e1e1;border-radius: 5px;}.memMessageList h6{ color:#4F46B1;font-size: 1rem;}
    
    #tchatList{margin: 10px 0px 10px 0px;padding: 10px;border: 1px solid #8080801f;}
    .direct-chat-name{ font-weight:600;}.direct-chat-timestamp{ color: #7b6f6f;font-weight: lighter;font-size: 11px;padding-left: 5px;}
    .direct-chat-text {border-radius: 5px;position: relative;padding: 5px 10px;background: #e8f7d4;border: 1px solid #e0f4c5;margin: 5px 0 0 50px;color: #444;}.direct-chat-msg::after {content: " ";display: table;}
    .direct-chat-msg::after {clear: both;}::after, ::before {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}.direct-chat-warning .right > .direct-chat-text { background: #f39c12;border-color: #f39c12;color: #fff;}.right .direct-chat-text {margin-right: 50px;margin-left: 0;background-color: #eaeaea;border: 1px solid #e1e0e0;
    }.direct-chat-info { display: block;margin-bottom: 2px;font-size: 12px;}.direct-chat-msg, .direct-chat-text { display: block;}.right .direct-chat-img {float: right;}.direct-chat-msg{ margin:10px !important; }
    .direct-chat-img {border-radius: 50%;float: left;width: 40px;height: 40px;}
    .myChatCon{ color: #009bbf;font-weight: 600;text-transform: uppercase;border-bottom: 1px solid #3003;padding: 5px 0px 5px 0px;}
    .myChatCon span{ border:1px solid #009bbf;padding:7px 5px 4px 5px;}
    .myChatCon i{color: white;padding: 8px;background-color: #009bbf;}
    #chtConversion{height: 350px;overflow: auto;}
    #writeConversion{}
    .pstRemarks{color: #4636EE;font-weight: 700;background-color: #4636EE33;padding: 10px 10px 10px 10px;border: 1px solid #4636EE26;}
    </style>

    <div class="inner-body">
        <div class="page-header">
        <div>
        <h2 class="main-content-title tx-24 mg-b-5">Active Employee</h2>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('staff/dashboard');?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $breadcrums; ?></li>
        </ol>
        </div>
        <div class="d-flex">
        <div class="justify-content-center">
        <a href="<?php echo $bckUrl;?>" class="btn btn-white btn-icon-text my-2 me-2"> <i class="ti-arrow-left me-2"></i> Back</a>
        <a href="javascript:void(0)" class="btn btn-primary btn-icon-text my-2 me-2"> <i class="ti-search me-2"></i> Search</a>
        </div>
        </div>
        </div>      
    <div class="row row-sm" style="margin:15px -10px 75px -10px;">
        <div class="col-lg-12 col-md-12">
        <div class="card">
        <div class="card-header  border-0"> <h5 class="card-title">Active Employee</h5></div> 
        <div class="card-body">
        <div class="row row-sm">
        <div class="col-md-12 col-lg-12">
        <div id="getPrfrmList">
        <div class="table-responsive">
        <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="active_employee">
        <thead class="ami_tHeader">
        <tr>
        <th>SL. </th>
        <th>Employee Id</th>
        <th>Employee Name</th>
        <th>Mobile Number</th>
        <th>Email-Id</th>
        <th>Status</th>
        <th>Action</th> 
        </tr>
        </thead>
        </table>
        </div>
        </div>
        </div>
        </div>       
        </div>
        </div>
        </div>
    </div>
    <input type="hidden" id="target" name="target" value="<?php echo $target;?>" />
    <script src="<?php echo base_url('assets/plugins/quill/quill.min.js');?>"></script>
    <script>
    var reportBranch = '';
    $(document).ready(function()
    {
    let searchObj = {};
    var target = $('#target').val();
    reportBranch = { printTable: function(search_data) {getpaginate(search_data, '#active_employee', target, 'Only For Id,Employee Name.'); } }
    reportBranch.printTable(searchObj);
    });
    </script>
