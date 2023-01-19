<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <link rel="shortcut icon" href="assets/img/browser.png" type="image/x-icon">
    <title>CultureDev</title>
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-md sticky-top py-2">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span><img src="assets/img/whitelogo.png" alt=""></span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle
                    navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#categoryModal">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Statistics</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#articleModal">Article</a></li>
                </ul><button class="btn bg-white me-3" type="button" data-bs-toggle="modal" data-bs-target="#articleModal">Add an article</button><button class="btn btn-dark" type="button">Log Out</button>
            </div>
        </div>
    </nav>

    <div class="row h-auto mx-auto d-flex col-md-8 my-2 mt-5">
        <div class="col-md-4 col-sm-8 mx-auto">
            <div class="p-3 bg-white shadow text-center">
                <div>
                    <h3 class="fs-3">7546</h3>
                    <p class="fs-5">Articls</p>
                </div>
                <!-- <i class="fa fa-chart-line fs-1 text-primary border rounded-full secondary-bg p-3"></i> -->
            </div>
        </div>
        <div class="col-md-4 col-sm-8 mx-auto">
            <div class="p-3 bg-white shadow text-center">
                <div>
                    <h3 class="fs-3">30</h3>
                    <p class="fs-5">Categories</p>
                </div>
                <!-- <i class="fa fa-hand-holding fs-1 text-primary border rounded-full secondary-bg p-3"></i> -->
            </div>
        </div>
        <div class="col-md-4 col-sm-8 mx-auto">
            <div class="p-3 bg-white shadow text-center">
                <div>
                    <h3 class="fs-3">135</h3>
                    <p class="fs-5">Developers</p>
                </div>
                <!-- <i class="fa fa-gift fs-1 text-primary border rounded-full secondary-bg p-3"></i> -->
            </div>
        </div>
    </div>
    <div class="container shadow p-3 my-5 bg-white rounded col-md-8">
        <table id="dtables" class="table ">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Article</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Clark</td>
                    <td>And this is the title</td>
                    <td>Web development is the process of creating, building, and maintaining websites. It involves a combination of programming languages, frameworks, and tools that are used to build and optimize web applications.</td>
                    <td>Action here</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Peter</td>
                    <td>And this is the title</td>
                    <td>Web development is the process of creating, building, and maintaining websites. It involves a combination of programming languages, frameworks, and tools that are used to build and optimize web applications.</td>
                    <td>Action here</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>John</td>
                    <td>And this is the title</td>
                    <td>Web development is the process of creating, building, and maintaining websites. It involves a combination of programming languages, frameworks, and tools that are used to build and optimize web applications.</td>
                    <td>Action here</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- </div> -->

    <!-- Modal -->
    <div class="modal fade" id="articleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Write an article</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="p-4">
                    <!-- title input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form4Example1" class="form-control" placeholder="title" />
                    </div>
                    <!-- category input -->
                    <div class="form-outline mb-4">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Choose a category</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <!-- article input -->
                    <div class="form-outline mb-4">
                        <textarea class="form-control" id="form4Example3" rows="9" placeholder="Web development is the process of creating, building, and maintaining websites. It involves a combination of programming languages, frameworks, and tools that are used to build and optimize web applications."></textarea>
                    </div>
                    <!-- Submit button -->
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add a category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="p-4">
                    <!-- name input -->
                    <div class="form-outline mb-4 d-flex">
                        <input type="text" id="form4Example1" class="form-control" placeholder="Add a category" />
                        <button type="submit" class="btn btn-sm btn-primary rounded m-1"> Add </button>
                    </div>
                    <!-- categories list -->
                    <div class="form-outline mb-4">
                        <table id="dtables" class="table ">
                            <thead>
                                <tr>
                                    <th>Category list</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Web development</td>
                                    <td><button type="submit" class="btn btn-sm btn-secondary rounded mt-2 mb-2">Update</button>
                                    <button name="deleteProduct" type="submit" class="btn btn-sm btn-danger mb-2 mt-2 rounded">Delete</button></td>
                                </tr>
                                <tr>
                                    <td>Mobile development</td>
                                    <td><button type="submit" class="btn btn-sm btn-secondary rounded mt-2 mb-2">Update</button>
                                    <button name="deleteProduct" type="submit" class="btn btn-sm btn-danger mb-2 mt-2 rounded">Delete</button></td>
                                </tr>
                            <tbody>
                        </table>
                    </div>
                    <!-- Submit button -->
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row row-sign row-focus">
                <div class="col-md-6 left-side"></div>
                <div class="col-md-6 right-side"></div>
            </div> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>