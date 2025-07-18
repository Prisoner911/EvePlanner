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

        <div id="toastMessage" class="toastMessage">Status updated successfully</div>

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
                            <th scope="col" style="text-align: center">Agent ID</th>
                            <th scope="col" style="text-align: center">Name</th>
                            <th scope="col" style="text-align: center">Phone No.</th>
                            <th scope="col" style="text-align: center">Email</th>
                            <th scope="col" style="text-align: center">Current events assigned</th>
                            <th scope="col" style="text-align: center">Specialty</th>
                            <th scope="col" style="text-align: center">Action</th>
                        </tr>
                    </thead>

                    <tbody id="t_body">
                        @if (count($agents) > 0)
                            @foreach ($agents as $agent)
                                <tr class="t_head">
                                    <td scope="row">{{ $agent->AgentID }}</td>
                                    <td scope="row">{{ $agent->Name }}</td>
                                    <td scope="row">{{ $agent->PhoneNo }}</td>
                                    <td scope="row">{{ $agent->Email }}</td>
                                    <td scope="row">


                                        <a href="{{ url()->current() }}/viewAssignedEvents/{{ $agent->AgentID }}">
                                            <button class="btn btn-primary">View</button></a>

                                        {{-- {{ url()->current() }}/viewAssignedEvents/{{ $agent->AgentID }} --}}


                                    </td>
                                    <td scope="row">{{ $agent->Specialty }}</td>
                                    <td scope="row">
                                        <form action="{{ url()->current() }}/{{ $agent->AgentID }}" method="POST">
                                            @csrf
                                            <button class="btn btn-primary" type="submit">Assign</button>
                                        </form>

                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7">No agents found</td>
                            </tr>
                        @endif





                    </tbody>
                </table>





            </div>
            @if ($agents->hasPages())
                <nav aria-label="...">
                    <ul class="pagination justify-content-center " style="margin-top: 10px">
                        @if ($agents->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link">First Page</a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link">Previous</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $agents->url(1) }}">First Page</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="{{ $agents->previousPageUrl() }}">Previous</a>
                            </li>
                        @endif
                        <li class="page-item"><a class="page-link"
                                href="{{ $agents->previousPageUrl() }}">{{ $agents->currentPage() - 1 }}</a></li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="">{{ $agents->currentPage() }}</a>
                        </li>

                        @if ($agents->hasMorePages())
                            <li class="page-item"><a class="page-link"
                                    href="{{ $agents->nextPageUrl() }}">{{ $agents->currentPage() + 1 }}</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="{{ $agents->nextPageUrl() }}">Next</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="{{ $agents->url($agents->lastPage()) }}">Last Page</a>
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
                        url: "{{ route('agentSearch') }}",
                        type: "get",
                        data: {
                            'searchInput': value
                        },
                        success: function(data) {
                            var agentSearch = data.agents.data; // Get paginated data
                            var html = '';
                            if (agentSearch.length > 0) {
                                for (let i = 0; i < agentSearch.length; i++) {
                                    // Generate HTML for each search result
                                    html += '<tr class="t_head">' +
                                        '<td scope="row">' + agentSearch[i]['id'] + '</td>' +
                                        '<td scope="row">' + agentSearch[i]['AgentID'] +
                                        '</td>' +
                                        '<td scope="row">' + agentSearch[i]['Name'] + '</td>' +
                                        '<td scope="row">' + agentSearch[i]['PhoneNo'] +
                                        '</td>' +
                                        '<td scope="row">' + agentSearch[i]['Email'] + '</td>' +
                                        '<td scope="row">' + agentSearch[i]['Address'] +
                                        '</td>' +
                                        '<td scope="row">' +
                                        '<a href="/managerAccess/update/' + agentSearch[i][
                                            'AgentID'
                                        ] +
                                        '">' +
                                        '<button class="btn btn-primary">Edit details</button>' +
                                        '</a>' +
                                        ' <a href="/managerAccess/deleteAgent/' + agentSearch[i]
                                        ['AgentID'] + '">' +
                                        '<button class="btn btn-danger">Remove Agent</button>' +
                                        '</a>' +
                                        '</td>' +
                                        '<td scope="row">' +
                                        '<form action="/managerAccess/Agents/' + agentSearch[i][
                                            'AgentID'
                                        ] + '" method="POST">' +
                                        '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                                        '<div class="mainDiv">' +
                                        '<div class="radioDiv">' +
                                        '<input type="radio" name="agentStatus" class="form-check-input" id="option1" checked value="no">' +
                                        '<label for="option1" style="margin-left: 5px;">No</label>' +
                                        '<input type="radio" name="agentStatus" style="margin-left: 5px;" class="form-check-input mb-3" id="option2" value="yes" ' +
                                        (agentSearch[i]['Access_Rights'] === 'yes' ? 'checked' :
                                            '') + '>' +
                                        '<label for="option2" style="margin-left: 5px;">Yes</label>' +
                                        '</div>' +
                                        '<a href="/managerAccess/Agents/' + agentSearch[i][
                                            'AgentID'
                                        ] + '">' +
                                        '<button class="btn btn-success statusBtn">Update Status</button>' +
                                        '</a>' +
                                        '</div>' +
                                        '</form>' +
                                        '</td>' +
                                        '</tr>';


                                }
                            } else {
                                html += '<tr><td colspan="7">No agents found</td></tr>';
                            }
                            $("#t_body").html(html); // Update table body with search results

                            // Update pagination links
                            paginationLinksContainer.html(data.agents.links);
                        }
                    });
                } else {
                    $("#t_body").html(originalTableBodyHtml); // Restore original table content
                    paginationLinksContainer.empty(); // Clear pagination links when search input is empty
                }
            });
        });
    </script>







    {{-- <script src="{{ url('frontend/JS/submission.js') }}"></script> --}}

@endsection
