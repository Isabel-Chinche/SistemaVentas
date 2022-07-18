<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
    <div class="header-body">
        <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Nuevo</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>ventas">Ventas</a></li>
                    <li class="breadcrumb-item active">Nuevo</li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
            <a href="<?php echo base_url(); ?>ventas" class="btn btn-secondary">Volver</a>
        </div>
        </div>
    </div>
    </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="input-group input-group-lg input-group-flush">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fas fa-search"></span>
                            </div>
                            </div>
                            <input id="search-product" type="search" class="form-control" placeholder="Buscar un producto">
                        </div>
                    </div>

                    <div class="col-lg-4 text-center">
                        <div class="dropdown">
                            <button id="dropdownMenuButton" class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Factura
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item btn-voucher">Factura</a>
                                <a class="dropdown-item btn-voucher">Boleta</a>
                                <a class="dropdown-item btn-voucher">Ticket</a>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-3 col-3"> 
                        <button class="btn btn-icon btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">
                            <span class="btn-inner--icon"><i class="ni ni-single-02"></i></span>
                            <span class="btn-inner--text">Cliente</span>
                        </button>
                    </div>

                    <div class="col-lg-12">

                        <div class="table-responsive mt-4">
                            <table class="table align-items-center">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort">Id</th>
                                    <th scope="col" class="sort">Nombre</th>
                                    <th scope="col" class="sort">Precio</th>
                                    <th scope="col" class="sort">Stock</th>
                                    <th scope="col" class="sort">Cantidad</th>
                                    <th scope="col" class="sort">Importe</th>
                                    <th scope="col" class="sort"></th>
                                </tr>
                                </thead>
                                <tbody class="list-product">
                                
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4">
                        <div class="form-group">
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Sub total</span>
                            </div>
                            <input id="subtotal" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="0.00">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4">
                        <div class="form-group">
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Descuento</span>
                            </div>
                            <input id="discount" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="0.00">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4">
                        <div class="form-group">
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Total</span>
                            </div>
                            <input id="total" type="text" name="total" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="0.00">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 text-right">

                        <input type="hidden" id="voucherIgv">
                        <input type="hidden" id="igv">

                        <input type="hidden" id="voucherId" value="1">
                        <input type="hidden" id="clientId" >

                        <div class="form-group">
                            <button id="btnSave" class="btn btn-success mt-4">Vender</button>
                        </div>
                    </div>

                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="saleTable" class="table">
                <thead class="thead-light">
                <tr>
                    <th>Nombres</th>
                    <th>N° documento</th>
                </tr>
                </thead>
                <tbody class="list-client">

                    <?php if(!empty($clients)): ?>
                        <?php foreach($clients as $client): ?>
                            <tr id="<?php echo $client->id; ?>" data-dismiss="modal">
                                <td><?php echo $client->name; ?></td>
                                <td><?php echo $client->num_document; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    
                </tbody>
                </table>
            </div>
            <div class="modal-footer">
               <a href="<?php echo base_url();?>client/Add" class="btn btn-success">Nuevo Cliente</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>

