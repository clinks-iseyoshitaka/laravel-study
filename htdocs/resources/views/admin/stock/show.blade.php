@extends('layouts.app_admin')

@section('title', '商品詳細')
@php
$menu = 'master';
$subMenu = 'stock';
@endphp

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>商品詳細</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/admin/stock') }}">商品一覧</a></li>
                    <li class="breadcrumb-item active">商品詳細</li>
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
                    <!-- card-body -->
                    <div class="card-body">

                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-2 control-label">商品名</label>
                                <div class="col-sm-4">
                                    {{ $stock -> name }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-2 control-label">商品説明</label>
                                <div class="col-sm-4">
                                    {{ $stock -> detail }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-2 control-label">価格</label>
                                <div class="col-sm-4">
                                    {{ $stock -> price }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-2 control-label">在庫</label>
                                <div class="col-sm-4">
                                    {{ $stock -> quantity }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="control-group">
                                <label class="col-sm-2 control-label">商品画像</label>
                                <div class="col-sm-4" id="result">
                                    <img src="{{ asset('/uploads/stock/'.$stock->imgpath) }}" alt="" width="200px" id="stockImage">
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer clearfix ">
                        <form method="GET" action="{{route('admin.stock.edit', ['id' => $stock->id ])}}">
                            @csrf

                            <input class="btn btn-info" type="submit" value="変更する">
                        </form>

                        <form method="POST" action="{{route('admin.stock.destroy', ['id' => $stock->id ])}}" id="delete_{{ $stock->id }}">
                            @csrf
                            <a href="#" class="btn btn-danger" data-id="{{ $stock->id }}" onclick="deletePost(this);">削除する</a>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- /.content -->

<script>
    // 削除確認用のダイアログを表示
    function deletePost(e) {
        'use strict';
        if (confirm('本当に削除していいですか？')) {
            document.getElementById('delete_' + e.dataset.id).submit();
        }
    }
</script>

@endsection
