 <!-- login -->
 <div class="login">
     <div class="container">
         <div class="row d-flex justify-content-center">
             <div class="col-md-7 col-lg-5">
                 <div class="card">
                     <div class="card-body">
                         <h3 class="mb-5 ">SIGN IN</h3>
                         <?= $this->session->flashdata('pesan'); ?>
                         <form method="post" action="<?= base_url('Auth/Login/loginUser'); ?>">
                             <div class="form-group">
                                 <label for="exampleInputEmail1">Email address</label>
                                 <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?= set_value('email'); ?>">
                                 <?php echo form_error('email', '<div class="ml-2 text-danger small">', '</div>'); ?>
                             </div>
                             <div class="form-group">
                                 <label for="exampleInputPassword1">Password</label>
                                 <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                                 <?php echo form_error('password', '<div class="ml-2 text-danger small">', '</div>'); ?>
                             </div>
                             <div class="row">
                                 <div class="col-6 text-left">
                                     <div class="form-group form-check ml-2">
                                     </div>
                                 </div>
                                 <div class="col-6 text-right">
                                     <a href="<?= base_url('Auth/Lupa'); ?>">Lupa Password?</a>
                                 </div>
                             </div>
                             <div class="form-group my-4">
                                 <button type="submit" class="btn btn-primary form-control">Sign In</button>
                             </div>
                             <p>New Member? <a href="<?= base_url('Auth/Registrasi'); ?>">Create Account</a></p>

                             <div class="row">
                                 <div class="col-6 text-left">
                                     <div class="form-group form-check ml-2">
                                     </div>
                                 </div>
                                 <div class="col-6 text-right">
                                     <a href="<?= base_url('Dashboard'); ?>">Kembali</a>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- end login -->