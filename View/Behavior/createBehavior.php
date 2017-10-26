<extend name="../../Admin/View/Common/base_layout"/>

<block name="content">

    <div style="padding: 16px;">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">创建行为</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="{:U('Devtool/Behavior/doCreateBehavior')}" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">行为名称</label>

                                        <div class="col-sm-10">
                                            <input name="name" type="text" class="form-control" placeholder="英文，首字母大写">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">行为描述</label>

                                        <div class="col-sm-10">
                                            <input name="description" type="text" class="form-control">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>

                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">确认</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>

</block>
