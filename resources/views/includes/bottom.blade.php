
<!-- Footer -->
<footer class="footer bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                @desktop
                <ul class="list-inline mb-2">
                    <li class="list-inline-item">
                        <a href="#tentang">Tentang Kami</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a href="#tentang">Kontak</a>
                    </li>
                </ul>
                @elsedesktop

                <ul class="list-inline">
                    <li class="list-inline-item">
                        Mobile version
                    </li>
                </ul>
                @enddesktop

                <p class="text-muted small mb-4 mb-lg-0">&copy; BukuCeritamu 2018. All Rights Reserved.</p>
            </div>
            {{-- <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mr-3">
                        <a href="#">
                            <i class="fa fa-facebook fa-2x fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item mr-3">
                        <a href="#">
                            <i class="fa fa-twitter fa-2x fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fa fa-instagram fa-2x fa-fw"></i>
                        </a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

{{-- Notify js --}}
<script src="{{ asset('js/notify.js') }}"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
</body>

</html>
