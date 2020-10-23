<!-- Site footer -->
<?php if(!$data['user_premium'] || !$data['package']): ?>
<footer class="site-footer mt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6 class="font-weight-bold">About</h6>
                <p class="text-justify"><strong>Book Media.</strong> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Harum aperiam repellendus officiis distinctio aspernatur doloribus qui asperiores, aliquam praesentium est totam quae nisi ab illo corporis! Deleniti fugit odit fuga.</p>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6 class="font-weight-bold">Location</h6>
                <ul class="footer-links">
                    <li>1st : Jl. Raya Pulau Komodo No 19</li>
                    <li>2nd : Jl. Raya Canggu, Tibubeneng, Tandeg, Kuta Utara</li>
                </ul>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6 class="font-weight-bold">Quick Links</h6>
                <ul class="footer-links">
                    <li><a href="<?= baseurl?>/home">Home</a></li>

                    <li>
                        <a href="<?= baseurl ?>/home/book">Book</a>
                    </li>

                </ul>
            </div>
        </div>
        <hr>
    </div>
    <div class=" container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by
                    <a href="#">Gede Amerta</a>.
                </p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fab fa-twitter-square"></i></a></li>
                    <li><a class="dribbble" href="#"><i class="fab fa-dribbble-square"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<?php endif; ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<!-- Uikit JS -->
<script src="<?= baseurl; ?>/assets/js/uikit.js"></script>

<!-- sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>

</html>