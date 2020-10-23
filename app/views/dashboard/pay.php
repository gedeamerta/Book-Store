<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div style="left: 25%" class="card w-50 mt-5 border-danger">
                <div class="card-header">
                    User Data for Payment
                </div>
                <div class="card-body text-danger">
                    <h3 class="card-title">Payment</h3>
                    <?php foreach ($data['user_premium'] as $u_p) : ?>
                        <ul>
                            <li class=""><b>Username</b> : <?= $u_p['username']; ?></li>
                            <li class=""><b>Email</b> : <?= $u_p['email']; ?></li>
                            <li class=""><b>Number Phone</b> : <?= $u_p['no_telp']; ?></li>
                        </ul>
                        <ul>
                            <li class=""><b>Type Package</b> : <?= $u_p['type_package']; ?></li>
                            <li class=""><b>Price</b> : Rp. <?= number_format($u_p['price'], 2, ",", "."); ?></li>
                            <li class=""><b>Date</b> : <?= date("d-m-Y", strtotime($u_p['tanggal'])); ?></li>
                        </ul>
                    <?php endforeach; ?>
                    <p class="card-text"></p>
                    <p class="card-text"></p>
                    <button type="submit" data-target="#payment" data-toggle="modal" class="btn btn-warning mr-3">Buy Now !</a>
                        <button class="btn btn-secondary" onclick="window.print()">Print !</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Payment Start -->
<div class="modal fade" id="payment" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Isi Form dengan lengkap !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= baseurl; ?>/dashboard/transfer" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Input your Money </label>
                        <input type="number" name="price_package" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Your Checkout Picture </label>
                        <input type="file" name="struk" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" name="register" class="btn btn-info">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Payment End -->