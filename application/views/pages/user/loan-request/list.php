<div class="container-fluid py-2">
    <div class="row">
        <div class="col-md-12">
            <?php require APPPATH.'views/layout/alert.php'; ?>
        </div>
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Manage Loan Requests</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 text-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Contact</th>
                                    <th>Amount</th>
                                    <th>Requested At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1;
                                if(count($loanRequest) > 0){
                                    foreach($loanRequest as $lr){
                                        $detailsUrl = base_url('user/request-details?request_id='.$lr->id);
                                        $statusColor = "bg-gradient-info";
                                        if($lr->request_status == 'approved'){
                                            $statusColor = "bg-gradient-success";
                                        }else if($lr->request_status == 'rejected'){
                                            $statusColor = "bg-gradient-danger";
                                        } ?>
                                        <tr>
                                            <td><?= $count++; ?></td>
                                            <td><?= $lr->name; ?></td>
                                            <td>
                                                <?= $lr->email; ?> <br>
                                                <?= $lr->contact; ?>
                                            </td>
                                            <td>₹<?= round($lr->loan_amount); ?></td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    <?= date('d M, Y', strtotime($lr->created_at)); ?><br>
                                                    <?= date('h:i A', strtotime($lr->created_at)); ?>
                                                </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm <?= $statusColor; ?>">
                                                    <?= ucfirst($lr->request_status); ?>
                                                </span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                 <a href="<?= $detailsUrl; ?>" class="btn btn-info btn-sm text-white">
                                                        View
                                                    </a>
                                            </td>
                                        </tr>
                                    <?php } 
                                } else { ?>
                                    <tr>
                                        <td colspan="7">
                                            <h6 class="py-3">Loan request list is empty</h6>
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
