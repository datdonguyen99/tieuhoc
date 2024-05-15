<div>
    <form action="" method='get' class='clearfix row'>
        <div class='col-sm-4'>
            <label>Tìm theo</label>
            <input type="text" name='key' id="key_filter" class='form-control' placeholder='Email' value=""/>
        </div>

        <div class='col-sm-8'>
            <label>&nbsp;</label>
            <div>
                <ul class='list-inline'>
                    <li>
                        <button data-toggle='tooltip' title='Tìm kiếm, lọc dữ liệu'  type='submit' class='btn btn-primary' value='1' name='filter'><i class="fa fa-search"></i></button>
                    </li>


                </ul>
            </div>
        </div>
    </form>
</div>
<div>
    <table class="table table-bordered">
        <tr>
            <th>TT</th>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Điện thoại</th>
            <th>Nội dung</th>
            <th>Trạng thái</th>
            <th></th>
        </tr>
        <?php foreach ($items as $e)
        {
            ?>
            <tr>
                <td><?php echo $stt++ ?></td>
                <td><?php echo $e->full_name ?></td>
                <td><?php echo $e->email ?></td>
                <td><?php echo $e->phone_number ?></td>
                <td><?php echo $e->note; ?></td>
                <td style="color: <?php //echo $e->is_viewed == 0 ?'#25d9ec' : 'red'?>;font-weight:bold"><?php //echo Contact_model::$_status[$e->is_viewed]?></td>
                <td>
                    <a href="/backend/contact_manage/detail/<?php echo $e->id?>" class="preview-popup btn btn-sm btn-default"><i class="fa fa-eye"></i></a>
                </td>
            </tr>

        <?php } ?>
    </table>
</div>
<div class="text-center"> <?php echo $pagination?></div>
<script>
  var key = '<?php echo $key?>';
  if (key)
  {
    console.log(key);
    $('#key_filter').val(key);

  }

</script>
