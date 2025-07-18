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
        {{-- @if (session('message'))
            <script>
                alert("{{ session('message') }}")
            </script>
        @endif --}}

        <div class="mainContainer">


            <div class="table-responsive tableDiv">
                <table class="">
                    <thead>
                        <tr>
                            <td colspan="7" style="padding-bottom:  0px;">

                                <div class="mb-3">

                                    <input type="text" class="searchInput" name="searchInput" id="searchInput"
                                        placeholder="Search" />

                                </div>


                            </td>
                        </tr>
                        <tr style="">
                            <th scope="col" style="text-align: center">ID</th>
                            <th scope="col" style="text-align: center">Manager ID</th>
                            <th scope="col" style="text-align: center">Name</th>
                            <th scope="col" style="text-align: center">Phone No.</th>
                            <th scope="col" style="text-align: center">Email</th>
                            <th scope="col" style="text-align: center">Address</th>
                            <th scope="col" style="text-align: center">Action</th>
                        </tr>
                    </thead>

                    <tbody id="t_body">
                        @if (count($managers) > 0)
                            @foreach ($managers as $manager)
                                <tr class="t_head">
                                    <td scope="row">{{ $manager->id }}</td>
                                    <td scope="row">{{ $manager->ManagerID }}</td>
                                    <td scope="row">{{ $manager->Name }}</td>
                                    <td scope="row">{{ $manager->PhoneNo }}</td>
                                    <td scope="row">{{ $manager->Email }}</td>
                                    <td scope="row">{{ $manager->Address }}</td>
                                    <td scope="row">

                                        <a href="{{ route('manager.edit', ['id' => $manager->ManagerID]) }}"><button
                                                class="btn btn-primary">Edit
                                                details</button></a>
                                        <a href="{{ route('manager.delete', ['id' => $manager->ManagerID]) }}"><button
                                                class="btn btn-danger" style="font-size: 14px; margin-top: 2px;">Remove
                                                Manager</button></a>


                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">No managers found</td>
                            </tr>
                        @endif





                    </tbody>
                </table>
            </div>
            @if ($managers->hasPages())
                <nav aria-label="...">
                    <ul class="pagination justify-content-center " style="margin-top: 10px">
                        @if ($managers->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link">First Page</a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $managers->url(1) }}">First Page</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="{{ $managers->previousPageUrl() }}">Previous</a>
                            </li>
                        @endif
                        <li class="page-item"><a class="page-link"
                                href="{{ $managers->previousPageUrl() }}">{{ $managers->currentPage() - 1 }}</a></li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="">{{ $managers->currentPage() }}</a>
                        </li>

                        @if ($managers->hasMorePages())
                            <li class="page-item"><a class="page-link"
                                    href="{{ $managers->nextPageUrl() }}">{{ $managers->currentPage() + 1 }}</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="{{ $managers->nextPageUrl() }}">Next</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="{{ $managers->url($managers->lastPage()) }}">Last Page</a>
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
            var paginationLinksContainer = $("#paginationLinks");

            $('#searchInput').on('keyup', function() {
                var value = $(this).val().trim();
                if (value !== '') {
                    $.ajax({
                        url: "{{ route('managerSearch') }}",
                        type: "get",
                        data: {
                            'searchInput': value
                        },
                        success: function(data) {
                            var managerSearch = data.managers.data; // Get paginated data
                            var html = '';
                            if (managerSearch.length > 0) {
                                for (let i = 0; i < managerSearch.length; i++) {
                                    // Generate HTML for each search result
                                    html +=
                                        '<tr class="t_head">\
                                                                                                                   <td scope="row">' +
                                        managerSearch[i][
                                            'id'
                                        ] +
                                        '</td>\
                                                                                                                <td scope="row">' +
                                        managerSearch[i][
                                            'ManagerID'
                                        ] +
                                        '</td>\
                                                                                                                    <td scope="row">' +
                                        managerSearch[i][
                                            'Name'
                                        ] +
                                        '</td>\
                                                                                                                   <td scope="row">' +
                                        managerSearch[i][
                                            'PhoneNo'
                                        ] +
                                        '</td>\
                                                                                                                     <td scope="row">' +
                                        managerSearch[i][
                                            'Email'
                                        ] +
                                        '</td>\
                                                                                                                    <td scope="row">' +
                                        managerSearch[i][
                                            'Address'
                                        ] +
                                        '</td>\
                                                                    <td scope="row"><a href="/managerAccess/showManager' +
                                        managerSearch[i][
                                            'ManagerID'
                                        ] +
                                        '"><button class="btn btn-primary">Edit details</button></a>' +
                                        ' <a href="/managerAccess/deleteManager/{id}' +
                                        managerSearch[i][
                                            'ManagerID'
                                        ] +
                                        '"><button class="btn btn-danger">Remove Manager</button></a>' +
                                        ' </td>\   </tr>';
                                }
                            } else {
                                html += '<tr><td colspan="7">No managers found</td></tr>';
                            }
                            $("#t_body").html(html); // Update table body with search results

                            // Update pagination links
                            paginationLinksContainer.html(data.managers.links);
                        }
                    });
                } else {
                    $("#t_body").html(originalTableBodyHtml); // Restore original table content
                    paginationLinksContainer.empty(); // Clear pagination links when search input is empty
                }
            });
        });
    </script>


    <script src="{{ url('frontend/JS/submission.js') }}"></script>

@endsection
