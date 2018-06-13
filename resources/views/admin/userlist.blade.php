@extends('public.admin')
@section('user','active opened active')
@section('userlist','active')
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
            <h3 class="panel-title">用户列表</h3>

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

            <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>用户ID</th>
                    <th>用户名称</th>
                    <th>用户等级</th>
                    <th>用户邮箱</th>
                    <th>注册时间</th>
                    <th>操作</th>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <th>用户ID</th>
                    <th>用户名称</th>
                    <th>用户等级</th>
                    <th>用户邮箱</th>
                    <th>注册时间</th>
                    <th>操作</th>
                </tr>
                </tfoot>

                <tbody>
                @foreach($userlist as $v)
                <tr>
                    <td>{{$v['user_id']}}</td>
                    <td>{{$v['user_name']}}</td>
                    <td>{{$v['user_level']==0?'普通会员':'VIP会员'}}</td>
                    <td>{{$v['user_email']}}</td>
                    <td>{{date('Y/m/d',$v['user_create_date'])}}</td>
                    <td>
                        <a href="javascript:void(0)" onclick="shanchu(this)" userid="{{$v['user_id']}}" class="btn btn-danger btn-sm btn-icon icon-left">
                            删除
                        </a>
                        <a href="/{{config('webset.webdir')}}/edituser/{{$v['user_id']}}"  class="btn btn-info btn-sm btn-icon icon-left">
                            编辑
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
                    url:'/action/deluser',
                    type:'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'token':localStorage.getItem('token'),
                    },
                    data:{user_id:$(obj).attr('userid')},
                    dataType:'json',
                    success:function (data) {
                        if(data.status==200){
                            layer.msg(data.msg);
                            $(obj).parent().parent().remove();
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