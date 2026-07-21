<div class="inner-body">


    <!------------------------------------------------------------------------------------------>
    <div class="row row-sm">


        <div class="col-md-12 ">
            <div class="cardTtl">


                <form enctype="multipart/form-data" action="<?php echo base_url('admin/website/insert_team') ?>" method="post">
                    <div class="row row-sm amiCrd p-4">
                        <div class="col-md-6">

                            <div class="form-group">
                                <p class="mg-b-10">Name</p>
                                <input type="text" required name="name" class="form-control" placeholder="Enter Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="mg-b-10">Designation</p>
                                <input type="text" required class="form-control" name="designation" placeholder="Enter Designation">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p class="mg-b-10">Image</p>
                                <input type="file" accept="image/png, image/jpeg, image/jpg" required class="form-control" name="image">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary w-100">Add</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

    <!------------------------------------------------------------------------------------------>
    <!-- Row -->