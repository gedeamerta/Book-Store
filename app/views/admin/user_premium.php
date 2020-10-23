<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800">User Premium Request</h1>
    <p class="mb-4">Accept their request or not is all your fate</p>

    <!-- Content Row -->
    <div class="row">
        <!-- List Books Start -->
        <?php foreach ($data['user_premium'] as $u_p) : ?>
            <div class="col-lg-6">
                <div class="card position-relative mt-3 <?= $u_p['status'] == 1 ? 'border-success' : (($u_p['status'] == 0) ? 'border-danger' : '') ?>">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary float-left">User Requets</h6>
                        <footer class="float-right"><?= date("m-d-Y", strtotime($u_p['tanggal'])) ?></footer>
                    </div>
                    <div class="card-body">
                        <img src="<?= baseurl . '/assets/struk/' . $u_p['struk']; ?>" alt="" width="100%">
                        <h2 class="card-title mt-2">User Data</h2>
                        <ul>
                            <li>Username : <?= $u_p['username']; ?></li>
                            <li>Email : <?= $u_p['email']; ?></li>
                            <li>Number Phone : <?= $u_p['no_telp']; ?></li>
                        </ul>
                        <?php if ($u_p['status'] == 1) : ?>
                            <i class="mt-2 fas fa-check-circle"></i>
                        <?php else : ?>
                            <button type="button" onclick="window.location.href='<?= baseurl; ?>/admin/accept_request'" class="btn btn-danger mt-3">Accept Requets</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- List Books End -->
    </div>
    <!-- container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white mt-5">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>