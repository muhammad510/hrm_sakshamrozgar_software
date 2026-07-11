<div class="inner-body">
    <style>
        .inrGrn i {
            font-size: .75rem;
            color: #02aa73
        }

        .inrBlue i {
            font-size: .75rem;
            color: #0283aa
        }

        .inrRed i {
            font-size: .75rem;
            color: #cc5d1a
        }

        .form-control[readonly] {
            background-color: #fff !important;
        }

        .miForm-control {
            width: 60px !important;
            margin-right: 5px;
            display: block;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.175rem .4rem 0.175rem 0.4rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1.5;
            color: #0D3E73;
            background-color: #ffffff;
            background-clip: padding-box;
            border: 1px solid #e8e8f7;
            border-radius: 3px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            height: 38px;
            border-radius: 5px;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .miForm-control:focus {
            color: #42617F;
            background-color: #fff;
            border-color: #e8e8f7;
            outline: 0;
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
            margin-bottom: 75px;
            border-radius: 5px;
            background-color: #fff;
        }

        .ami_tHeader>tr>th {
            color: #FFFFFF !important;
            border: 1px solid #088 !important;
            padding: 12px 0px 12px 5px !important;
        }

        .ami_tHeader>tr {
            border: 1px solid #088 !important;
        }

        #searchBranchDetails,
        #adBtnActn,
        #getSalaryDet {
            display: none;
        }

        .pyDet {
            border-left: 1px solid #45545436;
            border-right: 1px solid #45545436;
        }

        .pyHdr {
            color: #009966;
            padding: 10px;
            font-weight: bold;
            text-transform: uppercase;
            border-top: 3px solid #096;
            background-color: #ddffea45;
            margin: 0px -1px 0px -1px;
        }

        .pyDeduHdr {
            color: #993200;
            padding: 10px;
            font-weight: bold;
            text-transform: uppercase;
            border-top: 3px solid #993200;
            background-color: #9932000a;
            margin: 0px -1px 0px -1px;
        }

        .pyListDet {
            list-style: none;
            padding-left: 0px !important;
            margin-bottom: 0px;
        }

        .pyListDet li {
            padding: 10px 20px 10px 10px;
            border-bottom: 1px dashed #1f74bf;
            color: #04559d;
        }

        .pyListDet li:last-child {
            border-bottom: 0px;
            font-weight: bold;
            background-color: #a0f4fd4d;
        }

        .mStrong {
            font-weight: 600;
            float: right;
            color: #1a8c03;
        }

        .mDedStrong {
            font-weight: 600;
            float: right;
            color: #036e8e;
        }

        .pyListDeduDet {
            list-style: none;
            padding-left: 0px !important;
            margin-bottom: 0px;
        }

        .pyListDeduDet li {
            padding: 10px 20px 10px 10px;
            border-bottom: 1px dashed #bf451f;
            color: #9d7004;
        }

        .pyListDeduDet li:last-child {
            border-bottom: 0px;
            font-weight: bold;
            background-color: #ffe3bc;
        }

        .pyDed {
            border: 1px solid #45545436;
            border-top: 0px;
        }

        .netPyble {
            background-color: #a3fda01c;
            padding: 10px 20px 10px 10px;
            margin-bottom: 10px;
            border: 1px solid #45545436;
            text-align: right;
            text-transform: uppercase;
            font-weight: bold;
            color: #464646;
        }

        .txtFrm {
            padding: 15px 10px 15px 10px;
            background-color: #C1C1C13D;
            text-transform: uppercase;
            font-weight: bold;
            color: #646464;
            border: 1px solid #645BCA29;
            margin-bottom: 15px;
        }

        .salaryID {
            padding: 15px 10px 15px 10px;
            background-color: #C1C1C13D;
            text-transform: uppercase;
            font-weight: bold;
            color: #646464;
            border: 1px solid #645BCA29;
            margin-bottom: 15px;
        }

        #vSalCode {
            color: #645BCA;
        }

        .txtFrm span {
            float: right;
            text-transform: capitalize;
            color: #645BCA
        }

        #netPaybleSalAmt,
        #empCtC {
            color: green;
        }

        .createBy {
            background-color: #0099CC12;
            margin-top: 20px;
            padding: 10px;
            color: #393939;
            border: 1px solid #0099CC45;
        }

        .createDt {
            padding: 10px;
            background-color: #0099CC12;
            color: #393939;
            border: 1px solid #0099CC45;
        }

        .crSpan {
            font-weight: bold;
            float: right;
            padding-right: 10px;
            color: #0080AA;
        }

        .modifyDt {
            padding: 10px;
            background-color: #ffff0042;
            color: #393939;
            border: 1px solid #dddd05d1;
        }

        .mdSpan {
            font-weight: bold;
            float: right;
            padding-right: 10px;
            color: #797900d1
        }

        .updateBy {
            background-color: #ffff0042;
            margin-top: 20px;
            padding: 10px;
            color: #393939;
            border: 1px solid #dddd05d1;
        }

        .input-group-text i {
            color: #06a470;
        }

        .miSlwdth {
            width: 92.33%
        }

        .miLvs {
            padding: 5px 12px 5px 12px;
        }

        .delMsg {
            text-align: center;
            font-size: 20px;
            margin: 30px 0px 10px 0px;
            color: #00805c;
        }

        .actnData {
            text-align: center;
            margin: 0px 0px 20px 0px;
            color: #716c6c;
            font-size: .8rem;
        }

        .delMsg i {
            background-color: #00805c;
            padding: .5rem;
            font-size: .75rem;
            border-radius: .5rem;
            color: #fff;
        }
    </style>
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"><?php echo $title; ?></h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('staff/dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Salary Master</li>
            </ol>
        </div>
        <div class="d-flex">
            <div class="justify-content-center">
                <a href="<?php echo base_url('staff/dashboard'); ?>" class="btn btn-success btn-icon-text my-2 me-2" title="Dashboard"> <i class="ti-home"></i> Dashboard </a>
                <button type="button" class="btn btn-primary btn-icon-text my-2 me-2" id="miArvClk"> <i class="fe fe-filter me-2"></i> Current Time </button>
                <a href="<?php echo base_url('auth/login/signout'); ?>" class="btn btn-danger btn-icon-text  my-2 me-2"> <i class="fe fe-power me-2"></i> Sign Out </a>
            </div>
        </div>
    </div>
    <div class="row row-sm" id="searchBranchDetails">
        <div class="cardTtl">
            <div class="miHeader"><span class="miLst"><i class="pe-7s-cash"></i>Search Salary Details</span></div>
            <form method="post" id="search_branch">
                <div class="col-md-12 col-lg-12">
                    <?php //print_r($desigList);
                    ?>
                    <div class="row row-sm">
                        <div class="col-6">
                            <label>Search Based On:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                </div>

                                <div class="miSlwdth" style="width:92.33%">
                                    <select class="form-control select2-with-search arvOnChange" name="searchTyp" id="searchTyp">
                                        <option value=""> Choose one </option>
                                        <option value="all"> All </option>
                                        <?php if ($desigList) {
                                            foreach ($desigList as $desig) { ?>
                                                <option value="<?php echo $desig->id; ?>"><?php echo $desig->designation_name; ?></option>
                                            <?php }
                                        } else { ?> <option value="">No data available</option><?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label>Gross Salary Amount:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="si si-puzzle"></i></span>
                                </div>
                                <input type="text" class="form-control" name="grossAmt" id="grossAmt">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <a href="javascript:void(0)" class="btn ripple btn-outline-dark srchPanel">
                                <i class="fe fe-arrow-left"></i> Back</a>
                            <button class="btn ripple btn-outline-success pull-right" onclick="return get_search(reportBranch,'#search_branch','#branch_det')">
                                <i class="ti-search"></i> Search
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Row -->
    <div class="row row-sm">
        <span id="adBtnActn"><?php echo $adBtnActn; ?></span>
        <div class="cardTtl">
            <div class="miHeader">
                <span class="miLst"><i class="pe-7s-cash"></i><span id="mstrTitle"><?php echo $title; ?></span></span>
                <!-- <span class="miBck"><a href="<?php echo $bckUrl; ?>"><i class="ti-arrow-left"></i></a></span> -->
                <span class="miBck">
                    <a href="javascript:void(0);" style="margin-left:-5px;" id="srchBtn" title="Click to search details" class="miDefault srchPanel">
                        <i class="ti-search"></i>
                    </a>
                </span>
                <span class="miBck">
                    <a href="javascript:void(0);" style="margin-left:-5px;" data-id="Add New Salary " title="Click to add salary details" class="miAction" id="AddNew">
                        <i class="ti-plus"></i>
                    </a>
                </span>
            </div>
            <div class="row row-sm">
                <input type="hidden" id="target" value="<?php echo $target; ?>" />
                <?php //echo number_format(1000.5, 2, '.', '');
                ?>
                <div id="getSalaryDet">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="salaryID">
                                Salary ID <span id="vSalCode">Munger</span>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="txtFrm">
                                Branch Office <span id="vBrnOffice">Munger</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="txtFrm">
                                Desgination Name <span id="vDesignation">Assistant manager</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="pyDet">
                                <div class="pyHdr">Payment Details</div>
                                <ul class="pyListDet">
                                    <!--<li>Gross Salary Amount<span class="mStrong" id="vGrsAmt">------</span></li>-->
                                    <li>Basic Pay<span class="mStrong" id="vBasPay">------</span></li>
                                    <li>HRA<span class="mStrong" id="vHRAPay">------</span></li>
                                    <li>TA<span class="mStrong" id="vTAPay">------</span></li>
                                    <li>EA<span class="mStrong" id="vDAPay">------</span></li>
                                    <li>PDA<span class="mStrong" id="vPAPay">------</span></li>
                                    <li>Bonus<span class="mStrong" id="vBonusPay">------</span></li>
                                    <li>Special Allowance<span class="mStrong" id="vMediAllPay">------</span></li>
                                    <li>Insentive<span class="mStrong" id="vInstvPay">------</span></li>
                                    <li>Other Income<span class="mStrong" id="vOthrIncPay">------</span></li>
                                    <li>Gross Salary Amount<!--Gross Earnings--><span class="mStrong" id="vTgrsPay">------</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pyDed">
                                <div class="pyDeduHdr">Deduction Details</div>
                                <ul class="pyListDeduDet">
                                    <li>Provident Fund Employee<span class="mDedStrong" id="vPfPay">------</span></li>
                                    <li>Provident Fund Employer<span class="mDedStrong" id="vPfPayEmplyr">------</span></li>
                                    <li>Medical Deduction<span class="mDedStrong" id="vAdvncPay">------</span></li>
                                    <li>TDS<span class="mDedStrong" id="vTdsPay">------</span></li>
                                    <li>Mobile Allowance<span class="mDedStrong" id="vInsurncPay">------</span></li>
                                    <li>ESIC Employee<span class="mDedStrong" id="esicEmp">------</span></li>
                                    <li>ESIC Employer<span class="mDedStrong" id="esicEmpLyr">------</span></li>
                                    <li>PT<span class="mDedStrong" id="vOthrDeduPay">------</span></li>
                                    <li>Gross Deductions<span class="mDedStrong" id="tGrossDeduction">------</span></li>
                                </ul>
                            </div>
                            <!-- <div class="createBy" style="margin-bottom:20px;">Created By <span class="crSpan" id="createBy">Amit Kumar</span></div>   
                      <div class="row">
                            <div class="col-md-6"><div class="createDt">Create Date <span class="crSpan"  id="createDt">20-Jan-2024</span></div></div>
                            <div class="col-md-6"><div class="modifyDt">Modified  Date <span class="mdSpan" id="modifyDt">20-Jan-2024</span></div></div>
                        </div>
                      
                       <div class="updateBy" >Updated By <span class="mdSpan" id="updateBy">Amit Kumar</span></div>-->

                        </div>
                        <div class="col-md-12">
                            <div class="netPyble">NET Payable :
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-currency-rupee" viewBox="0 0 16 16">
                                    <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4z" />
                                </svg><span id="netPaybleSalAmt">------</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="netPyble" style="margin-top:-10px;border-top: 0px;">CTC :
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-currency-rupee" viewBox="0 0 16 16">
                                    <path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4z" />
                                </svg><span id="empCtC">------</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="javascript:void(0)" class="btn ripple btn-outline-dark miAction pull-right" id="viewMiBck" data-id="Salary Manage">
                                <i class="ti-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>

                <div id="vTbleShw">
                    <div class="table-responsive">
                        <table class="table text-nowrap text-md-nowrap table-striped table-bordered table-hover mg-b-0" id="branch_det">
                            <thead class="ami_tHeader">
                                <tr>
                                    <th>
                                        <div style="width:50px;">S No.</div>
                                    </th>
                                    <th>
                                        <div style="width:80px;">SAL CODE</div>
                                    </th>
                                    <th>Branch</th>
                                    <th>DESIGNATION</th>
                                    <th>
                                        <div style="width:140px;">GROSS SALARY AMT.</div>
                                    </th>
                                    <th>DEDUCTION</th>
                                    <th>NET PAYBLE AMT</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <form id="add_salary_master" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                    <input type="hidden" name="basicUpdtID" id="basicUpdtID">
                    <div id="vCreateNew" style="display:none;">
                        <div class="row">

                            <div class="col-md-4 col-lg-4 col-sm-4 col-4">
                                <label>Office Branch:<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="si si-organization"></i></span>
                                    </div>
                                    <div class="miSlwdth">
                                        <select class="form-control select2-with-search arvSel" name="brOffice" id="brOffice" data-id="<?php echo $getDepartment; ?>" data-placement-id="department">
                                            <option value=""> --- Select One --- </option>
                                            <?php if ($branchList) {
                                                foreach ($branchList as $branch) { ?>
                                                    <option value="<?php echo $branch->id; ?>"><?php echo $branch->branch_name; ?></option>
                                                <?php }
                                            } else { ?><option value="">No branch available</option><?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 col-lg-4 col-sm-4 col-4">
                                <label>Department:<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-crown"></i></span>
                                    </div>
                                    <div class="miSlwdth">
                                        <select class="form-control select2-with-search arvSel" name="department" id="department" data-id="<?php echo $getDesignation; ?>" data-placement-id="designation">
                                            <option value=""> --- Select One --- </option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4 col-lg-4 col-sm-4 col-4">
                                <label>Desgination Name:<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ti-crown"></i></span>
                                    </div>
                                    <div class="miSlwdth">
                                        <select class="form-control select2-with-search" name="designation" id="designation">
                                            <option value=""> --- Select One --- </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pyDetails">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="alert alert-solid-success"><strong>Payment Details</strong></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12"><label>Gross Salary:<span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="ti-wallet"></i></span></div>
                                                <input type="text" class="form-control" name="grsSalAmt" id="grsSalAmt" value="0" oninput="this.value = this.value.toUpperCase().replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label>Basic Pay:<span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="fe fe-percent"></i></span></div>
                                                <input type="text" class="miForm-control setZeroInpt" name="basicPayPercent" id="basicPayPercent" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')">
                                                <input type="text" class="form-control setZeroInpt" name="basicPayAmt" id="basicPayAmt" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>HRA:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fe fe-percent"></i></span>
                                                </div>
                                                <input type="text" class="miForm-control setZeroInpt" name="hraPercent" id="hraPercent" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')">
                                                <input type="text" class="form-control setZeroInpt" name="hraPayAmt" id="hraPayAmt" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>TA:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fe fe-percent"></i></span>
                                                </div>
                                                <input type="text" class="miForm-control setZeroInpt" name="taPercent" id="taPercent" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')">
                                                <input type="text" class="form-control setZeroInpt" name="taPayAmt" id="taPayAmt" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>EA:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fe fe-percent"></i></span>
                                                </div>
                                                <input type="text" class="miForm-control setZeroInpt" name="daPercent" id="daPercent" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')">
                                                <input type="text" class="form-control setZeroInpt" name="daPayAmt" id="daPayAmt" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>PDA:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fe fe-percent"></i></span>
                                                </div>
                                                <input type="text" class="miForm-control setZeroInpt" name="paPercent" id="paPercent" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')">
                                                <input type="text" class="form-control setZeroInpt" name="paPayAmt" id="paPayAmt" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>Special Allowance:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fe fe-percent"></i></span>
                                                </div>
                                                <input type="text" class="miForm-control setZeroInpt" name="mediAllPercent" id="mediAllPercent" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')">
                                                <input type="text" class="form-control setZeroInpt" name="mediAllPayAmt" id="mediAllPayAmt" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>Bonus:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="si si-wallet"></i></span></div>
                                                <input type="text" class="form-control setZeroInpt" name="bonusPayAmt" id="bonusPayAmt" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label>Insentive:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text"><i class="si si-wallet"></i></span></div>
                                                <input type="text" class="form-control setZeroInpt" name="basicInsentvAmt" id="basicInsentvAmt" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>Other Income:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="si si-wallet"></i></span>
                                                </div>

                                                <input type="text" class="form-control setZeroInpt" name="otherBsInc" id="otherBsInc" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="miDeduction">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="alert alert-solid-warning"><strong>Deduction Details</strong></div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-6">
                                            <label>Medical Allowance:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="si si-wallet"></i></span>
                                                </div>
                                                <input type="text" class="form-control setZeroInpt" name="advancePayAmt" id="advancePayAmt" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\  *?)\  */g, '$1')">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>Mobile Allowance:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="si si-wallet"></i></span>
                                                </div>

                                                <input type="text" class="form-control setZeroInpt" name="insurancePayAmt" id="insurancePayAmt" oninput="this.value = this.value.replace(/[^0-9 .]/g, '').replace(/(\  *?)\  */g, '$1')">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label>Provident Fund:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fe fe-percent"></i></span>
                                                </div>
                                                <input type="text" class="miForm-control setZeroInpt" name="pfPercent" id="pfPercent" oninput="this.value = this.value.replace(/[^0-9 .]/g, '').replace(/(\  *?)\  */g, '$1')">
                                                <input type="text" class="form-control setZeroInpt" name="pfPayAmt" id="pfPayAmt" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label>TDS:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fe fe-percent"></i></span>
                                                </div>
                                                <input type="text" class="miForm-control setZeroInpt" name="tdsPercent" id="tdsPercent" oninput="this.value = this.value.replace(/[^0-9 .]/g, '').replace(/(\  *?)\  */g, '$1')">
                                                <input type="text" class="form-control setZeroInpt" name="tdsPayAmt" id="tdsPayAmt" readonly="readonly">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label>PT:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="si si-wallet"></i></span>
                                                </div>
                                                <input type="text" class="form-control setZeroInpt" name="otherDedPayAmt" id="otherDedPayAmt" oninput="this.value = this.value.replace(/[^0-9 .]/g, '').replace(/(\  *?)\  */g, '$1')">
                                            </div>
                                        </div>




                                        <div class="col-6">
                                            <label>ESIC Employee:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fe fe-percent"></i></span>
                                                </div>
                                                <input type="text" class="miForm-control setZeroInpt" name="esicEmployee" id="esicEmployee" oninput="this.value = this.value.replace(/[^0-9 .]/g, '').replace(/(\  *?)\  */g, '$1')">
                                                <input type="text" class="form-control setZeroInpt" name="esicEmpPayAmt" id="esicEmpPayAmt" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label>ESIC Employer:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fe fe-percent"></i></span>
                                                </div>
                                                <input type="text" class="miForm-control setZeroInpt" name="esicEmployer" id="esicEmployer" oninput="this.value = this.value.replace(/[^0-9 .]/g, '').replace(/(\  *?)\  */g, '$1')">
                                                <input type="text" class="form-control setZeroInpt" name="esicEmpAmt" id="esicEmpAmt" readonly="readonly">
                                            </div>
                                        </div>





                                        <div class="col-12">
                                            <label>Net Payble:</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="mdi mdi-cash"></i></span>
                                                </div>
                                                <input type="text" class="form-control setZeroInpt" name="netPayAmt" id="netPayAmt" readonly="readonly">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <a href="javascript:void(0)" class="btn ripple btn-outline-dark miAction" id="miBck" data-id="Salary Manage">
                                    <i class="ti-arrow-left"></i> Back
                                </a>
                                <button class="btn ripple btn-outline-success pull-right amiStl" id="salaryManage"><i class="ti-save"></i> Submit</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>




    <!-------------------------Activity Change start------------------------------->
    <div id="statusChange" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style=" padding-left: 0px;" aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right;"><i class="si si-close"></i></button>
                    <div class="delMsg"><i class="si si-wallet"></i> Salary Status</div>
                    <div class="actnData"><i class="si si-power"></i> Are you sure want to activate of salary ID #F33333</div>
                    <div id="mdlFtrBtn">
                        <button type="button" class="btn btn-outline-secondary waves-effect waves-light pull-right arvAction" id="cnfChanges" data-id="@misingh143">
                            Confirm <i class="si si-check"></i>
                        </button>
                        <button type="button" class="btn btn-outline-dark pull-right miIcn " data-bs-dismiss="modal" style="margin-right:10px;">
                            <i class="fa fa-arrow-left"></i> Back
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------------------------Activity Change start------------------------------->







    <style>
        .miDeduction i {
            color: #b96600;
        }

        .pyDetails i {
            color: #016a2d;
        }

        .pyDetails {
            background-color: #E0F2C969;
            padding: 10px;
            border: 1px solid #D3EAB73B;
            margin-bottom: 20px;
        }

        .miDeduction {
            background-color: #ffebd357;
            padding: 10px;
            border: 1px solid #ffebd391;
            margin-bottom: 20px;
        }

        .mibdge {
            padding: 6px 0px 6px 0px;
            width: 70px;
        }

        .ami_tHeader {
            background-color: #088;
        }

        .ami_tHeader>tr>th {
            color: #fff;
            font-weight: 600;
            padding: 13px 7px 13px 7px;
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
    </style>
    <script src="<?php echo base_url('assets/js/setting/salary_master.js'); ?>"></script>