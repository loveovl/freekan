
@extends('public.admin')
@section('kami','active opened active')
@section('kamilist','active')
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
    <!-- Basic Setup -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">卡密列表</h3>

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
                        order: [[ 4, 'desc' ]],
                        aLengthMenu: [
                            [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                        ]
                    });
                });
            </script>
            <div class="vertical-top">
                <button class="btn btn-purple" delid="0" onclick="del(this)">删除已使用</button>
                <button class="btn btn-success" delid="1" onclick="del(this)">删除未使用</button>
                <button class="btn btn-danger" delid="2" onclick="del(this)">全部删除</button>
            </div>
            <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>卡密ID</th>
                    <th>卡密内容</th>
                    <th>卡密时长</th>
                    <th>卡密状态</th>
                    <th>生成时间</th>
                    <th>使用时间</th>
                    <th>使用用户</th>
                    <th>操作</th>
                </tr>
                </thead>

                <tbody>
                @foreach($kamilist as $v)
                    <tr>
                        <td>{{$v['km_id']}}</td>
                        <td>{{$v['km_num']}}</td>
                        <td>{{$time[$v['km_time']]}}</td>
                        <td>{{$v['km_status']==0?'未使用':'已使用'}}</td>
                        <td>{{date('Y/m/d-H:i:s',$v['km_create_time'])}}</td>
                        <td>{{$v['km_update_time']==null?'未使用':date('Y/m/d-H:i:s',$v['km_update_time'])}}</td>
                        <td>{{$v['km_used_mem']==null?'未使用':$v['km_used_mem']}}</td>
                        <td>
                            <a href="javascript:void(0)" onclick="shanchu(this)" kmid="{{$v['km_id']}}" class="btn btn-danger btn-sm btn-icon icon-left">
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
                $.ajax({
                    url:'/action/delkami',
                    type:'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'token':localStorage.getItem('token'),
                    },
                    data:{km_id:$(obj).attr('kmid'),km_action:''},
                    dataType:'json',
                    success:function (data) {
                        if(data.status==200){
                            layer.msg(data.msg);
                            $(obj).parent().parent().remove();
                        }
                        else {
                            layer.msg(data.msg);
                        }
                    }
                })
            });
        }

        function del(obj) {
            layer.confirm('您确认要删除？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                $.ajax({
                    url:'/action/delkami',
                    type:'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'token':localStorage.getItem('token'),
                    },
                    data:{km_action:$(obj).attr('delid'),km_id:''},
                    dataType:'json',
                    success:function (data) {
                        if(data.status==200){
                            layer.msg(data.msg);
                            window.location = window.location.href
                        }
                        else if(data.status==500){
                            layer.msg(data.msg);
                            setTimeout(function(){
                                window.location = window.location.href;
                            },1000)
                        }
                        else {
                            layer.msg(data.msg);
                        }
                    }
                })
            });
        }
    </script>

@endsection()