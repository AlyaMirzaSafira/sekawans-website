<div class="container-fluid bg-primary">
    <div class="container text-white">
        <footer class="pt-5">
            <div class="row gap-4">
                <div class="col-12 col-lg-4 mb-3">
                    <a href="#" class="d-flex align-items-center mb-3 link-light text-decoration-none">
                        <h5>Sekawan'S TB Jember</h5>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-lg-3 mb-3">
                    <h5 class="mb-3">Informasi</h5>
                    <ul class="nav flex-column d-inline-flex">
                        @foreach ($navLinks as $route => $name)
                        <li class="nav-item mb-2"><a href="{{route($route)}}" class="nav-link p-0 link-light">
                                {{$name}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-12 col-sm-6 col-lg-3 mb-3">
                    <h5 class="mb-3">Media Sosial</h5>
                    <ul class="nav flex-column d-inline-flex">
                        <li class="nav-item mb-3">
                            <a href="#" class="nav-link p-0 link-light">
                                <i class="fa-brands fa-whatsapp fa-lg"></i>
                                <span class="ms-1">
                                    Whatsapp
                                </span>
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="{{ $ig->contents }}" target="blank" class="nav-link p-0 link-light">
                                <i class="fa-brands fa-instagram fa-lg"></i>
                                <span class="ms-1">
                                    {{ ucfirst($ig->element) }}
                                </span>
                            </a>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="{{ $tiktok->contents }}" target="blank" class="nav-link p-0 link-light">
                                <i class="fa-brands fa-tiktok fa-lg"></i>
                                <span class="ms-1">
                                    {{ ucfirst($tiktok->element) }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="pt-3 border-top">
                    <p>&copy; 2022 Sekawans TB Jember</p>
                </div>
        </footer>
    </div>
</div>