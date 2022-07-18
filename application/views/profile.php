<!-- Header -->
<div class="header header-profile pb-6 d-flex align-items-center">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-8"></span>
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-7 col-md-10">
        <h1 class="display-2 text-white pt-5" style="color:#fff;">Hola <?php echo $this->session->userdata("name"); ?></h1>
        <h2 class="text-white mt-0 mb-5">Esta es tu página de perfil.</h2>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-xl-4 order-xl-2">
      <div class="card card-profile">
        <img src="<?php echo base_url(); ?>assets/img/theme/banner.jpg" alt="Image placeholder" class="card-img-top">
        <div class="row justify-content-center">
          <div class="col-lg-3 order-lg-2">
            <div class="card-profile-image">
              <label class="custom-file-label label-profile" for="fileProfile"> 
                <?php if(file_exists("./assets/img/user/".$this->session->userdata("picture"))): ?>
                  <img src="<?php echo base_url(); ?>assets/img/user/<?php echo $this->session->userdata("picture"); ?>" class="rounded-circle">
                <?php else: ?>
                  <img src="<?php echo base_url(); ?>assets/img/user/img.png" class="rounded-circle">
                <?php endif ?>
              </label>
              <input type="file" name="picture" class="custom-file-input" id="fileProfile">
            </div>
          </div>
        </div>
        <div class="card-body pt-4">
          <div class="text-center">
            <h5 class="h3"><?php echo $this->session->userdata("name"); ?></h5>
            <h5 class="font-weight-300 pb-5"><?php echo $this->session->userdata("email"); ?></h5>
          </div>
        </div>
      </div>

    </div>
    <div class="col-xl-8 order-xl-1">
      <div class="card">
        <div class="card-header">
          <h3 class="mb-0">Edit profile </h3>
        </div>
        <div class="card-body">
          <form action="<?php echo base_url();?>perfil/save" method="POST">
            <div class="row pt-2">
              <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label">Nombres</label>
                    <input type="text" name="name" class="form-control <?php echo form_error('name') ? 'is-invalid':''?>" placeholder="Tus Nombres y apellidos"  value="<?php echo form_error('name') ? set_value('name'): $this->session->userdata("name"); ?>">
                    <div class="invalid-feedback"><?php echo form_error('name'); ?></div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">N° Celular</label>
                  <input type="text" name="phoneNumber" class="form-control <?php echo form_error('phoneNumber') ? 'is-invalid':''?>" placeholder="Tu Número de celular"  value="<?php echo form_error('phoneNumber') ? set_value('phoneNumber'): $this->session->userdata("phone_number"); ?>">
                  <div class="invalid-feedback"><?php echo form_error('phoneNumber'); ?></div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label">Email</label>
                    <input type="text" name="email" class="form-control <?php echo form_error('email') ? 'is-invalid':''?>" placeholder="Tu correo eléctronico"  value="<?php echo form_error('email') ? set_value('email'): $this->session->userdata("email"); ?>">
                    <div class="invalid-feedback"><?php echo form_error('email'); ?></div>
                </div>
              </div>

              <div class="col-lg-12">
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-success mt-4">Guardar</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>