@extends('layouts.app')

@section('content')

        <h1>Preparar Dados</h1>

        <form action="{{ route('google.callback') }}" method="get">

            @error('csv')
            <div class="alert alert-danger">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror

            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" value="{{ old('title', $title) }}" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="url-input">URL</label>
                <input type="text" name="url" id="url-input" value="{{ old('url', $url) }}" class="form-control"/>
                <div id="urlValidFeedback" class="valid-feedback" style="display: none">
                    Tudo certo com seu link!
                </div>
                <div id="urlInvalidFeedback" class="invalid-feedback" style="display: none">
                    Tem algo de errado com seu link...
                </div>
            </div>

            <div class="form-group">
                <label for="separator-input">Delimitador de Colunas</label>
                <input type="hidden" id="detected-separator-input" name="separator" value=";"/>
                <select id="separator-input" name="selected-separator" class="form-control">
                    <option value="" selected>Detectar Automaticamente</option>
                    <option value="COMMA">Vírgula</option>
                    <option value="TAB">Tabulação</option>
                    <option value="SEMICOLON">Ponto-e-vírgula</option>
                </select>
            </div>

            <div class="form-group">
                <label for="encoding-input">Codificação</label>
                <select id="encoding-input" name="encoding" class="form-control">
                    <option value="UTF-8">UTF-8</option>
                    <option value="ISO-8859-1">ISO-8859-1</option>
                    <option value="Windows-1252" selected>WINDOWS-1252 (LATIN 1)</option>
                    <option value="ASCII">ASCII</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success mt-2">
                    Abrir no Google Planilhas
                </button>
                <br>
                <small class="form-text text-muted">Iremos requisitar a sua permissão para criar um
                    arquivo.</small>
            </div>

        </form>

        <div style="margin-top: 30px; overflow-x: scroll; font-size: 12px">
            <table class="table table-bordered" id="preview-table" style="width: inherit !important;"></table>
        </div>


@endsection

@push('scripts')
    <script src="{{ mix('js/preview.js') }}"></script>
@endpush
