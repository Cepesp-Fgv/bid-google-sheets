@extends('layouts.app')

@section('content')
    <div class="container vh-100">

        <div class="row">
            <div class="col-md-10 offset-md-1 mt-4">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{ asset('img/logo.png') }}" height="50px" alt="Urbbox" class="mb-4 mt-2"/>
                </div>

                <div class="card">
                    <div class="card-header">Preparar Dados</div>
                    <div class="card-body">
                        <form action="{{ route('google.callback') }}" method="get">

                            <div class="form-group">
                                <label for="title">Título:</label>
                                <input type="text" name="title" value="{{ $title }}" class="form-control"/>
                            </div>

                            @error('csv')
                                <div class="alert alert-danger">
                                    Não foi possível processar o CSV.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @enderror

                            <div class="form-group">
                                <label for="url-input">URL:</label>
                                <input type="text" name="url" id="url-input" value="{{ $url }}" class="form-control"/>
                                <div id="urlValidFeedback" class="valid-feedback" style="display: none">
                                    Tudo certo com seu link!
                                </div>
                                <div id="urlInvalidFeedback" class="invalid-feedback" style="display: none">
                                    Tem algo de errado com seu link...
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="separator-input">Delimitador de Colunas:</label>
                                <input type="hidden" id="detected-separator-input" name="separator" value=";"/>
                                <select id="separator-input" name="selected-separator" class="form-control">
                                    <option value="" selected>Detectar Automaticamente</option>
                                    <option value="COMMA">Vírgula</option>
                                    <option value="TAB">Tabulação</option>
                                    <option value="SEMICOLON">Ponto-e-vírgula</option>
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-2">
                                    Abrir no Google Planilhas
                                </button>
                                <small class="form-text text-muted">Iremos requisitar a sua permissão para criar um
                                    arquivo.</small>
                            </div>

                        </form>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="preview-table"></table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script src="{{ mix('js/preview.js') }}"></script>
@endpush
