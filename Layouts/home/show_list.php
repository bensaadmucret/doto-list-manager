<div class="container">
    <div class="row">
        <div class="col-md-8 ">
            <h1 class="welcome-text m-1">
                Vous avez <span class="title-todo"></span> tâches à accomplir
            </h1>
        </div>
        <div class="col-sm col-md-4">
            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> Tâches
            </button>
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
                                    <option value="En attente">En attente</option>
                                    <option value="Terminé">Terminé</option>
                                    <option value="Annulé">Annulé</option>
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
        <div class="col-md-12">
            <?php get_flash_message_error(); ?>
            <?php get_flash_message_success(); ?>
        </div>

        <div class="col-xl-8 col-lg-12">
            <div class="card border-0 pb-0">
                <div class="card-header border-0 pb-0">
                    <h4 class="card-title">Liste : <?php echo $list['name']; ?></h4>
                </div>
                <div class="todo-list"></div>
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
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>
                    </form>
                    <?php endforeach; ?>



                </div>
            </div>
        </div>
    </div><!-- End row -->

</div>
</div>