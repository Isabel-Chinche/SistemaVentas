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
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>ordenes">Pedidos</a></li>
                    <li class="breadcrumb-item active">Nuevo</li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
            <a href="<?php echo base_url(); ?>ordenes" class="btn btn-secondary">Volver</a>
        </div>
        </div>
    </div>
    </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6">

    <div class="row">
        
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Ingrese datos</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                
                <form action="<?php echo base_url();?>nuevo-orden/save" method="POST">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Cliente</label>
                                <select id="client" name="clientId" class="form-control <?php echo form_error('clientId') ? 'is-invalid':''?>">
                                </select>
                                <div class="invalid-feedback"><?php echo form_error('clientId'); ?></div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Producto</label>
                                <input type="text" name="product" class="form-control <?php echo form_error('product') ? 'is-invalid':''?>" placeholder="Nombre del producto"  value="<?php echo set_value('product'); ?>">
                                <div class="invalid-feedback"><?php echo form_error('product'); ?></div>
                        </div>                         
                        </div>



                        <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Cantidad</label>
                                <input type="number" name="cant" class="form-control <?php echo form_error('cant') ? 'is-invalid':''?>" placeholder="Cantidad de producto"  value="<?php echo set_value('cant'); ?>">
                                <div class="invalid-feedback"><?php echo form_error('cant'); ?></div>
                        </div>                         
                        </div>
                    
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Descripción</label>
                                <textarea name="description" class="form-control" rows="5" placeholder="Descripción del producto"><?php echo set_value('description'); ?></textarea>
                                <div class="invalid-feedback"><?php echo form_error('description'); ?></div>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Estado de pedidos</label>
                                <select id="states" name="typeState" class="form-control">
                                </select>
                            </div>    
                        </div>  

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Medio de Pago</label>
                                <select id="payments" name="typePayment" class="form-control">
                                </select>
                            </div>    
                        </div>  

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Medio de Entrega</label>
                                <select id="deliverys" name="typeDelivery" class="form-control">
                                </select>
                            </div>    
                        </div> 


                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label">Dirección</label>
                                <input type="text" name="address" class="form-control <?php echo form_error('address') ? 'is-invalid':''?>" placeholder="Ingrese dirección de envío"  value="<?php echo set_value('address'); ?>">
                                <div class="invalid-feedback"><?php echo form_error('address'); ?></div>
                            </div>
                        </div>


                        </div>

                    </div>
                    
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-success mt-4">Guardar</button>
                    </div>

                </form>
                </div>
            </div>
        </div>
    </div>