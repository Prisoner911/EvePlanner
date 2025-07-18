@extends('ManagerLayouts.ManagerPage')




@section('company-main')

    <!doctype html>
    <html lang="en">

    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />


        <style>
            .mainContainer {
                float: right;
            }

            .toastMessage {
                position: fixed;
                bottom: 20px;
                left: 50%;
                transform: translateX(-50%);
                background-color: #4CAF50;
                color: white;
                padding: 15px 20px;
                border-radius: 5px;
                display: none;
            }

            .radioDiv label {
                margin-left: 2px;
            }

            .searchDiv {
                display: flex;
                justify-content: center;
            }

            .searchInput {
                height: 6vh;
                background-color: white;
            }

            .searchInput:active {
                border: 2px solid rgba(143, 108, 226, 0.185);
            }

            table,
            th,
            tr,
            td {
                text-align: center;
                border: 2px solid;
                padding: 2px 10px;
            }

            table {
                background-color: rgba(38, 168, 255, 0.5);
                width: 100%;
            }

            .tableDiv {
                margin-top: 2rem;
            }


            @media screen and (max-width: 915px) and (orientation: landscape) {
                .tableDiv {
                    margin-top: 2rem;
                    width: 60%;
                }

                table,
                th,
                tr,
                td {
                    text-align: center;
                    font-size: 1.5vw;

                }
            }

            .checkbox {
                width: 1.3rem;
                height: 1.3rem;
            }

            .statusBtn {
                font-size: 12px;
            }
        </style>
    </head>

    <body>


        <div id="toastMessage" class="toastMessage">Status updated successfully</div>

        <div class="mainContainer">


            <div class="table-responsive tableDiv">
                <table class="">
                    <thead>
                        <tr>
                            <td colspan="7" style="padding-bottom:  0px;">

                                <div class="mb-3">

                                    <input type="text" class="searchInput" name="searchInput" id="searchInput"
                                        placeholder="Search by Application No." />

                                </div>


                            </td>
                        </tr>
                        <tr style="">
                            <th scope="col" style="text-align: center">Event Application No.</th>
                            <th scope="col" style="text-align: center">Event Type</th>
                        </tr>
                    </thead>

                    <tbody id="t_body">
                        @if (count($customers) > 0)
                            @foreach ($customers as $customer)
                                <tr class="t_head">
                                    <td scope="row">{{ $customer->ApplicationNo }}</td>
                                    <td scope="row">{{ $customer->EventType }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">No events assigned yet</td>
                            </tr>
                        @endif





                    </tbody>
                </table>





            </div>
            @if ($customers->hasPages())
                <nav aria-label="...">
                    <ul class="pagination justify-content-center " style="margin-top: 10px">
                        @if ($customers->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link">First Page</a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $customers->url(1) }}">First Page</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="{{ $customers->previousPageUrl() }}">Previous</a>
                            </li>
                        @endif
                        <li class="page-item"><a class="page-link"
                                href="{{ $customers->previousPageUrl() }}">{{ $customers->currentPage() - 1 }}</a></li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="">{{ $customers->currentPage() }}</a>
                        </li>

                        @if ($customers->hasMorePages())
                            <li class="page-item"><a class="page-link"
                                    href="{{ $customers->nextPageUrl() }}">{{ $customers->currentPage() + 1 }}</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="{{ $customers->nextPageUrl() }}">Next</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="{{ $customers->url($customers->lastPage()) }}">Last Page</a>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link" href="">-</a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="">Next</a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="">Last Page</a>
                            </li>
                        @endif



                    </ul>
                </nav>
            @endif
        </div>
    </body>

    </html>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            var originalTableBodyHtml = $("#t_body").html();
            var originalPaginationHtml = $("#pagination").html(); // Store original pagination HTML
            var currentLink = '{{ url()->current() }}';

            $('#searchInput').on('keyup', function() {
                var value = $(this).val().trim();
                if (value !== '') {
                    $.ajax({
                        url: currentLink,
                        type: "get",
                        data: {
                            'searchInput': value
                        },
                        success: function(data) {
                            var customers = data.customers;
                            // console.log(customers);
                            var html = '';
                            if (customers.data.length > 0) {
                                for (let i = 0; i < customers.data.length; i++) {
                                    html += '<tr class="t_head">';
                                    html += '<td scope="row">' + customers.data[i][
                                        'ApplicationNo'
                                    ] + '</td>';

                                    html += '<td scope="row">' + customers.data[i][
                                            'EventType'
                                        ] +
                                        '</td>';

                                    html += '</tr>';
                                }
                                // Update table body with search results
                                $("#t_body").html(html);

                                // Update pagination links
                                $("#pagination").html($(customers.links));
                            } else {
                                $("#t_body").html(
                                    '<tr><td colspan="7">No customers found</td></tr>');
                                $("#pagination").html(
                                    originalPaginationHtml); // Restore original pagination HTML
                            }
                        }
                    });
                } else {
                    $("#t_body").html(originalTableBodyHtml);
                    $("#pagination").html(originalPaginationHtml); // Restore original pagination HTML
                }
            });
        });
    </script>









@endsection
