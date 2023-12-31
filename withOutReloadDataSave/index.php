<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <!-- status section start  -->
    <div class="container statusMsg mt-5">

    </div>

    <!-- status section ends  -->


    <!-- input section start  -->
    <div class="container data-input mt-5 mb-5">
        <form>
            <div class="mb-3">
                <label for="exampleInputText1" class="form-label">Name</label>
                <input type="text" class="form-control name" id="exampleInputText1" aria-describedby="textHelp">

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control email" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>


            <button type="submit" class="btn btn-primary dataAddAjax">Save</button>
        </form>
    </div>

    <!-- input section ends -->



    <!-- output section start  -->
    <div class="container output-data">
        <table class="table table-border table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="data">


            </tbody>
        </table>
    </div>


    <!-- output section ends -->



    <!-- modal view section start  -->  
    <div class="modal dataViewModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-border table-success table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody class="modalViewData">
                            <tr>
                                <td scope="row" class="viewId"></td>
                                <td class="viewName"></td>
                                <td class="viewEmail"></td>

                            </tr>`

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- modal view section ends -->




    <!-- modal edit section start  -->

    <div class="modal dataEditModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputNum1" class="form-label">Id</label>
                            <input type="number" class="form-control idEdit" id="exampleInputId1"
                                aria-describedby="numHelp">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputText1" class="form-label">Name</label>
                            <input type="text" class="form-control nameEdit" id="exampleInputText1"
                                aria-describedby="textHelp">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control emailEdit" id="exampleInputEmail1"
                                aria-describedby="emailHelp">

                        </div>



                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success dataUpdateAjax">Update</button>

                </div>
            </div>
        </div>
    </div>

    <!-- modal edit section ends -->




    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            getData();



            // Delete Data  starts 
            $(document).on("click", ".deleteBtn", function () {
                var data_id = $(this).closest('tr').find('.dataId').text();


                $.ajax({
                    type: "POST",
                    url: "./ajax-crud/post.php",
                    data: {
                        'isDelete': true,
                        'dataId': data_id
                    },
                    success: function (response) {

                        $('.statusMsg').append(
                            `<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> Data Deleted Successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`
                        );

                        $('.data').html('');
                        getData();
                        
                    }
                });
            });

            // Delete Data  ends


            // Data Update Form starts

            $('.dataUpdateAjax').click(function (e) {
                e.preventDefault();

                var id = $('.idEdit').val();
                var name = $('.nameEdit').val();
                var email = $('.emailEdit').val();


                if (name != '' & email != '') {
                    $.ajax({
                        type: "POST",
                        url: "./ajax-crud/post.php",
                        data: {
                            'isUpdate': true,
                            'id': id,
                            'Name': name,
                            'Email': email
                        },

                        success: function (response) {
                            $('.dataEditModal').modal('hide');
                            $('.statusMsg').append(
                                `<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Hey!</strong> Successfully Data Update.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`

                            );

                            $('.data').html('');
                            getData();

                        }
                    });
                }
                else {

                    $('.statusMsg').append(
                        
                        `<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> Please input all fields.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`
                    );
                }


            });

            // Data Update Form ends


            // Edit Data fetch starts 
            $(document).on("click", ".editBtn", function () {
                var data_id = $(this).closest('tr').find('.dataId').text();


                $.ajax({
                    type: "POST",
                    url: "./ajax-crud/post.php",
                    data: {
                        'isEdit': true,
                        'dataId': data_id
                    },
                    success: function (response) {


                        $.each(response, function (key, dataEdit) {
                            $('.idEdit').val(dataEdit['id']);
                            $('.nameEdit').val(dataEdit['Name']);
                            $('.emailEdit').val(dataEdit['Email']);
                        })

                        $('.dataEditModal').modal('show');
                    }
                });
            });

            // Edit Data fetch ends



            // View Data with modal starts

            $(document).on("click", ".viewBtn", function () {
                var data_id = $(this).closest('tr').find('.dataId').text();


                $.ajax({
                    type: "POST",
                    url: "./ajax-crud/post.php",
                    data: {
                        'isView': true,
                        'dataId': data_id
                    },
                    success: function (response) {
                        $.each(response, function (key, dataView) {
                            $('.viewId').text(dataView['id']);
                            $('.viewName').text(dataView['Name']);
                            $('.viewEmail').text(dataView['Email']);
                        })

                        $('.dataViewModal').modal('show');


                    }
                });
            });

            // View Data with modal ends



            // Data Input Form starts

            $('.dataAddAjax').click(function (e) {
                e.preventDefault();

                var dname = $('.name').val();
                var demail = $('.email').val();


                if (dname != '' & demail != '') {
                    $.ajax({
                        type: "POST",
                        url: "./ajax-crud/post.php",
                        data: {
                            'isData': true,
                            'Name': dname,
                            'Email': demail
                        },

                        success: function (response) {
                            $('.statusMsg').append(
                                `<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> Successfully Data Stored.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`

                            );


                            $('.data').html('');
                            getData();

                            $('.name').val('');
                            $('.email').val('');
                        }
                    });
                }
                else {

                    $('.statusMsg').append(
                        `<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> Please input all fields.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`
                    );
                }


            });


            // Data Input Form ends
        });



        // Fetching Data from Database 

        function getData() {
            $.ajax({
                type: "GET",
                url: "./ajax-crud/fetch.php",
                success: function (response) {


                    if (response) {
                        $.each(response, function (key, value) {
                            // console.log(value)
                            $('.data').append(`<tr>
                                <td scope="row" class="dataId">`+ value['id'] + `</td>
                                <td>`+ value['Name'] + `</td>
                                <td>`+ value['Email'] + `</td>
                                <td>
                                    <button class="btn btn-primary viewBtn">View</button>
                                    <button class="btn btn-success editBtn">Edit</button>
                                    <button class="btn btn-danger deleteBtn">Delete</button>
                                </td>
                            </tr>`);
                        })
                    } else {
                        $('.statusMsg').append(
                            `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> No Data Found.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`
                        );
                    }
                }
            });
        }
    </script>
</body>

</html>