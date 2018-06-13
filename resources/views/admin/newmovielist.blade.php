@extends('public.admin')
@section('vip','active opened active')
@section('newlist','active')
@section('css')
    <link rel="stylesheet" href="/public/static/admin/assets/js/datatables/dataTables.bootstrap.css">
@endsection()
@section('js')
    <script src="/public/static/admin/assets/js/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/public/static/admin/assets/js/datatables/dataTables.bootstrap.js"></script>
    <script src="/public/static/admin/assets/js/datatables/yadcf/jquery.dataTables.yadcf.js"></script>
    <script src="/public/static/admin/assets/js/datatables/tabletools/dataTables.tableTools.min.js"></script>
@endsection()
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">视频列表</h3>

            <div class="panel-options">
                <a href="#" data-toggle="panel">
                    <span class="collapse-icon">&ndash;</span>
                    <span class="expand-icon">+</span>
                </a>
                <a href="#" data-toggle="remove">
                    &times;
                </a>
            </div>
        </div>
        <div class="panel-body">

            <script type="text/javascript">
                jQuery(document).ready(function($)
                {
                    $("#example-1").dataTable({
                        order: [[ 2, 'desc' ]],
                        aLengthMenu: [
                            [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                        ]
                    });
                });
            </script>

            <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>视频名称</th>
                    <th>视频图片</th>
                    <th>视频排序</th>
                    <th>操作</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>视频名称</th>
                    <th>视频图片</th>
                    <th>视频排序</th>
                    <th>操作</th>
                </tr>
                </tfoot>

                <tbody>
                @foreach($dylist as $key=>$v)
                    <tr>
                        <td>{{$v['dy_title']}}</td>
                        <td>{{$v['dy_img']}}</td>
                        <td>{{$v['dy_sort']}}</td>
                        <td>
                            <a href="/play/{{$v['dy_id']}}.html" target="_blank" class="btn btn-info btn-sm btn-icon icon-left">
                                打开视频
                            </a>
                            <a href="/{{config('webset.webdir')}}/editmovie/{{$v['dy_id']}}" class="btn btn-secondary btn-sm btn-icon icon-left">
                                编辑
                            </a>

                            <a href="javascript:void(0)" onclick="shanchu(this)" goodid="{{$v['dy_id']}}" class="btn btn-danger btn-sm btn-icon icon-left">
                                删除
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <script>
        function shanchu(obj) {
            layer.confirm('您确认要删除？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                $(obj).parent().parent().remove();
                $.ajax({
                    url:'/action/delmovie',
                    type:'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'token':localStorage.getItem('token'),
                    },
                    data:{dy_id:$(obj).attr('goodid')},
                    dataType:'json',
                    success:function (data) {
                        if (data.status == 500) {
                            layer.msg(data.msg);
                            setTimeout(function () {
                                window.location = window.location.href;
                            }, 1000)
                        }
                        else {
                            layer.msg(data.msg);
                            var webdir = "{{config('webset.webdir')}}";
                            setTimeout(function () {
                                if ('{{config('cacheconfig.autocache')}}' == 'on') {
                                    autocache(webdir, 'newmovielist');
                                }
                                else {
                                    window.location = '/' + webdir + '/newmovielist'
                                }
                            }, 1000);

                        }
                    }
                })
            });
        }
    </script>

@endsection()