<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= base_url("users/store") ?>" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $page['subtitle'] ?></h5>
                            </div>
                            <div class="card-body row">
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Name</label>
                                    <input required name="name" class="form-control" type="text" placeholder="Enter name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Username</label>
                                    <input required name="username" class="form-control" type="text" placeholder="Enter name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Contact</label>
                                    <input required name="contact" class="form-control" type="text" placeholder="Enter contact">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Role</label>
                                    <select required name="role_id" class="form-select digits">
                                        <option value="1">Superadmin</option>
                                        <option value="2">Admin</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Email address</label>
                                    <input required name="email" class="form-control" type="email" placeholder="Enter email">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Password</label>
                                    <div class="form-input position-relative">
                                        <input name="password" class="form-control" type="password" name="password" required="" placeholder="*********">
                                        <div class="show-hide" style="top: 17px;"><span class="show"> </span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="<?= base_url("users") ?>"><button type="button" class="btn btn-secondary">Cancel</button></a>
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /*----------------------------------------
     passward show hide
     ----------------------------------------*/
    $(".show-hide").show();
    $(".show-hide span").addClass("show");

    $(".show-hide span").click(function() {
        if ($(this).hasClass("show")) {
            $('input[name="password"]').attr("type", "text");
            $(this).removeClass("show");
        } else {
            $('input[name="password"]').attr("type", "password");
            $(this).addClass("show");
        }
    });
    $('form button[type="submit"]').on("click", function() {
        $(".show-hide span").addClass("show");
        $(".show-hide")
            .parent()
            .find('input[name="password"]')
            .attr("type", "password");
    });
</script>