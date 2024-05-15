<div>
    <form action="" method='get' class='clearfix row'>
        <div class='col-sm-4'>
            <label>Tìm theo</label>
            <input type="text" name='key' id="key_filter" class='form-control' placeholder='Tiêu đề' value=""/>
        </div>

        <div class='col-sm-8'>
            <label>&nbsp;</label>
            <div>
                <ul class='list-inline'>
                    <li>
                        <button data-toggle='tooltip' title='Tìm kiếm, lọc dữ liệu'  type='submit' class='btn btn-primary' value='1' name='filter'><i class="fa fa-search"></i></button>
                    </li>
<!--                    <li><a href="/backend/config_manage/update" class='btn btn-primary'><i class="fa fa-plus"></i>Thêm mới</a></li>-->


                </ul>
            </div>
        </div>
    </form>
</div>
<div>
    <table class="table table-bordered">
        <tr>
            <th>TT</th>
            <th>Tiêu đề</th>
            <th>Giá trị</th>
            <th></th>
        </tr>
        <?php foreach ($items as $e)
        {
            ?>
            <tr>
                <td><?php echo $stt++ ?></td>
                <td><?php echo $e->name ?></td>
                <td><?php echo $e->value ?></td>
                <td>
                    <a href="/backend/config_manage/detail/<?php echo $e->id?>" class="preview-popup btn btn-sm btn-default"><i class="fa fa-eye"></i></a>
                    <a href="/backend/config_manage/update/<?php echo $e->id?>" class="preview-popup btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
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