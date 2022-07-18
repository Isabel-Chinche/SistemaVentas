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
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>productos">Productos</a></li>
                    <li class="breadcrumb-item active">Nuevo</li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
            <a href="<?php echo base_url(); ?>productos" class="btn btn-secondary">Volver</a>
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
                
                <form action="<?php echo base_url();?>nuevo-producto/save" method="POST">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Código de barras</label>
                                <input type="text" name="barcode" class="form-control <?php echo form_error('barcode') ? 'is-invalid':''?>" placeholder="Valor del código de barras"  value="<?php echo set_value('barCode'); ?>">
                                <div class="invalid-feedback"><?php echo form_error('barcode'); ?></div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Categoria</label>
                                <select id="category" name="categoryId" class="form-control <?php echo form_error('categoryId') ? 'is-invalid':''?>">
                                </select>
                                <div class="invalid-feedback"><?php echo form_error('categoryId'); ?></div>
                            </div>
                        </div>
                    
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Nombre</label>
                                <input type="text" name="name" class="form-control <?php echo form_error('name') ? 'is-invalid':''?>" placeholder="Nombre del producto"  value="<?php echo set_value('name'); ?>">
                                <div class="invalid-feedback"><?php echo form_error('name'); ?></div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Descripción</label>
                                <textarea name="description" class="form-control" rows="5" placeholder="Descripción del producto"><?php echo set_value('description'); ?></textarea>
                                <div class="invalid-feedback"><?php echo form_error('description'); ?></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Precio</label>
                                <input type="text" name="price" class="form-control <?php echo form_error('price') ? 'is-invalid':''?>" placeholder="Precio del producto"  value="<?php echo set_value('price'); ?>">
                                <div class="invalid-feedback"><?php echo form_error('price'); ?></div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Stock</label>
                                <input type="text" name="stock" class="form-control <?php echo form_error('stock') ? 'is-invalid':''?>" placeholder="Stock del producto"  value="<?php echo set_value('stock'); ?>">
                                <div class="invalid-feedback"><?php echo form_error('stock'); ?></div>
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

        <div class="col-xl-4 order-xl-2">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Imagen </h3>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="picture" class="custom-file-input" id="customFileLang">
                            <label class="custom-file-label" for="customFileLang"></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <?php if(file_exists("./assets/img/product/img".$this->session->userdata("idProduct").".png")): ?>
                            <img id="img-product" src="<?php echo base_url(); ?>assets/img/product/img<?php echo $this->session->userdata("idProduct").".png"; ?>" class="img-full rounded">
                            <?php else: ?>
                                <img id="img-product" src="<?php echo base_url(); ?>assets/img/product/img.png" class="img-full rounded">
                            <?php endif ?>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>