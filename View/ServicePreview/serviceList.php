<extend name="../../Admin/View/Common/base_layout"/>

<block name="content">

    <!-- Main content -->
    <section class="content" id="app" >
        <div class="container-fluid">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-list"></i> 服务</h3>
                </div>
                <div class="panel-body">
                    <div>
                        <form method="post" enctype="multipart/form-data" target="_blank" id="form-order">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <td class="text-left">
                                            类名
                                        </td>
                                        <td class="text-left">
                                            名称
                                        </td>
                                        <td class="text-left">
                                            描述
                                        </td>
                                        <td class="text-left">方法数</td>
                                        <td class="text-left">操作</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <volist name="serviceList" id="service">
                                        <tr>
                                            <td class="text-left">{$service['class_name']}</td>
                                            <td class="text-left">{$service['summary']}</td>
                                            <td class="text-left">{$service['description']}</td>
                                            <td class="text-left">{:count($service['methods'])}</td>
                                            <td class="text-left">
                                                <button type="button" class="btn btn-info" onclick="openPreview('{:U("Devtool/ServicePreview/showService", ["service_file" => urlencode($service["file"])])}')">查看方法</button>
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

    <script>
        function openPreview(url){
            layer.open({
                type: 2,
                title: '浏览',
                shadeClose: true,
                shade: false,
                maxmin: false, //开启最大化最小化按钮
                area: ['60%', '60%'],
                content: url
            });
        }
    </script>

</block>
