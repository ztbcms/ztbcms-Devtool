<extend name="../../Admin/View/Common/base_layout"/>

<block name="content">

    <!-- Main content -->
    <section class="content" id="app" >
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-list"></i> {$service['class_name']} {$service['summary']}</h3>
                </div>
                <div class="panel-body">
                    <div>
                        <form method="post" enctype="multipart/form-data" target="_blank" id="form-order">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <td class="text-left">
                                            名称
                                        </td>
                                        <td class="text-left">
                                            方法名
                                        </td>
                                        <td class="text-left">
                                            描述
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <volist name="service['methods']" id="method">
                                        <tr>
                                            <td class="text-left">{$method['name']}</td>
                                            <td class="text-left">{$method['summary']}</td>
                                            <td class="text-left">{$method['description']}</td>
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
