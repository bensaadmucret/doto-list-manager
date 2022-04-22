     <div class="col-sm text-left">
         <button type="button" class="btn-grad" data-toggle="modal" data-target="#addListModal">
             <i class="fa fa-plus"></i> Nouvelle liste
         </button>
     </div>
     <div class="message-flash m-3">
         <?php get_flash_message_error(); ?>
         <?php get_flash_message_success(); ?>
     </div>



     <!-- Add list modale -->
     <div class="modal fade" id="addListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Ajouter une Liste</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <?php echo $form; ?>
                 </div>
             </div>
         </div>
     </div>
     <!-- End add list modale -->





     </div>
     <!-- row -->
     <div class="container">
         <div class="row">

             <div class="col-12">
                 <div class="card">
                     <div class="card-header">
                         <h1>Tasks manager</h4>
                     </div>
                     <h2 class="text-center mt-3">Progression globale</h2>
                     <div class="progression">
                         <?php
                                       

                                        $count_done = 0;
                                        foreach ($tasks as $task) {
                                            if ($task['status'] == 'Terminé') {
                                                $count_done++;
                                            } else {
                                                $count_done;
                                            }
                                        }
                                        if ($count_done == 0) {
                                            $progression = 0;
                                        } else {
                                            $progression = round(($count_done / count($tasks)) * 100);
                                        }
                                       
                                       ?>
                         <div class="progress m-2" style="height: 20px;">
                             <div class="progress-bar bg-success" role="progressbar"
                                 style="width: <?php echo  $progression; ?>%;"
                                 aria-valuenow="<?php echo  $progression; ?>" aria-valuemin="0" aria-valuemax="100">
                                 <?php echo  $progression; ?>%
                             </div>
                             <span class="progress-type px-2">Terminé</span>

                         </div>
                         <?php
                         $count_in_progress = 0;
                         foreach ($tasks as $task) {
                             if ($task['status'] == 'en cours') {
                                 $count_in_progress++;
                             } else {
                                 $count_in_progress;
                             }
                         }
                         if ($count_in_progress == 0) {
                             $progression = 0;
                         } else {
                             $progression = round(($count_in_progress / count($tasks)) * 100);
                         }
                         ?>

                         <div class="progress m-2" style="height: 20px;">
                             <div class="progress-bar bbg-warning" role="progressbar"
                                 style="width: <?php echo  $progression; ?>%;"
                                 aria-valuenow="<?php echo  $progression; ?>" aria-valuemin="0" aria-valuemax="100">
                                 <?php echo  $progression; ?>%
                             </div>
                             <span class="progress-type px-2">En cours</span>

                         </div>



                     </div>
                     <div class="card-body">
                         <div class="table-responsive">
                             <table id="example4" class="display">
                                 <thead>
                                     <tr>
                                         <th>Vos listes</th>

                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>

                                     <?php foreach ($lists as $list) : ?>

                                     <tr>
                                         <td><span class="badge bg-info text-white m-2"><i class="lni lni-write"></i>
                                             </span><?php echo $list['name'] ?? "" ?>
                                         </td>




                                         <td>
                                             <div class="widget-content-right ml-auto d-flex">
                                                 <form action="show-list/<?php echo $list['id'] ?? "" ?>" method="post">
                                                     <input type="hidden" name="id"
                                                         value="<?php echo $list['id'] ?? "" ?>">
                                                     <button type="submit"
                                                         class="border-0 btn-transition btn btn-outline-success">
                                                         <i class="fa fa-eye"></i>
                                                     </button>
                                                 </form>
                                                 <!--- Show formulaire edit-list-form -->
                                                 <button type="button"
                                                     class="edit-list border-0 btn-transition btn btn-outline-primary"
                                                     data-toggle="modal"
                                                     data-target="#editListModal<?php echo $list['id'] ?? "" ?>">
                                                     <i class="fa fa-edit"></i>
                                                 </button>


                                                 <form action="delete-list/<?php echo $list['id'] ?? "" ?>"
                                                     method="post">
                                                     <input type="hidden" name="id"
                                                         value="<?php echo $list['id'] ?? "" ?>">
                                                     <button type="submit"
                                                         class="border-0 btn-transition btn btn-outline-danger"
                                                         onclick="return confirm('Êtes-vous sûr de votre choix ?')">
                                                         <i class="fa fa-trash"></i>
                                                     </button>
                                                 </form>
                                             </div>
                                         </td>
                                     </tr>
                                     <!--Modal edit list-->
                                     <div class="modal fade" id="editListModal<?php echo $list['id'] ?? "" ?>"
                                         tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                         <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title" id="exampleModalLabel">Edit List</h5>

                                                     <button type="button" class="close" data-dismiss="modal"
                                                         aria-label="Close">
                                                         <span aria-hidden="true">&times;</span>
                                                     </button>
                                                 </div>
                                                 <div class="modal-body">
                                                     <form class="edit-list-form"
                                                         action="edit-list/<?php echo $list['id'] ?? "" ?>"
                                                         method="post">
                                                         <input type="hidden" name="id"
                                                             value="<?php echo $list['id'] ?? "" ?>">
                                                         <input type="text" name="name"
                                                             value="<?php echo $list['name'] ?? "" ?>">
                                                         <button type="submit"
                                                             class="border-0 btn-transition btn btn-outline-primary">
                                                             envoyer
                                                         </button>

                                                     </form>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <?php endforeach; ?>

                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>