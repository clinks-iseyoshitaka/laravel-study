@extends('layouts.app_admin')

@section('title', '顧客一覧')
@php
$menu = 'user';
$subMenu = 'user';
@endphp

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>顧客一覧</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                    <li class="breadcrumb-item active">顧客一覧</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">

                <div class="card card-purple">
                    <!-- .card-header -->
                    <div class="card-header">
                        <h3 class="card-title">検索条件</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.user.index') }}" method="GET">
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            <div class="form-group">
                                <div class="control-group" id="userName">
                                    <label class="col-sm-2 control-label">名前</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="name" class="form-control" size="10" maxlength="100" value="{{ $name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">メールアドレス</label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" class="form-control" maxlength="100" value="{{ $email }}">
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-secondary">検索</button>
                        </div>

                    </form>
                </div>

                <form action="{{ route('admin.user.index') }}" method="GET" id="pagingForm">
                    <input type="hidden" name="name" value="{{ $name }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                </form>

                <div class="row">
                    <div class="col-12">

                        <div class="card card-purple">
                            <!-- .card-header -->
                            <div class="card-header">
                                <h3 class="card-title">検索結果</h3>
                                <div class="dropdown text-right">
                                    <button class="btn btn-default dropdown-toggle btn-sm" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        操作
                                        <span class="caret"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                        <a class="dropdown-item text-muted js-download" href="{{ route('admin.user.download') }}">CSVダウンロード</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>氏名</th>
                                            <th>メールアドレス</th>
                                            <th>登録日時</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <th>{{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td><a href="{{ route('admin.user.show', ['id'=> $user->id]) }}">詳細</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->

                            <!-- .card-footer -->
                            <div class="card-footer clearfix ">
                                {{ $users->links() }}
                            </div>
                            <!-- /.card-footer -->

                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- /.content -->

<script src="{{ asset('/assets/admin/js/user/index.js') }}" defer></script>

@endsection
