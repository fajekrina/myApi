@extends('layouts.main')
@section('title', 'Article - MyArticle')

@section('css_custom')
    <link href="{{ asset('assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('blank') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('article.index') }}">Article</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Access Token</h4>
                            @if (empty($token))
                                <a href="{{ route('token.store') }}" type="button" class="btn mb-1 btn-primary">Generate
                                    New
                                    Access Token</a>
                            @else
                                <div class="form-group">
                                    <input type="text" class="form-control" id="tokenField" value="{{ $token->id }}"
                                        readonly>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="copyToken()">Copy</button>
                                <a href="{{ route('token.update') }}" type="button" class="btn mb-1 btn-primary">Regenerate
                                    Access Token</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection

@section('js_custom')
    <script>
        function copyToken() {
            var tokenField = document.getElementById("tokenField");
            tokenField.select();
            document.execCommand("copy");
            alert("Token copied to clipboard: " + tokenField.value);
        }
    </script>

@endsection
