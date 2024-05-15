<div class="container">
    <div style="border-radius: 10px; border:1px solid #ccc;padding: 30px;">
        <h3 class="text-center text-danger">BẠN HÃY ĐIỀN EMAIL ĐÃ ĐĂNG KÝ ĐỂ KHÔI PHỤC MẬT KHẨU</h3>
        <div style="margin-top: 20px;" class="center-block text-center">
            <?php echo form_open('','role="form"'); ?>
            <span><input name="email" type="email" required /></span>
            <span><input name="btn_send" class="btn btn-info" value="Gửi yêu cầu" type="submit" /></span>
            <?php echo form_close(); ?>
        </div>
        <?php if(isset($msg)) echo $msg; ?>
    </div>
</div>
