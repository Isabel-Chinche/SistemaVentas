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
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>reclamos">Reclamos</a></li>
                    <li class="breadcrumb-item active">Nuevo</li>
                </ol>
            </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
            <a href="<?php echo base_url(); ?>reclamos" class="btn btn-secondary">Volver</a>
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
                
                <form action="<?php echo base_url();?>nuevo-reclamo/save" method="POST">

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="form-control-label">Cliente</label>
                                <select id="client" name="clientId" class="form-control <?php echo form_error('clientId') ? 'is-invalid':''?>">
                                </select>
                                <div class="invalid-feedback"><?php echo form_error('clientId'); ?></div>
                            </div>


                            <div class="form-group">
                                <label class="form-control-label">Descripción</label>
                                <textarea name="description" class="form-control" rows="5" placeholder="Descripción del mensaje"><?php echo set_value('description'); ?></textarea>
                                <div class="invalid-feedback"><?php echo form_error('description'); ?></div>
                            </div>


                        </div>
                    
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="form-control-label">Tipo de Mensaje</label>
                                <select id="messages" name="typeMessage" class="form-control">
                                </select>
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