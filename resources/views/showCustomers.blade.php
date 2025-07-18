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
            .paginationElement {
                box-shadow: 0px 0px 15px 2px black;
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

            .actionBtn {
                font-size: 1vw;
            }




            .searchDiv {
                display: flex;
                justify-content: center;
            }

            .searchInput {
                height: 6vh;
            }

            .searchInput:active {
                border: 2px solid rgb(144, 108, 226);
            }

            table,
            th,
            tr,
            td {
                text-align: center;
                border: 2px solid;
                padding: 2px 10px;
                font-size: 1.18vw;

            }

            .radioDiv label {
                font-size: 16px;
            }

            .radioDiv label:hover {
                cursor: pointer;
            }

            .radioDiv input {
                transform: scale(0.9);
            }


            table {
                background-color: rgba(38, 168, 255, 0.5);

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


        @if (session('message'))
            {{-- <script>
                alert("{{ session('message') }}")
            </script> --}}
        @endif


        <div id="toastMessage" class="toastMessage">Status updated successfully</div>


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

                        <th scope="col" style="text-align: center">Application No.</th>
                        <th scope="col" style="text-align: center">Date of registration</th>
                        <th scope="col" style="text-align: center">First Name</th>
                        <th scope="col" style="text-align: center">Last Name</th>
                        <th scope="col" style="text-align: center">Phone No.</th>
                        <th scope="col" style="text-align: center">View More</th>
                        <th scope="col" style="text-align: center">Event Status</th>
                        <th scope="col" style="text-align: center">Assigned Agent</th>
                        <th scope="col" style="text-align: center">Assign/Change Agent</th>
                        <th scope="col" style="text-align: center">Send rating link</th>
                    </tr>
                </thead>
                <tbody id="t_body">
                    @if (count($customers) > 0)
                        @foreach ($customers as $customer)
                            <tr class="t_head">

                                <td scope="row">{{ $customer->ApplicationNo }}</td>
                                <td scope="row">{{ $customer->created_at->format('d-m -Y') }}</td>
                                <td scope="row">{{ $customer->FirstName }}</td>
                                <td scope="row">{{ $customer->LastName }}</td>
                                <td scope="row">{{ $customer->PhoneNo }}</td>
                                <td scope="row">

                                    <a href="{{ route('ViewMore', ['id' => $customer->ApplicationNo]) }}"><button
                                            class="btn btn-primary actionBtn">View more
                                            details</button></a>


                                </td>
                                <td scope="row">



                                    <form action="/showCustomer/{{ $customer->ApplicationNo }}" method="POST">

                                        @csrf
                                        <div class="mainDiv">
                                            <div class="radioDiv" id="radioDiv">


                                                <label for="option1_{{ $customer->ApplicationNo }}">Pending</label>
                                                <input type="radio" name="eventStatus" class="form-check-input"
                                                    id="option1_{{ $customer->ApplicationNo }}" checked value="pending"><br>


                                                <label for="option2_{{ $customer->ApplicationNo }}">Complete</label>
                                                <input type="radio" name="eventStatus" class="form-check-input"
                                                    id="option2_{{ $customer->ApplicationNo }}" value="complete"
                                                    {{ $customer->EventStatus == 'complete' ? 'checked' : '' }}>


                                                <label for="option3_{{ $customer->ApplicationNo }}">Cancelled</label>
                                                <input type="radio" name="eventStatus" class="form-check-input"
                                                    id="option3_{{ $customer->ApplicationNo }}" value="cancelled"
                                                    {{ $customer->EventStatus == 'cancelled' ? 'checked' : '' }}>
                                            </div>

                                            {{-- <a href="{{ route('MarkStatus', ['id' => $customer->ApplicationNo]) }}"><button
                                                    class="btn btn-success statusBtn" type="submit">Update
                                                    Status</button></a> --}}
                                            <button class="btn btn-success statusBtn"
                                                data-application-no="{{ $customer->ApplicationNo }}">Update</button>

                                        </div>

                                    </form>
                                </td>

                                <td scope="row">

                                    @if ($customer->AssignedAgent == 0)
                                        Not Assigned
                                    @else
                                        <a
                                            href="/managerAccess/update/{{ $customer->AssignedAgent }}">{{ $customer->AssignedAgent }}</a>
                                    @endif


                                </td>

                                <td scope="row">
                                    <a href="{{ route('assignAgent', ['id' => $customer->ApplicationNo]) }}"><button
                                            class="btn btn-warning actionBtn">Assign Agent</button></a>
                                </td>

                                <td scope="row">
                                    <a href="{{ route('ratinglink', ['id' => $customer->ApplicationNo]) }}"><button
                                            class="btn btn-primary actionBtn">Send
                                            rating link</button></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>No customer found</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            {{-- {{ $customers->links() }} --}}

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

            $('#searchInput').on('keyup', function() {
                var value = $(this).val().trim();
                if (value !== '') {
                    $.ajax({
                        url: "{{ route('customerSearch') }}",
                        type: "get",
                        data: {
                            'searchInput': value
                        },
                        success: function(data) {
                            var customers = data.customers;
                            var html = '';
                            if (customers.data.length > 0) {
                                for (let i = 0; i < customers.data.length; i++) {
                                    html += '<tr class="t_head">';
                                    html += '<td scope="row">' + customers.data[i][
                                        'ApplicationNo'
                                    ] + '</td>';
                                    html += '<td scope="row">' + new Date(customers.data[i][
                                            'created_at'
                                        ]).getDate() + '-' +
                                        (new Date(customers.data[i]['created_at']).getMonth() +
                                            1).toString().padStart(2, '0') + '-' +

                                        new Date(customers.data[i]['created_at'])
                                        .getFullYear() +
                                        '</td>';


                                    html += '<td scope="row">' + customers.data[i][
                                        'FirstName'
                                    ] + '</td>';
                                    html += '<td scope="row">' + customers.data[i]['LastName'] +
                                        '</td>';
                                    html += '<td scope="row">' + customers.data[i]['PhoneNo'] +
                                        '</td>';
                                    html += '<td scope="row"><a href="/customerDetails/' +
                                        customers.data[i]['ApplicationNo'] +
                                        '"><button class="btn btn-primary">View more details</button></a></td>';
                                    html += '<td scope="row">';
                                    html += '<form action="/showCustomer/' + customers.data[i][
                                        'ApplicationNo'
                                    ] + '" method="POST">';
                                    html +=
                                        '<input type="hidden" name="_token" value="{{ csrf_token() }}">';
                                    html += '<div class="mainDiv">';
                                    html += '<div class="radioDiv">';
                                    html +=
                                        '<input type="radio" name="eventStatus" class="form-check-input" id="option1_' +
                                        customers.data[i]['ApplicationNo'] +
                                        '" checked value="pending">';
                                    html += '<label for="option1_' + customers.data[i][
                                        'ApplicationNo'
                                    ] + '">Not Complete</label>';
                                    html +=
                                        '<input type="radio" name="eventStatus" class="form-check-input" id="option2_' +
                                        customers.data[i]['ApplicationNo'] +
                                        '" value="complete" ' +
                                        (customers.data[i]['EventStatus'] === 'complete' ?
                                            'checked' : '') + '>';
                                    html += '<label for="option2_' + customers.data[i][
                                        'ApplicationNo'
                                    ] + '">Complete</label>';
                                    html +=
                                        '<input type="radio" name="eventStatus" class="form-check-input" id="option3_' +
                                        customers.data[i]['ApplicationNo'] +
                                        '" value="cancelled" ' +
                                        (customers.data[i]['EventStatus'] === 'cancelled' ?
                                            'checked' : '') + '>';
                                    html += '<label for="option3_' + customers.data[i][
                                        'ApplicationNo'
                                    ] + '">Cancelled</label>';
                                    html += '</div>';
                                    html +=
                                        '<button class="btn btn-success statusBtn" data-application-no="' +
                                        customers.data[i]['ApplicationNo'] +
                                        '">Update Status</button>';
                                    html += '</div>';
                                    html += '</form>';
                                    html += '</td>';
                                    html += '<td scope="row">' +
                                        (customers.data[i]['AssignedAgent'] == 0 ?
                                            'Not Assigned' :
                                            '<a href="/managerAccess/update/' + customers.data[
                                                i]['AssignedAgent'] + '">' +
                                            customers.data[i]['AssignedAgent'] +
                                            '</a>'
                                        ) +
                                        '</td>';





                                    html += '<td scope="row"><a href="/ratinglink/' +
                                        customers.data[i]['ApplicationNo'] +
                                        '"><button class="btn btn-primary">Send rating link</button></a></td>';
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


    <script>
        $(document).ready(function() {
            $('.statusBtn').click(function(e) {
                e.preventDefault();
                var applicationNo = $(this).data('applicationNo');
                var eventStatus = $('input[name="eventStatus"]:checked', $(this).closest('form')).val();
                console.log(applicationNo);
                if (eventStatus !== undefined) { // Check if eventStatus is defined
                    $.ajax({
                        url: '{{ route('MarkStatus', ['id' => ':id']) }}'.replace(':id',
                            applicationNo),
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            eventStatus: eventStatus // Pass eventStatus retrieved from the form
                        },
                        success: function(response) {
                            $('#toastMessage').fadeIn().delay(2000).fadeOut();
                            // Additional actions here, such as updating UI elements
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            alert('An error occurred while updating status. Please try again.');
                        }
                    });
                } else {
                    alert('Please select an event status.'); // Provide feedback if no status is selected
                }
            });
        });


        $(document).ready(function() {
            // Use event delegation to handle click events on dynamically added buttons
            $(document).on('click', '.statusBtn', function(e) {
                e.preventDefault();
                var applicationNo = $(this).data('applicationNo');
                var eventStatus = $('input[name="eventStatus"]:checked', $(this).closest('form')).val();

                if (eventStatus !== undefined) { // Check if eventStatus is defined
                    $.ajax({
                        url: '{{ route('MarkStatus', ['id' => ':id']) }}'.replace(':id',
                            applicationNo),
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            eventStatus: eventStatus // Pass eventStatus retrieved from the form
                        },
                        success: function(response) {
                            $('#toastMessage').fadeIn().delay(2000).fadeOut();
                            // Additional actions here, such as updating UI elements
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            alert('An error occurred while updating status. Please try again.');
                        }
                    });
                } else {
                    alert('Please select an event status.'); // Provide feedback if no status is selected
                }
            });
        });
    </script>




@endsection
