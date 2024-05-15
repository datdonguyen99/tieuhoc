<div class="container">
    <div style="border-radius: 10px; border:1px solid #ccc;padding: 30px;">
        <h3 class="text-center text-danger">BẠN HÃY NHẬP MẬT KHẨU MỚI</h3>
        <div style="margin-top: 20px;" class="center-block text-center">
            <?php echo form_open('','role="form"'); ?>
            <input type="hidden" name="email" value="<?php echo $email; ?>" />
            <input type="hidden" name="token" value="<?php echo $token; ?>" />
            <span><input name="password" type="password" required placeholder="Mật khẩu mới" /></span>
            <span><input name="btn_reset" class="btn btn-info" value="Đổi mật khẩu" type="submit" /></span>
            <?php echo form_close(); ?>
        </div>
        <?php if(isset($msg)) echo $msg; ?>
    </div>
</div>
