<div class="mainContent">
    <div class="container">
        <div class="row">
            <?php echo form_open('','role="form"'); ?>
            <h3 class="text-center">Thông tin cơ bản</h3>
            <div class="form-group">
                <input type="email" class="form-control" readonly="readonly" name="email" value="<?php echo $user['email']; ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="full-name" value="<?php echo $user['full_name']; ?>">
            </div>
            <h3 class="text-danger">Thay đổi mật khẩu đăng nhập</h3>
            <i>(Nếu không thay đổi thì bỏ trống 2 ô này</i>
            <div class="form-group">
                <input class="form-control" type="password" name="new-password" value="" placeholder="Mật khẩu mới">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="confirm-password" value="" placeholder="Xác nhận lại mật khẩu mới">
            </div>
            <p class="text-center text-danger"><?php if(isset($msg)) echo $msg; ?></p>
            <div class="form-group">
                <input type="submit" name="btn_update" class="btn btn-info" value="Cập nhật">
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>