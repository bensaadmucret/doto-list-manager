              <div class="col-sm-6 p-md-0">
                  <div class="welcome-text">
                      <h4>Hi, welcome back!</h4>
                      <span>Datatable</span>
                  </div>
              </div>
              <div class="col-sm text-left">
                  <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#addListModal">
                      <i class="fa fa-plus"></i> Nouvelle liste
                  </button>
              </div>




              <!-- Add list modale -->
              <div class="modal fade" id="addListModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add List</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <form action="" method="post">
                                  <div class="form-group">
                                      <label for="list_name">List Name</label>
                                      <input type="text" class="form-control" id="list_name" name="list_name" placeholder="Enter list name">
                                  </div>
                                  <div class="form-group">
                                      <label for="list_description">List Description</label>
                                      <textarea class="form-control" id="list_description" name="list_description" rows="3"></textarea>
                                  </div>
                                  <div class="form-group">
                                      <label for="list_status">List Status</label>
                                      <select class="form-control" id="list_status" name="list_status">
                                          <option value="1">Active</option>
                                          <option value="0">Inactive</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label for="list_status">List Type</label>
                                      <select class="form-control" id="list_type" name="list_type">
                                          <option value="1">Public</option>
                                          <option value="0">Private</option>
                                      </select>
                                  </div>

                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Save</button>
                                  </div>
                              </form>
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
                                          <tr>
                                              <td>Tiger Nixon</td>
                                              <td><span class="badge light badge-success">Paid</span></td>
                                              <td>
                                                  <div class="widget-content-right">
                                                      <button class="border-0 btn-transition btn btn-outline-success">
                                                          <i class="fa fa-check"></i>
                                                      </button>
                                                      <button class="border-0 btn-transition btn btn-outline-danger">
                                                          <i class="fa fa-trash"></i>
                                                      </button>
                                                  </div>
                                              </td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>