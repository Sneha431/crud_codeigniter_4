 <!-- <? //= view("include/header"); 
      ?> -->
 <?= $this->extend("include/base") ?>
 <!-- This tells CodeIgniter to extend a base view, which likely contains your site's overall structure (header, footer,
 etc.). -->
 <?= $this->section("basecontent") ?>
 <!-- These define a section that will be populated by
  the content in this file, and later injected into the base layout. -->
 <?= $this->section("title") ?>
 <?= $title ?>
 <?= $this->endSection("title") ?>
 <?php $validation = \Config\Services::validation();
  // print_r($validation->getError("name"));

  ?>
 <div class="container my-5">
   <div class="row">
     <div class="col-12">
       <div class="card">
         <div class="card-header">
           <div class="row">
             <div class="col-sm-8">
               <a href="<?= base_url("/") ?>" class="btn btn-danger btn-sm rounded">Back</a>
             </div>
             <div class="col-sm-4">

             </div>
           </div>
         </div>
         <div class="card-body">
           <div class="">
             <div class="container-fluid">
               <form class="" action="<?= base_url("insert") ?>" method="post">
                 <div class="row">
                   <div class="col-6">
                     <div class="mb-3">
                       <label for="name" class="form-label">Name <span class="text-danger">
                           *</span>
                       </label>
                       <!-- ?? '' Null Coalescing Operator -->
                       <!-- <input type="text" id="name" name="name" class="form-control
                         <? //= $validation->getError("name") ? "is-invalid" : "" 
                          ?>"
                         value="<? //= $_POST["email"] ?? '' 
                                ?>"> -->
                       <input type="text" id="name" name="name" class="form-control
                         <?= $validation->getError("name") ? "is-invalid" : ""
                          ?>" value="<?= set_value("name")  ?>">
                       <?php if ($validation->getError("name")) { ?>
                       <div class="invalid-feedback"><?= $validation->getError("name") ?></div>
                       <?php } ?>
                     </div>
                   </div>
                   <div class="col-6">
                     <div class="mb-3">
                       <label for="mobile" class="form-label">Mobile<span class="text-danger"> *</span></label>
                       <!-- <input type="text" id="mobile" name="mobile"
                         class="form-control <? //= $validation->getError("mobile") ? "is-invalid" : "" 
                                              ?>"
                         value="<? //= $_POST["mobile"] ?? '' 
                                ?>"> -->
                       <input type="text" id="mobile" name="mobile" class="form-control <?= $validation->getError("mobile") ? "is-invalid" : ""
                                                                                        ?>"
                         value="<?= set_value("mobile") ?>">
                       <?php if ($validation->getError("mobile")) { ?>
                       <div class="invalid-feedback"><?= $validation->getError("mobile") ?></div>
                       <?php } ?>
                     </div>
                   </div>
                   <div class="col-6">
                     <div class="mb-3">
                       <label for="email" class="form-label">Email<span class="text-danger"> *</span></label>
                       <!-- <input type="email" id="email" name="email"
                         class="form-control <? //= $validation->getError("email") ? "is-invalid" : "" 
                                              ?>"
                         value="<? //= $_POST["email"] ?? '' 
                                ?>"> -->
                       <input type="email" id="email" name="email"
                         class="form-control <?= $validation->getError("email") ? "is-invalid" : "" ?>"
                         value="<?= set_value("email") ?>">
                       <?php if ($validation->getError("email")) { ?>
                       <div class="invalid-feedback"><?= $validation->getError("email") ?></div>
                       <?php } ?>
                     </div>
                   </div>

                 </div>
                 <button type="submit" class="btn btn-sm btn-primary">Submit</button>
               </form>

             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
   <!-- <? //= view("include/footer"); 
        ?> --->
   <?= $this->endSection(); ?>