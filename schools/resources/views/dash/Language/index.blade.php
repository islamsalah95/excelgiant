@extends('layouts.dash')

@section('titel')
    <span class="text-muted fw-light">{{ __('languages/index.main_titel') }}/</span>{{ __('languages/index.sub_titel') }}
@endsection

@section('content')
    <div class="container">
        <h1 style="direction:{{ getDirection() }};">{{ __('languages/index.Language_Translations_Page') }}
            ({{ $slug }})</h1>

        @foreach ($translations['en'] as $section => $items)
            <div class="card mb-3">
                <div class="card-header">
                    <h2 class="mb-0">
                        <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#section-{{ $section }}">
                            {{ ucfirst($section) }}
                        </button>
                    </h2>
                </div>

                <div id="section-{{ $section }}" class="collapse">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('languages/index.Key') }}</th>
                                    <th>{{ __('languages/index.English') }}</th>
                                    <th>{{ __('languages/index.Arabic') }}</th>
                                    <th>{{ __('languages/index.Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $key => $value)
                                    <tr>
                                        <td>{{ $section . '.' . $key }}</td>
                                        <td>{{ $value }}</td>
                                        <td>{{ data_get($translations['ar'], "$section.$key", '') }}</td>
                                        <td>
                                            <a href="{{ route('languages.edit', ['locale' => 'en', 'key' => "$section.$key", 'language' => 'en', 'slug' => $slug]) }}"
                                                class="btn btn-primary btn-sm">{{ __('languages/index.Edit_EN') }}</a>
                                            <a href="{{ route('languages.edit', ['locale' => 'ar', 'key' => "$section.$key", 'language' => 'ar', 'slug' => $slug]) }}"
                                                class="btn btn-secondary btn-sm">{{ __('languages/index.Edit_AR') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
