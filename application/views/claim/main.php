<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Reclamos</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
          <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active">Reclamos</a></li>
          </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="<?php echo base_url(); ?>nuevo-reclamo" class="btn btn-primary">Nuevo Reclamo</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Lista</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table id="claimTable" class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort">N°</th>
                <th scope="col" class="sort">Descripción</th>
                <th scope="col" class="sort">Cliente</th>
                <th scope="col" class="sort">Tipo</th>
                <th scope="col" class="sort">Opciones</th>
              </tr>
            </thead>
            <tbody class="list">

              <?php if(!empty($data)):?>
                <?php $number=1; foreach($data as $value):?>
                <tr class="">
                  <td>
                    <span class="badge badge-dot mr-4">
                      <span class="status"><?php echo $number++; ?></span>
                    </span>
                  </td>
                  <td>
                    <span class="badge badge-dot mr-4">
                      <span class="status"><?php echo $value->description; ?></span>
                    </span>
                  </td>

                  <td>
                    <span class="badge badge-dot mr-4">
                      <span class="status"><?php echo $value->client; ?></span>
                    </span>
                  </td>

                  <td>
                    <span class="badge badge-dot mr-4">
                      <span class="status"><?php echo $value->type_message; ?></span>
                    </span>
                  </td>
                  
                  <td class="text-right">
                    <div class="dropdown">
 
                        <a class="btn btn-info" href="<?php echo base_url()."reclamo/".$value->id; ?>">Editar</a>
                        <a class="btn btn-danger" href="<?php echo base_url()."reclamo/delete/".$value->id; ?>">Elimnar</a>
           
                    </div>
                  </td>
                  
                </tr>
                <?php endforeach; ?>
              <?php endif; ?>
              
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>