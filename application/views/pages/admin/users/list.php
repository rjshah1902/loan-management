<div class="container-fluid py-2">
    <div class="row">
        <div class="col-md-12">
            <?php require APPPATH.'views/layout/alert.php'; ?>
        </div>
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Manage Users</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 text-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1;
                                if(count($users) > 0){
                                    foreach($users as $user){ ?>
                                        <tr>
                                            <td><?= $count++; ?></td>
                                            <td><?= $user->name; ?></td>
                                            <td><?= $user->email; ?></td>
                                            <td><?= $user->contact; ?></td>
                                            <td><?= date('d M, Y', strtotime($user->created_at)); ?></td>
                                        </tr>
                                    <?php } 
                                } else { ?>
                                    <tr>
                                        <td colspan="7">
                                            <h6 class="py-3">Users list is empty</h6>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
