<div class="user_main">
    <div class="user_main-title">
        <h3>Địa chỉ của tôi</h3>
    </div>
    <div class="user_main-wrap">
       <div class="diachi_user">
           <span style="font-weight: bold; padding-right: 10px;">Họ tên: </span>
           <span><?= $_SESSION['user']['username']?></span>
       </div>
       <div class="diachi_name">
           <div>
               <span  style="font-weight: bold;padding-right: 10px;">Địa chỉ: </span>
               <span><?= $_SESSION['user']['diachi']?></span>
           </div>
           <button class="btn_cus btn_address" data-toggle="modal" data-target="#modelId">Chỉnh sửa địa chỉ</button>
       </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content fa-align-center">
                <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    Add rows here
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>