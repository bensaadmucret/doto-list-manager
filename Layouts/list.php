<?php

use Core\Model\Model;

$model = new Model();
$lists = $model->getAll('list');
?>
        <!--**********************************
            Chat box start
        ***********************************-->
        <div class="chatbox">
            <div class="chatbox-close"></div>
            <div class="custom-tab-1">
                <ul class="nav nav-tabs active">
                    <li class="nav-item active">
                        <a class="nav-link active" data-toggle="tab" href="#notes">Vos liste</a>
                    </li>
                    
                </ul>
                <div class="tab-content">                    
                    <div class="tab-pane active" id="notes">
                        <div class="card mb-sm-3 mb-md-0 note_card">
                            <div class="card-header chat-list-header text-center">
                                <h5 class="mb-0">Le travail de la jeunesse fait le repos de la vieillesse.</h5>
                            </div>
                            <div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body2">
                                <ul class="contacts">
                                    <?php foreach($lists as $list):?>
                                    <li class="active">
                                        <div class="d-flex bd-highlight">
                                            <div class="user_info">
                                                <span><?php echo $list['name'] ?? ''; ?></span>
                                                <p><?php echo dateFormate($list['created_at'] ?? ''); ?></p>
                                            </div>
                                            <div class="ml-auto">
                                           
                                                    
                                                <a href="how-list/<?php echo $list['id'] ?? "" ?>" type="submit" class="btn btn-primary btn-xs sharp mr-1">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            
                                               
                                            </div>
                                        </div>
                                    </li>
                                    <?php endforeach;?>                         
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Chat box End
        ***********************************-->