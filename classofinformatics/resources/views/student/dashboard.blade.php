@extends('layouts.app')

@section('content')
    <div class="block-header">
        <div class="row clearfix mt-2">
            <div class="col-md-12">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="text-capitalize text-white f-15">Hai {{ $user['name'] }}, mau belajar apa hari ini?</div>
                </div>
            </div>
        </div>
        <div id="quotes-card"></div>
        <div id="render-subject" style="display: none;">

        </div>

        <div class="" id="loading-subject" style="display: none;">
            <div class="mt-3">
                <a href="javascript:void(0)"
                    class="d-flex align-items-center p-2 w-100 bg-white shadow-sm rounded border-hover">
                    <div class="d-flex align-items-center justify-content-center w35 bg-blue-2 rounded-circle cursor-pointer ml-2"
                        data-toggle="tooltip" data-placement="top" title="materi"><i class="icon-book-open text-white"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-dark text-uppercase pt-3">...</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $("#quotes-card").hide();
        $(document).ready(function() {
            getQuote()
            getSubject()
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#loading-subject").show('fast');
        $("#render-subject").hide('fast');

        function getQuote() {
            url = "https://api.quotable.io/random"

            $.ajax({
                type: "get",
                url: url,
                success: function(response) {

                },
                error: function(e) {
                    swal('Gagal Mengambil Data Quote!')
                }
            });
        }

        function getSubject() {
            url = "{{ url('student/subject') }}"

            $.ajax({
                type: "get",
                url: url,
                success: function(response) {
                    console.log(response);
                    renderSubject(response);
                },
                error: function(e) {
                    swal('Gagal Mengambil Data !')
                }
            });
        }

        function renderSubject(data) {
            html = ``

            $.each(data, function(key, subject) {
                html += `
            <div class="mt-3">
                <a href="{{ url('/student/subject/${subject.id}/course/') }}" class="d-flex align-items-center p-2 w-100 bg-white shadow-sm rounded border-hover">
                    <div class="d-flex align-items-center justify-content-center w35 bg-blue-2 rounded-circle cursor-pointer ml-2" data-toggle="tooltip" data-placement="top" title="materi"><i class="icon-book-open text-white"></i></div>
                    <div class="ml-3">
                        <p class="text-dark text-uppercase pt-3">${subject.name}</p>
                    </div>
                </a>
            </div>
            `
            });

            $("#render-subject").html(html);
            $("#loading-subject").hide('fast');
            $("#render-subject").show('fast');
        }
    </script>
@endsection
