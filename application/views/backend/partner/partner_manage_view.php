<style>
    .cell_thumb{width: 140px; height: 90px;}
</style>
<div>
    <div>
        <a href="<?php echo $base_link ?>/create" class='btn btn-primary' data-toggle='tooltip' title='Thêm mới'><i class="fa fa-plus"></i> Thêm mới</a>

    </div>
    <table class="table table-bordered">
        <tr>
            <th>Tên Đối tác</th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>
            <th>Số thứ tự</th>
            <th width="120"></th>
        </tr>
        <?php foreach ($items as $e) { ?>
            <tr>
                <td><a href="<?php echo $base_link .'/edit/'. $e->id ?>"><?php echo $e->TenPartner ?></a></td>
                <td><img src="<?php echo $e->imgUrl ?>" height="30px"/></td>
                <td><?php echo $e->Mota ?></td>
                <td><?php echo $e->SoTT ?></td>
                <td>
                    <ul class="list-inline">
                        <li><a data-toggle='tooltip' title='Chỉnh sửa' href="<?php echo $base_link .'/edit/'. $e->id ?>" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a></li>

                        <li><a data-toggle='tooltip' title='Xóa' class='btn btn-danger btn-sm delete' href="<?php echo $base_link .'/delete/'. $e->id ?>"><i class="fa fa-trash"></i></a></li>
                    </ul>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php echo $pagination ?>
</div>