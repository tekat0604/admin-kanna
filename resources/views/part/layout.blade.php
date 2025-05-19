<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('kanna/img/favicon.png') }}" type="image/png">
    <title>Admin area | Kanna Design</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('kanna/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700" rel="stylesheet">
    <link href="{{ asset('kanna/css/themify-icons.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('kanna/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('kanna/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('kanna/css/summernote.min.css') }}" rel="stylesheet">

</head>
<body class="animated--grow-in" id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @if ($title !== 'login')
            @include('part.sidebar')
        @endif
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body mb-3">Pastikan pekerjaan anda selesai sebelum logout</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="{{route('actionlogout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end logout Modal -->
    <!-- message -->
    @if ($message = Session::get('success'))
        <div class="modal" id="pesan" style="display:block !important;" role='dialog' aria-labelledby='smallmodalLabel' aria-hidden='true'>
            <div class="modal-dialog modal-sm animated--grow-in" role="document">
                <div class="message-box modal-content shadow">
                    <div class="modal-body rata-kiri">
                        <i class="fa fa-circle-check text-success" style="--fa-beat-scale: 2.0;"></i>
                        <div>
                            <h4 class="font-weight-bold">Berhasil</h4>
                            <p class="m-0">{{ $message }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- end message -->
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('kanna/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('kanna/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('kanna/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('kanna/js/sb-admin-2.min.js') }}"></script>
        {{-- <script src="{{ asset('kanna/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('kanna/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script> --}}
        <script src="{{ asset('kanna/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    
        <!-- Page level custom scripts -->
        {{-- <script src="{{ asset('kanna/js/demo/datatables-demo.js') }}"></script> --}}
        <script src="{{ asset('kanna/js/lottie-player.js') }}"></script>
        <script src="{{ asset('kanna/js/summernote.min.js') }}"></script>
        <script src="{{ asset('kanna/js/validasi_form.js') }}"></script>
        {{-- <script src="{{ asset('kanna/js/main.js') }}"></script> --}}
        
        <script>
            $('#boxid').click(function() {
            if ($(this).is(':checked')) {
                setDarkMode(false);
            } else {
                setDarkMode(true);
            }
            });
        </script>
        <script>
            $(document).ready(function(){
                setTimeout(function(){
                    $("#pesan").fadeIn('fast')
                    ;}, 500);
            });
                setTimeout(function(){
                    $("#pesan").fadeOut('fast')
                ;}, 2000);
        </script> 
        <script>
            $('#beritaarea').summernote({
              tabsize: 2,
              height: 350
            });
            $('#counterarea').summernote({
              tabsize: 2,
              height: 100
            });
        </script>
        <script>
            // Add the following code if you want the name of the file appear on select
            $(".custom-file-input").on("change", function() {
              var fileName = $(this).val().split("\\").pop();
              $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script>
        <script>
            $(document).ready(function () {
                $('#filterStatus').on('change', function () {
                    var selectedStatus = $(this).val().toLowerCase();

                    $('#tablelayanan tbody tr').hide(); // Sembunyikan semua dulu

                    if (selectedStatus === "") {
                        // Tampilkan semua baris jika tidak ada filter
                        $('#tablelayanan tbody tr').show();
                    } else {
                        $('#tablelayanan tbody tr[data-status]').each(function () {
                            var status = $(this).data('status');

                            if (status.includes(selectedStatus)) {
                                // Tampilkan baris pertama (dengan rowspan) dan semua baris sesudahnya dalam grup yang sama
                                $(this).show().nextUntil('tr[data-status]').show();
                            }
                        });
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $('#searchTable').on('keyup', function () {
                    var value = $(this).val().toLowerCase();
                    $('#tablelayanan tbody tr').filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });
            });
        </script>
        <script src="{{ asset('kanna/js/dark-mode-switch.js') }}"></script>
        <script src="{{ asset('kanna/js/bootstrap-show-password.js') }}"></script>
</body>

</html>