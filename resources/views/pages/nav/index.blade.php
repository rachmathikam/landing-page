@extends('layouts.app')

@section('content')
    <div class="position-relative iq-banner default">
        <div class="iq-navbar-header" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <div>
                                <h2>Navbar Setting</h2>
                                <p>Berikut Adalah Setting navbar di landing page !</p>
                            </div>
                            <div>
                                <a href="#" id="btn_data_navbar" class="btn btn-link btn-soft-light">
                                    Data Navbar
                                </a>
                                <a href="#" id="btn_data_menu" class="btn btn-link btn-soft-light">
                                    Data Menu
                                </a>
                                <a href="#" id="btn_data_submenu" class="btn btn-link btn-soft-light">
                                    Data Sub Menu
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="iq-header-img">
                <img src="{{ asset('template/images/dashboard/top-header.png') }}" alt="header"
                    class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
                <img src="{{ asset('template/images/dashboard/top-header1.png') }}" alt="header"
                    class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
                <img src="{{ asset('template/images/dashboard/top-header2.png') }}" alt="header"
                    class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
                <img src="{{ asset('template/images/dashboard/top-header3.png') }}" alt="header"
                    class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
                <img src="{{ asset('template/images/dashboard/top-header4.png') }}" alt="header"
                    class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
                <img src="{{ asset('template/images/dashboard/top-header5.png') }}" alt="header"
                    class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
            </div>
        </div>
    </div>

    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row">
            <div class="col-sm-12">
                <div class="card" id="data_navbar">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Data Navbar</h4>
                        </div>
                        <button class="btn btn-primary btn-sm btn-open-modal" data-type="navbar">Tambah Data Navbar</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="nav_datatable" class="table table-striped add_new navbar_table"
                                data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Menu</th>
                                        <th>Sub Menu</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card" style="display:none" id="data_menu">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Data Menu</h4>
                        </div>
                        <button class="btn btn-primary btn-sm btn-open-modal" data-type="menu">Tambah Data Menu</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="menu_datatable" class="table table-striped add_new menu_table"
                                data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card" style="display:none" id="data_submenu">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Data SubMenu</h4>
                        </div>
                        <button class="btn btn-primary btn-sm btn-open-modal" data-type="submenu">Tambah Data
                            Submenu</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="submenu_datatable" class="table table-striped add_new submenu_table"
                                data-toggle="data-table">
                                <thead>
                                    <tr>
                                        <th>Menu</th>
                                        <th>Sub Menu</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal HTML -->
    <div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dataModalLabel">Modal Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Navbar Form -->
                    <div id="form_navbar" style="display:none;">
                        <form id="navbarForm" class="row">
                            <div class="mb-3 col-6">
                                <label for="navbarName" class="form-label">Nama Navbar</label>
                                <input type="text" class="form-control" id="navbarName" required>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="navbarName" class="form-label">Menu</label>
                                <select class="form-control" id="navbarMenuSelect">

                                </select>
                            </div>
                            <!-- Add other navbar fields as needed -->
                        </form>
                    </div>

                    <!-- Menu Form -->
                    <div id="form_menu" style="display:none;">
                        <form id="menuForm">
                            <div class="mb-3">
                                <label for="menuName" class="form-label">Menu Name</label>
                                <input type="text" class="form-control" id="menuName" required>
                            </div>
                            <!-- Add other menu fields as needed -->
                        </form>
                    </div>

                    <!-- Submenu Form -->
                    <div id="form_submenu" style="display:none;">
                        <form id="submenuForm">
                            <div class="mb-3">
                                <label for="submenuName" class="form-label">Submenu Name</label>
                                <input type="text" class="form-control" id="submenuName" required>
                            </div>
                            <!-- Add other submenu fields as needed -->
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {

            $.ajax({
                url: "{{ route('nav.getMenuDataSelect') }}",
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#navbarMenuSelect').empty();

                    $('#navbarMenuSelect').append('<option disabled value="">Select a Menu</option>');


                    $.each(data, function(index, menu) {
                        $('#navbarMenuSelect').append('<option value="' + menu.id + '">' + menu
                            .name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching menu data:', error);
                }
            });

            var navbarTable = $('#navbar_table').DataTable();
            var menuTable = $('#menu_table').DataTable();
            var submenuTable = $('#submenu_table').DataTable();


            $('#data_navbar').show();
            $('#data_menu, #data_submenu').hide();


            function switchTable(type) {
                if (type === 'navbar') {
                    $('#data_navbar').show();
                    $('#data_menu, #data_submenu').hide();
                    loadDataTable('navbar');
                    navbarTable.columns.adjust().draw();
                } else if (type === 'menu') {
                    $('#data_menu').show();
                    $('#data_navbar, #data_submenu').hide();
                    loadDataTable('menu');
                    menuTable.columns.adjust().draw();
                } else if (type === 'submenu') {
                    $('#data_submenu').show();
                    $('#data_navbar, #data_menu').hide();
                    loadDataTable('submenu');
                    submenuTable.columns.adjust().draw();
                }
            }

            function openModal(type) {

                $('#form_navbar, #form_menu, #form_submenu').hide();

                if (type === 'navbar') {
                    $('#dataModalLabel').text('Tambah Data Navbar');
                    $('#form_navbar').show();
                } else if (type === 'menu') {
                    $('#dataModalLabel').text('Tambah Data Menu');
                    $('#form_menu').show();
                } else if (type === 'submenu') {
                    $('#dataModalLabel').text('Tambah Data Submenu');
                    $('#form_submenu').show();
                }

                $('#dataModal').modal('show');
            }

            // mengambil value dengan button
            $('#btn_data_navbar').click(function(e) {
                e.preventDefault();
                switchTable('navbar');
            });

            $('#btn_data_menu').click(function(e) {
                e.preventDefault();
                switchTable('menu');
            });

            $('#btn_data_submenu').click(function(e) {
                e.preventDefault();
                switchTable('submenu');
            });


            loadDataTable('navbar');

            $('#btn_data_navbar').on('click', function() {
                loadDataTable('navbar');
            });

            $('#btn_data_menu').on('click', function() {
                loadDataTable('menu');
            });

            $('#btn_data_submenu').on('click', function() {
                loadDataTable('submenu');
            });


            function loadDataTable(type) {
                let tableId, ajaxUrl, columns;

                if (type === 'navbar') {
                    tableId = '#nav_datatable';
                    ajaxUrl = '/getNavbarData';
                    columns = [{
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'menu',
                            name: 'menu'
                        },
                        {
                            data: 'submenu',
                            name: 'submenu'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ];
                } else if (type === 'menu') {
                    tableId = '#menu_datatable';
                    ajaxUrl = '/getMenuData';
                    columns = [{
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ];
                } else if (type === 'submenu') {
                    tableId = '#submenu_datatable';
                    ajaxUrl = '/getSubmenuData';
                    columns = [{
                            data: 'menu',
                            name: 'menu'
                        },
                        {
                            data: 'submenu',
                            name: 'submenu'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ];
                }


                if ($.fn.DataTable.isDataTable(tableId)) {
                    $(tableId).DataTable().clear().destroy();
                }


                $(tableId).DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: ajaxUrl,
                        type: 'GET'
                    },
                    columns: columns
                });
            }


            $(document).on('click', '.btn-open-modal', function() {
                let type = $(this).data('type');
                openModal(type);
                // loadDataTable(type);
            });



            $(".add_new").on('click', '.edit_inline', function() {
                var btn = $(this);
                btn.closest("tr").find(".edit_inline").hide();

                $(this).closest("tr").find(".editSpan").hide();
                $(this).closest("tr").find(".editInput").show(250);
                $(this).closest("tr").find(".editCancel").show(250);
                $(this).closest("tr").find(".edit_inline").hide();
                $(this).closest("tr").find(".btnSave").show(250);
                $(this).closest("tr").find(".btnDelete").hide();
            });

            $(".add_new").on('click', '.editCancel', function(e) {
                e.preventDefault();

                $(this).closest("tr").find(".editSpan").show();
                $(this).closest("tr").find(".editInput").hide();

                $(this).closest("tr").find(".edit_inline").show(250);
                $(this).closest("tr").find(".editCancel").hide();

                $(this).closest("tr").find(".btnSave").hide();
                $(this).closest("tr").find(".btnDelete").show(250);

            });


            $(".add_new").on("click", '.btnSave', function(e) {
                e.preventDefault();
                var trObj = $(this).closest("tr");
                var ID = $(this).closest("tr").attr('id');
                data_id = ID.split("data");
                var inputData = $(this).closest("tr").find(".editInput").serialize();

                var tableType = $(this).closest('table').attr('id');
                console.log(tableType);

                var updateUrl = '';

                if (tableType === 'nav_datatable') {
                    updateUrl = "{{ url('navbar_update') }}/" + ID;
                } else if (tableType === 'menu_datatable') {
                    updateUrl = "{{ url('menu_update') }}/" + ID;
                } else if (tableType === 'submenu_datatable') {
                    updateUrl = "{{ url('submenu_update') }}/" + ID;
                }

                console.log(updateUrl);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: updateUrl,
                    dataType: "json",
                    data: 'action=edit&id=' + ID + '&' + inputData,

                    success: function(response) {
                        if (response.status == 200) {
                            navbarTable.ajax.reload();
                            menuTable.ajax.reload();
                            submenuTable.ajax.reload();
                            toastr.success(response.message);
                            trObj.find(".editSpan.rupiah").text(response.data.rupiah);
                            trObj.find(".editSpan.deskripsi").text(response.data.deskripsi);


                            trObj.find(".editInput.rupiah").val(response.data.rupiah);
                            trObj.find(".editInput.deskripsi").val(response.data.deskripsi);

                            trObj.find(".editInput").hide();
                            trObj.find(".editSpan").show();
                            trObj.find(".btnSave").hide();
                            trObj.find(".editCancel").hide();
                            trObj.find(".edit_inline").show();
                            trObj.find(".btnDelete").show();

                        } else {
                            toastr.error(response.errors);
                            $.each(response.data, function(field, errors) {
                                data = trObj.find(".editInput.nama_kategori");
                                data.addClass('is-invalid');
                                $('#' + field + '-error' + data_id[1]).text(errors[0])
                                    .wrapInner("<strong />");

                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection()
