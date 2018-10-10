@extends("layout.layout")

@push("scripts")
    <script type="text/javascript">

        $(document).ready(function () {
            window.topListTable = new Tabulator("#toplisttable", {
                columns: [
                    {title: "#", field: "index", align: "center", width: 60},
                    {title: "Text", field: "text"},
                    {title: "<i class=\"fa fa-thumbs-up ml-2\" aria-hidden=\"true\">", field: "upvotes", align: "center", width: 60},
                    {title: "<i class=\"fa fa-thumbs-down ml-2\" aria-hidden=\"true\">", field: "downvotes", align: "center", width: 60},
                ],
                layout:"fitColumns",
                pagination:"remote",
                ajaxURL: "{{ route("top_list") }}",
                ajaxParams: {},
                ajaxConfig: {
                    method: "GET",
                    headers: {
                        "Accept": "application/json"
                    }
                }
            });
        });

    </script>
@endpush

@section("content")
    <main class="container col-6" role="main">
        <h1 class="mt-5 mb-4">Top List</h1>
        <div id="toplisttable" style="border: 1px solid #999;" class="mb-5"></div>
    </main>
@endsection
