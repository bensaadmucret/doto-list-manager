              <div class="col-sm-6 p-md-0">
                  <div class="welcome-text">
                      <h4>Hi, welcome back!</h4>
                      <span>Datatable</span>
                  </div>
              </div>

              <div class="col-sm text-left">
                  <button type="button" class="btn btn-outline-secondary" data-toggle="modal"
                      data-target="#addListModal">
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

              <div class="col-sm-6 col-lg-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                      <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                  </ol>
              </div>
              </div>
              <!-- row -->
              <div class="row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">Fees Collection</h4>
                          </div>
                          <div class="card-body">
                              <div class="table-responsive">
                                  <table id="example4" class="display">
                                      <thead>
                                          <tr>
                                              <th>Student Name</th>
                                              <th>Progression </th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      
                                          <?php foreach ($lists as $list): ?>
                                          <tr>
                                              <td><?php echo $list['name'] ?? "" ?></td>
                                              <td><span class="badge light badge-success">Progression</span></td>
                                              <td>
                                                  <div class="widget-content-right">
                                                      <form action="show-list/<?php echo $list['id'] ?? "" ?>" method="post">
                                                          <input type="hidden" name="id" value="<?php echo $list['id'] ?? "" ?>">
                                                          <button  type="submit" class="border-0 btn-transition btn btn-outline-success">
                                                          <i class="fa fa-eye"></i>
                                                          </button>
                                                        </form>                                                       
                                                    
                                                      <form action="delete-list/<?php echo $list['id'] ?? "" ?>" method="post">
                                                          <input type="hidden" name="id" value="<?php echo $list['id'] ?? "" ?>">
                                                          <button type="submit" class="border-0 btn-transition btn btn-outline-danger">
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