@extends('layouts.app_admin')

@section('title', 'お問い合わせ変更')
@php
$menu = 'user';
$subMenu = 'contact';
@endphp

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>お問い合わせ変更</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/admin/contact') }}">お問い合わせ一覧</a></li>
                    <li class="breadcrumb-item active">お問い合わせ変更</li>
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

                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form method="POST" enctype="multipart/form-data" action="{{route('admin.contact.update', ['id' => $contact->id])}}">
                            @csrf

                            <div class="form-group">
                                <div class="control-group" id="userName">
                                    <label class="col-sm-6 control-label">氏名</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="your_name" value="{{ old('your_name', $contact -> your_name) }}" placeholder="サンプル太郎" maxlength="100">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="control-group" id="userName">
                                    <label class="col-sm-6 control-label">メールアドレス</label>
                                    <div class="col-sm-12">
                                        <input type="email" name="email" value="{{ old('email', $contact -> email) }}" placeholder="sample@sample.com" maxlength="100">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="control-group" id="userName">
                                    <label class="col-sm-6 control-label">性別</label>
                                    <div class="col-sm-12">
                                        <label>
                                            <input type="radio" name="gender" value="0" {{ "0" == old("gender", $contact -> gender) ? 'checked="checked"' : '' }}>
                                            <span>女性</span>
                                        </label>
                                        <label>
                                            <input type="radio" name="gender" value="1" {{ "1" == old("gender", $contact -> gender) ? 'checked="checked"' : '' }}>
                                            <span>男性</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="control-group" id="userName">
                                    <label class="col-sm-6 control-label">年齢</label>
                                    <div class="col-sm-12">
                                        <select name="age">
                                            <option value="">選択してください</option>
                                            <option value="1" {{ "1" == old("age", $contact -> age) ? 'selected="selected"' : '' }}>～19歳</option>
                                            <option value="2" {{ "2" == old("age", $contact -> age) ? 'selected="selected"' : '' }}>20歳～29歳</option>
                                            <option value="3" {{ "3" == old("age", $contact -> age) ? 'selected="selected"' : '' }}>30歳～39歳</option>
                                            <option value="4" {{ "4" == old("age", $contact -> age) ? 'selected="selected"' : '' }}>40歳～49歳</option>
                                            <option value="5" {{ "5" == old("age", $contact -> age) ? 'selected="selected"' : '' }}>50歳～59歳</option>
                                            <option value="6" {{ "6" == old("age", $contact -> age) ? 'selected="selected"' : '' }}>60歳～</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="control-group" id="userName">
                                    <label class="col-sm-6 control-label">件名</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="title" value="{{ old('title', $contact -> title) }}" placeholder="○○について" maxlength="100">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="control-group" id="userName">
                                    <label class="col-sm-6 control-label">お問い合わせ内容</label>
                                    <div class="col-sm-12">
                                        <textarea name="contact" rows="8" cols="80">{{ old('contact', $contact -> contact) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="control-group" id="userName">
                                    <label class="col-sm-6 control-label">ホームページURL</label>
                                    <div class="col-sm-12">
                                        <input type="url" name="url" value="{{ old('url', $contact -> url) }}" placeholder="https://sample.com" maxlength="100">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="control-group" id="userName">
                                    <label class="col-sm-6 control-label">画像</label>
                                    <div class="col-sm-12">
                                        {{--
                                    <p><input type="file" name="imageFile"></p>
                                    <br>
                                    --}}
                                        <p><input id="js-uploadImage" type="file">
                                        </p>
                                        <div id="result">
                                            @if (old('imageBase64'))
                                            <img src="{{ old('imageBase64') }}" width="200px" />
                                            <input type="hidden" name="imageBase64" value="{{ old('imageBase64') }}" />
                                            <input type="hidden" name="fileName" value="{{ old('fileName') }}" />
                                            @elseif ($contact -> contactFormImages)
                                            @foreach($contact -> contactFormImages as $contactFormImage)
                                            @if ($contactFormImage['file_name'])
                                            <img src="{{ asset('uploads/' . $contactFormImage['file_name']) }}" width="200px" id="contactFormImage">
                                            @endif
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="submit-wrap">
                                <input class="submit-btn btn btn-info" type="submit" value="登録する">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/assets/admin/js/contact/edit.js') }}" defer></script>

    @endsection
