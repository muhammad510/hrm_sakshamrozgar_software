<div class="inner-body">


    <!------------------------------------------------------------------------------------------>
    <div class="row row-sm">


        <div class="col-md-12 ">
            <div class="cardTtl">


                <form id="basic_data ">
                    <div class="row row-sm amiCrd p-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="mg-b-10">Name</p>
                                <input type="text" class="form-control" name="company_name" value="<?php echo $enquiry_data->name ?>" readonly>
                            </div>
                            <div class="form-group">
                                <p class="mg-b-10">Mobile Number</p>
                                <input type="text" class="form-control" value="<?php echo $enquiry_data->phone ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="mg-b-10">Email ID</p>
                                <input type="text" class="form-control" name="email" value="<?php echo $enquiry_data->email ?>" readonly>
                            </div>

                        </div>


                        <div class="col-md-12">
                            <label>Message: </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text miClr"><i class="si si-event"></i></span>
                                </div>
                                <textarea class="form-control" name="address" rows="8"><?php echo $enquiry_data->message ?></textarea>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

    <!------------------------------------------------------------------------------------------>
    <!-- Row -->