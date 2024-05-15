<style>

    #map {
        height: 100%;
    }

    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    .store-info
    {
        border: 1px solid #d2d2d2;
        padding-bottom: 5%;
    }
    .store-info p{
        color: #00c0ef;
    }
</style>

<div class="clearfix">

    <div class="col-md-12 store-info">
        <div class="clearfix">
            <h3>Tên khách hàng</h3>
            <p><?php echo $item->name?></p>
        </div>
        <div class="clearfix">
            <h3>Email</h3>
            <p><?php echo $item->email?></p>
        </div>

        <div class="clearfix">
            <h3>Tin nhắn</h3>
            <p><?php echo $item->message ?></p>
        </div>
    </div>
</div>
