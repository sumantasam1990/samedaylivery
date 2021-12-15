<div class="container-fluid footer mt-2">
    <footer class="container text-left mt-6">
        <div class="row">
            <div class="col-md-1 col-12"></div>
            <div class="col-md-3 col-12 mb-4">
                <img style="width: 200px;" src="{{ asset('images/LOGOw.webp') }}">
            </div>
            <div class="col-md-2 col-6">
                <p class="fw-bold mb-0">Samedaylivery</p>
                <ul>
                    <li>
                        <a href="{{ route('pricing') }}">Pricing</a>
                    </li>
                    <li>
                        <a href="{{ route('subscribe') }}">Sign Up</a>
                    </li>
{{--                    <li>--}}
{{--                        <a href="{{ route('login') }}">Login</a>--}}
{{--                    </li>--}}
                </ul>
            </div>
            <div class="col-md-2 col-6">
                <p class="fw-bold mb-0">Support</p>
                <ul>
                    <li>
                        <a href="{{ route('about') }}">About Us</a>
                    </li>
                    <li>
                        <a href="{{ route('howitworks') }}">How It Works</a>
                    </li>
                    <li>
                        <a href="{{ route('benefits') }}">Benefits</a>
                    </li>
                    <li>
                        <a href="{{ route('faq') }}">FAQs</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2 col-6">
                <p class="fw-bold mb-0 mt-4 mt-md-0">Get In Touch</p>
                <ul>
                    <li>
                        <a href="{{ route('contact') }}">Message Us</a>
                    </li>

                </ul>
            </div>
            <div class="col-md-2 col-6">
                <p class="fw-bold mb-0 mt-4 mt-md-0">Legal</p>
                <ul>
                    <li>
                        <a href="{{ route('privacy') }}">Privacy</a>
                    </li>
                    <li>
                        <a href="{{ route('terms') }}">Terms</a>
                    </li>


                    <li>
                        <a style="cursor: inherit;" class="text-dark" href="javascript:void(0)" nofollow>&copy; 2021</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>

</div>



{{--mobile message--}}

{{--<div class="modal fade" id="mob_message" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"--}}
{{--     aria-labelledby="staticBackdropLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-headerr">--}}
{{--                --}}{{--                <h5 class="display-6 text-center heading_txt" id="edit_score_heading">Create A Score</h5>--}}
{{--                <button style="float: right; margin: 10px;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--            </div>--}}
{{--            <div class="modal-body text-center">--}}
{{--                <h4 class="fw-bold fs-4">PLEASE USE Samedaylivery ON DESKTOP</h4>--}}

{{--                <p class="fs-6 mt-4">We HIGHLY recommend using Scorng on desktop to get the best possible experience of all of our features!</p>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}





<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

<script src="{{ asset('js/bootstrap.js') }}"></script>

<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

<script>
    $(function () {
        $('[data-bs-toggle="popover"]').popover({ trigger: "hover", html: true })
    })

    $('body').on('click', function (e) {
        $('[data-bs-toggle=popover]').each(function () {
            // hide any open popovers when the anywhere else in the body is clicked
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                $(this).popover('hide');
            }
        });
    });

    if ($(window).width() < 700) {
        $(document).ready(function () {
            if(localStorage.getItem('mob_alert') != 'done') {
                $("#mob_message").modal('show');
                localStorage.setItem('mob_alert', "done");
            }

        })
    }


</script>


@livewireScripts

</body>
</html>
