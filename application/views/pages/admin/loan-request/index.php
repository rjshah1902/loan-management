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
                    <form action="" method="get">
                        <div class="row p-3">
                            <div class="col-md-4">
                                <div class="input-group input-group-outline">
                                    <select name="request_status" class="form-control form-select">
                                        <option value="" selected disabled> -- Select Loan Status -- </option>
                                        <option value="pending" <?= ($selectedStatus == 'pending') ? 'selected':'' ?> >Pending</option>
                                        <option value="approved" <?= ($selectedStatus == 'approved') ? 'selected':'' ?> >Approved</option>
                                        <option value="rejected" <?= ($selectedStatus == 'rejected') ? 'selected':'' ?> >Rejected</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Search
                                </button>
                                <a href="<?= base_url('admin/loan-request'); ?>" class="btn btn-warning">
                                    Reset
                                </a>
                            </div>
                        </div>
                    </form>
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
                                        $editUrl = base_url('admin/loan-request/edit/'.$lr->id);
                                        $deleteUrl = base_url('admin/loan-request/delete/'.$lr->id);
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
                                            <td class="align-middle">
                                                <?php if($lr->request_status == 'pending'){ ?>
                                                    <a href="<?= $editUrl; ?>" class="btn btn-warning btn-sm text-white" data-toggle="tooltip" data-original-title="Edit user">
                                                        Edit
                                                    </a>
                                                    <a href="javascript:void(0);" onclick="deleteData('<?= $deleteUrl; ?>')"  class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Edit user">
                                                        Delete
                                                    </a>
                                                <?php } else{ ?>
                                                    <a href="<?= $editUrl; ?>" class="btn btn-info btn-sm text-white">
                                                        View
                                                    </a>
                                                <?php } ?>
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
