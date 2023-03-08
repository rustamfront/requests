@extends('layout.app')
@section('title', 'Заявки')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Заявки</div>
            <div class="card-body">
                <table id="requests" class="table table-bordered table-condensed table-striped" >
                    <thead>
                    <tr>
                        <th>ID Клиента</th>
                        <th>Время создания Клиента</th>
                        <th>Время отправки сообщения</th>
                        <th>Имя Клиента</th>
                        <th>E-mail Клиента</th>
                        <th>Тема сообщения</th>
                        <th>Текст сообщения</th>
                        <th>Ссылка на прикрепленный файл</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $.noConflict();

        $('#requests').DataTable({
            ajax: '{{ route('table.api') }}',
            serverSide: true,
            processing: true,
            columns: [
                {data: 'user.id', name: 'id'},
                {data: 'user.created_at', name: 'created_at_user'},
                {data: 'created_at', name: 'created_at_message'},
                {data: 'user.name', name: 'name'},
                {data: 'user.email', name: 'email'},
                {data: 'name', name: 'subject'},
                {data: 'desciption', name: 'message'},
                {data: 'file', name: 'file'}
            ]
        });
    })
</script>
