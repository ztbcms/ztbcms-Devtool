<extend name="../../Admin/View/Common/base_layout"/>

<block name="content">

    <!-- Main content -->
    <section class="content" id="app" >
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-list"></i> 模型</h3>
                </div>
                <div class="panel-body">
                    <div>
                        <form method="post" enctype="multipart/form-data" target="_blank" id="form-order">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td class="text-left">
                                                Model ID
                                            </td>
                                            <td class="text-left">
                                                名称
                                            </td>
                                            <td class="text-left">
                                                数据表
                                            </td>
                                            <td class="text-left">操作</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <volist name="models" id="model">
                                            <tr>
                                                <td class="text-left">{$model[modelid]}</td>
                                                <td class="text-left">{$model[name]}</td>
                                                <td class="text-left">{$model[tablename]}</td>
                                                <td class="text-left">
                                                    <a href="javascript:void(0);"
                                                       class="btn btn-primary">生成Model</a>
                                                </td>
                                            </tr>
                                        </volist>
                                    </tbody>
                                </table>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

</block>
