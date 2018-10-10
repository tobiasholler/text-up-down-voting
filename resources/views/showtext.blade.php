@extends("layout.layout")

@push("styles")
    <style type="text/css">
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
@endpush

@push("scripts")
    <script type="text/javascript">
        function copyToClipboard(str) {
            var el = document.createElement('textarea');
            el.value = str;
            el.setAttribute('readonly', '');
            el.style.position = 'absolute';
            el.style.left = '-9999px';
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);

            // Notify
            iziToast.show({
                title: "{{ trans("messages.link_copied") }}",
                position: "topRight",
                theme: "dark",
                timeout: 2500,
                close: false,
                pauseOnHover: false,
                progressBar: false
            });
        };

    </script>
@endpush

@section("content")
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                {{ $text->getAttribute("text") }}
            </div>
            <div class="mb-1">
                <form action="{{ route("upvote", [ $text->getAttribute("id") ]) }}" method="POST"
                      style="display: inline">
                    @csrf
                    <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-thumbs-up"
                                                                            aria-hidden="true"></i> {{ $text->getAttribute("upvotes") }}
                    </button>
                </form>
                <form action="{{ route("downvote", [ $text->getAttribute("id") ]) }}" method="POST"
                      style="display: inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-lg"><i class="fa fa-thumbs-down"
                                                                           aria-hidden="true"></i> {{ $text->getAttribute("downvotes") }}
                    </button>
                </form>
            </div>
            <div>
                <a href="{{ route("show_random_text") }}" class="btn btn-info btn-lg"><i class="fa fa-refresh"
                                                                                         aria-hidden="true"></i></a>
                <a href="#"
                   onclick="copyToClipboard('{{ route("show_text", [ $text->getAttribute("id") ]) }}'); return false;"
                   class="btn btn-warning btn-lg"><i class="fa fa-share" aria-hidden="true"></i></a>
                <a href="{{ route("top_list") }}" class="btn btn-info btn-lg"><i class="fa fa-list-ol"
                                                                                 aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
@endsection
