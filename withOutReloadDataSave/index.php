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


    <div class="container statusMsg mt-5">
        
    </div>


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






    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            getData();

            $('.dataAddAjax').click(function (e) { 
                e.preventDefault();

                var dname = $('.name').val();
                var demail = $('.email').val(); 


                if(dname !='' & demail !=''){
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
                else{
                    
                    $('.statusMsg').append(
                        `<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> Please input all fields.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>`
                    );
                }
                
                
            });
        });
        function getData() {
            $.ajax({
                type: "GET",
                url: "./ajax-crud/fetch.php",
                success: function (response) {
                    

                    if(response){
                        $.each(response, function (key, value) {
                        // console.log(value)
                        $('.data').append(`<tr>
                                <th scope="row">`+value['id']+`</th>
                                <td>`+ value['Name']+`</td>
                                <td>`+ value['Email']+`</td>
                                <td>
                                    <button class="btn btn-success">Edit</button>
                                    <button class="btn btn-warning">Delete</button>
                                </td>
                            </tr>`);
                         })
                    } else{
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