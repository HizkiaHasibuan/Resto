<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Kasir Restoran</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('css/styles_dashboard.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Restoran</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Menu
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="/admin/cashier/menu">Menu Resto</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{-- {{ $userData['user']['name'] }} --}}
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <center class="mb-5 mt-3">
                            <h2>Management Menu</h2>
                        </center>
                        <div class="card-header flex-row">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="bi bi-plus-circle"></i>  Add Menu
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product name</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Stock</th>
                                        <th>Price</th>
                                        <th>Category name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($product as $number => $item) --}}
                                    <tr>
                                        {{-- <td class="">{{$number + $product->firstItem()}}</td> --}}
                                        <td class="">1</td>
                                        <td>Mie Goreng</td>
                                        <td>
                                            <img src="data:image/jpeg;base64,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" alt="product" width="50px" height="50px" class="me-2 rounded-circle">
                                        </td>
                                        <td>Mie goreng enak</td>
                                        <td>10</td>
                                        <td>Rp 15.000</td>
                                        <td>
                                            Makanan
                                        </td>
                                        <td>
                                            <button class="btn-primary btn-sm bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#update" data-bs-placement="bottom" title="edit"></button>
                                            <button class="btn-danger btn-sm bi bi-trash" onclick="hapusproduk()" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></button>
                                        </td>
                                    </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                            <div class="my-3 d-flex justify-content-center">
                                {{-- {{$product->onEachSide(0)->links()}} --}}
                            </div>
                        </div>
                    </div>
                </main>
                {{-- <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer> --}}
            </div>
        </div>
        {{-- modal add --}}
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Form Menu</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/produk/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="product_name" class="form-label">Name</label>
                          <input type="text" class="form-control @error ('product_name') is-invalid @enderror" id="product_name" name="product_name" required>
                          @error('product_name')
                            {{ $message }}
                          @enderror
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Image</label>
                            <input type="file" class="form-control @error ('photo') is-invalid @enderror" id="photo" name="photo" required>
                            @error('photo')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description">Description</label><br>
                            <textarea id="description" name="description" required></textarea>
                            @error('description')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control @error ('stock') is-invalid @enderror" id="stock" name="stock" required min="1">
                            @error('stock')
                                {{ $message }}
                            @enderror
                          </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control @error ('price') is-invalid @enderror" id="price" name="price" required min="0">
                            @error('price')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category</label>
                            <select class="form-select @error ('category_name') is-invalid @enderror" aria-label="Default select example" name="category_id" required>
                              <option selected></option>
                                <option value="makanan">Makanan</option>
                                <option value="minuman">Minuman</option>
                            </select>
                            @error('category_name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>

          {{-- modal update --}}
          <div class="modal fade" id="update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Form Update Menu</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/produk/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="product_name" class="form-label">Name</label>
                          <input type="text" class="form-control @error ('product_name') is-invalid @enderror" id="product_name" name="product_name" value="Mie Goreng" required>
                          @error('product_name')
                            {{ $message }}
                          @enderror
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Image</label>
                            <input type="file" class="form-control @error ('photo') is-invalid @enderror" id="photo" name="photo" required><br>
                            <img src="data:image/jpeg;base64,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" alt="product" width="50px" height="50px" class="me-2 rounded-circle">
                            @error('photo')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description">Description</label><br>
                            <textarea id="description" name="description" value="Mie goreng enak" required></textarea>
                            @error('description')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control @error ('stock') is-invalid @enderror" id="stock" name="stock" value="10" required min="1">
                            @error('stock')
                                {{ $message }}
                            @enderror
                          </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control @error ('price') is-invalid @enderror" id="price" name="price" value="15000" required min="0">
                            @error('price')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category</label>
                            <select class="form-select @error ('category_name') is-invalid @enderror" aria-label="Default select example" name="category_id" required>
                              {{-- <option selected></option> --}}
                                <option value="makanan" selected>Makanan</option>
                                <option value="minuman">Minuman</option>
                            </select>
                            @error('category_name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts_dashboard.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
    </body>
</html>
