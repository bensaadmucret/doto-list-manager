     <div class="col-sm text-left">
         <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#addListModal">
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
                     <h5 class="modal-title" id="exampleModalLabel">Add List</h5>
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


     </div>
     <!-- row -->
     <div class="row">
         <div class="col-12">
             <div class="card">
                 <div class="card-header">
                     <h4 class="card-title">Getting Things Done</h4>
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
                                 <?php 
                                            // On compte le nombre de tâches terminées
                                            echo '<H3>Progression globale</H3>';
                                            $count_done = 0;
                                            foreach($tasks as $task){
                                                if($task['status'] == 'Terminé'){
                                                    $count_done++;
                                                }else{
                                                    $count_done;
                                                }
                                            }
                                            // On calcule la progression en arrondissant
                                            $progression = round(($count_done / count($tasks)) * 100);
                                           // $progression = ($count_done * 100) / count($tasks);
                                            // On affiche la progression
                                            echo '<p>Tâches terminé: <span class="badge badge-success">'. $progression .'%</span></p>';
                                            // On compte le nombre de tâches encore en cours
                                            $count_in_progress = 0;
                                            foreach($tasks as $task){
                                                if($task['status'] == 'en cours'){
                                                    $count_in_progress++;
                                                }else{
                                                    $count_in_progress;
                                                }
                                            }
                                            // On calcule la progression en arrondissant
                                            $progression = round(($count_in_progress / count($tasks)) * 100);
                                           // on affiche la progression
                                            echo '<p>Tâches en cours: <span class="badge badge-warning">'. $progression .'%</span></p>';
                                            // On compte le nombre de tâches terminées 
                                            
                                            ?>

                                 <?php foreach ($lists as $list) : ?>

                                 <tr>
                                     <td><?php echo $list['name'] ?? "" ?></td>


                                    

                                     <td>
                                         <div class="widget-content-right ml-auto d-flex">
                                             <form action="show-list/<?php echo $list['id'] ?? "" ?>" method="post">
                                                 <input type="hidden" name="id" value="<?php echo $list['id'] ?? "" ?>">
                                                 <button type="submit"
                                                     class="border-0 btn-transition btn btn-outline-success">
                                                     <i class="fa fa-eye"></i>
                                                 </button>
                                             </form>

                                             <form action="delete-list/<?php echo $list['id'] ?? "" ?>" method="post">
                                                 <input type="hidden" name="id" value="<?php echo $list['id'] ?? "" ?>">
                                                 <button type="submit"
                                                     class="border-0 btn-transition btn btn-outline-danger">
                                                     <i class="fa fa-trash"></i>
                                                 </button>
                                             </form>
                                         </div>
                                     </td>
                                 </tr>
                                 <?php endforeach; ?>

                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>