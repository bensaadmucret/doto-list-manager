<div class="container">
    <div class="row">
        <div class="col-md-8 ">
            <h1 class="welcome-text m-1" >
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
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" class="form-control" id="titre" name="titre"
                                    placeholder="Titre de la liste de tâches">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                            <div class="form-group">
                                <label for="priorite">Priorité</label>
                                <select class="form-control" id="priorite" name="priorite">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--End Modal -->
        <!---Todo list-->
        <div class="col-xl-8 col-lg-12">
            <div class="card border-0 pb-0">
                <div class="card-header border-0 pb-0">
                    <h4 class="card-title">To Do List</h4>
                </div>
                <div class="todo-list"></div>
                <div class="card-body">
                    <div id="DZ_W_Todo4" class="widget-media dz-scroll ps ps--active-y">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-panel">
                                    <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox1"
                                            required="">
                                        <label class="custom-control-label" for="customCheckBox1"></label>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-0">Get up</h5>
                                        <small class="text-muted">29 July 2020 - 02:26 PM</small>
                                    </div>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-toggle="dropdown"
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
                                </div>
                            </li>
                            <li>
                                <div class="timeline-panel">
                                    <div class="custom-control custom-checkbox checkbox-warning check-lg mr-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox2"
                                            required="">
                                        <label class="custom-control-label" for="customCheckBox2"></label>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-0">Stand up</h5>
                                        <small class="text-muted">29 July 2020 - 02:26 PM</small>
                                    </div>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-warning light sharp"
                                            data-toggle="dropdown">
                                            <svg width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                </g>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-panel">
                                    <div class="custom-control custom-checkbox checkbox-primary check-lg mr-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox3"
                                            required="">
                                        <label class="custom-control-label" for="customCheckBox3"></label>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-0">Don't give up the fight.</h5>
                                        <small class="text-muted">29 July 2020 - 02:26 PM</small>
                                    </div>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary light sharp" data-toggle="dropdown"
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
                                </div>
                            </li>
                            <li>
                                <div class="timeline-panel">
                                    <div class="custom-control custom-checkbox checkbox-info check-lg mr-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox4"
                                            required="">
                                        <label class="custom-control-label" for="customCheckBox4"></label>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-0">Do something else</h5>
                                        <small class="text-muted">29 July 2020 - 02:26 PM</small>
                                    </div>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
                                            <svg width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                    <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                    <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                </g>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-panel">
                                    <div class="custom-control custom-checkbox checkbox-success check-lg mr-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox5"
                                            required="">
                                        <label class="custom-control-label" for="customCheckBox5"></label>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-0">Get up</h5>
                                        <small class="text-muted">29 July 2020 - 02:26 PM</small>
                                    </div>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-success light sharp" data-toggle="dropdown"
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
                                </div>
                            </li>
                            <li>
                                <div class="timeline-panel">
                                    <div class="custom-control custom-checkbox checkbox-danger check-lg mr-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox6"
                                            required="">
                                        <label class="custom-control-label" for="customCheckBox6"></label>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-0">Sleep</h5>
                                        <small class="text-muted">29 July 2020 - 02:26 PM</small>
                                    </div>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-danger light sharp" data-toggle="dropdown"
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
                                </div>
                            </li>
                            <li>
                                <div class="timeline-panel">
                                    <div class="custom-control custom-checkbox checkbox-warning check-lg mr-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox7"
                                            required="">
                                        <label class="custom-control-label" for="customCheckBox7"></label>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-0">Work</h5>
                                        <small class="text-muted">29 July 2020 - 02:26 PM</small>
                                    </div>
                                    <div class="dropdown">
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
                                </div>
                            </li>
                           
                            
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End row -->

</div>
</div>