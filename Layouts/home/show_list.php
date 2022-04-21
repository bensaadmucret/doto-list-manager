<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 mb-2">
            <!--Bouton pour retourner a la page d'accueil-->
            <a href='<?php echo assets('/'); ?>' class="btn btn-outline-info">
                <i class="fa fa-backward"></i> Retour</a>

        </div>
        <div class="col-sm-12 col-md-12">
            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> Tâches
            </button>
        </div>
        <div class="col-md-8 ">

            <?php //on calclue le nombre de tache terminé sur le nombre de tache en cours

            $count_done = 0;
            foreach ($tasks as $task) {
                if ($task['status'] == 'Terminé') {
                    $count_done++;
                } else {
                    $count_done;
                }
            }
            if($count_done == 0){
                $progression = 0;
            }else{
                // On calcule la progression en arrondissant
                $progression = round(($count_done / count($tasks)) * 100);
            }
          
            
            ?>
            <h2 class="welcome-text m-1"> </h2>
            <h3 class="text-center">
                <?php if($progression < 50){
                   
                    echo '<h3 class="badge badge-danger">Vous avez accomplies '. $progression .'% de vos tâches</h3>';
                    
                }elseif($progression >= 50 && $progression < 80){
                    echo '<h3 class="badge badge-warning">Vous avez accomplies '. $progression .'% de vos tâches</h3>';
                }else{
                    echo '<h3 class="badge badge-success"> Bravo ! '. $progression .'% des tâches accomplies !</h3>';
                }
                ?>
            </h3>

        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter une liste de tâches</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="add-task" action="add-task" method="POST">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Tâches</label>
                                <input type="text" name="nom" value="" class="form-control" id="nom">
                            </div>
                            <div class="mb-3">
                                <label for="satus" class="form-label">Satus</label>
                                <select name="status[]" class="form-control" id="satus">

                                    <option <?php echo 'selected'; ?> name="status" value="en cours">En cours</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="list_id"
                                    value="<?php echo $list['id']; ?>">
                            </div>
                            <div class="modal-footer text-left">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modal -->
        <!---Todo list-->
        <!--Message flash-->
        <div class="col-md-8">
            <?php get_flash_message_error(); ?>
            <?php get_flash_message_success(); ?>
        </div>

        <div class="col-xl-8 col-lg-12 mt-4">
            <div class="card border-0 pb-0">
                <div class="card-header border-0 pb-0">
                    <h4>Liste : <?php echo $list['name']; ?></h4>
                </div>               
                <div id="case_list" class="card-body">

                    <!--LISTE DES TACHES AVEC CHECKBOX-->
                    <?php foreach ($tasks as $task) : ?>
                    <form class="formAjax">
                        <div class="form-check d-flex">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" <?php if ($task['status'] == 'Terminé') {
                                    echo 'checked';
                            
                                } ?>>
                            <label class="form-check-label" for="defaultCheck1">
                                <?php echo $task['name']; ?>
                            </label>
                            <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                            <input type="hidden" name="list_id" value="<?php echo $list['id']; ?>">
                            <input type="hidden" name="status" value="<?php echo $task['status']; ?>">
                            <input type="hidden" name="name" value="<?php echo $task['name']; ?>">
                        </div>
                        <div class="dropdown text-right">
                            <button type="button" class="btn btn-warning light sharp" data-toggle="dropdown"
                                aria-expanded="false">
                                <svg width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                        <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                        <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                    </g>
                                </svg>
                            </button>
                            <div class="dropdown-menu" x-placement="bottom-start"
                                style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 40px, 0px);">

                                <!--Bouton modal -->
                                <a type="button" class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#editModal<?php echo $task['id']; ?>">
                                    Edition
                                </a>

                        
                            </div>
                        </div>
                    </form>
                    <!--modale edit-->
                    <div class="modal fade" id="editModal<?php echo $task['id']; ?>" tabindex="-1" role="dialog"
                        aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier une tâche</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="edit-task/<?php echo $task['id']; ?>" method="POST">
                                        <div class="mb-3">
                                            <label for="nom" class="form-label">Tâches</label>
                                            <input type="text" name="nom" value="<?php echo $task['name']; ?>"
                                                class="form-control" id="nom">
                                        </div>
                                        <div class="mb-3">
                                            <label for="satus" class="form-label">Satus</label>
                                            <select name="status" class="form-control" id="satus">
                                                <option <?php if ($task['status'] == 'En cours') {
                                                        echo 'selected';
                                                    } ?> name="status" value="En cours">En cours</option>
                                                <option <?php if ($task['status'] == 'Terminé') {
                                                        echo 'selected';
                                                    } ?> name="status" value="Terminé">Terminé</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" name="task_id"
                                                value="<?php echo $task['id']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <input type="hidden" class="form-control" name="list_id"
                                                value="<?php echo $list['id']; ?>">
                                        </div>
                                        <div class="modal-footer text-left">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </div>
                                    </form>
                                            <!-- formulaire de suppression -->
                                <form action="delete-task/<?php echo $task['id']; ?>" method="POST">
                                <span class="d-block"> <strong>Supprimer la tâche : <?php echo $task['name']; ?> ?<strong></span>
                                    <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                                    <input type="hidden" name="list_id" value="<?php echo $list['id']; ?>">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('êtes-vous sûr de vouloir supprimer ?');">Supprimer</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--modale edit-->
                   
                    
                        <?php endforeach; ?>
             
            </div>
        </div><!-- End row -->


</div>

<script>
window.addEventListener("DOMContentLoaded", (event) => {

    console.log("DOM entièrement chargé et analysé");
    const form = document.getElementById('add-task');
   
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        

        const formattedFormData = new FormData(form);
        postData(formattedFormData);
    });

    async function postData(formattedFormData) {
        let url = window.location.origin + "/add-task";
        const response = await fetch(url, {
            method: 'POST',
            body: formattedFormData
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.text();

        if (data) {
            console.log("ok");


            window.location.href = window.location.origin + "/show-list/" + data;
        }

    } //postData

    const card = document.querySelectorAll('.formAjax');




    card.forEach((card) => {
        card.addEventListener('click', function(event) {


            if (event.target.tagName === 'INPUT') {
                const formattedFormCard = new FormData(card);
                ajax_update_task(formattedFormCard);

            }


        });

        async function ajax_update_task(formattedFormCard) {
            let url = window.location.origin + "/update-task";
            const response = await fetch(url, {
                method: 'POST',
                body: formattedFormCard
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.text();

            if (data) {
                console.log("ok");
                // decrémenter le nombre de checkbox avec la fonction countCheckboxes



            }

            window.location.href = window.location.origin + "/show-list/" + data;


        } //ajax_update_task


    });
});
</script>