
@extends('layouts.app')

@section('title', 'Elixir of Life homepage')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <form method="POST">
                        <h4 class="mb-3">Select the type of work you prefer:</h4>
                        <div class="row mb-4">
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="work-type[]" value="smart" id="smart_work">
                                    <label class="form-check-label" for="smart_work">Smart Work</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="work-type[]" value="hard" id="hard_work">
                                    <label class="form-check-label" for="hard_work">Hard Work</label>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-3">Select the elixirs that you believe will help you in your journey:</h4>
                        <div class="mb-4">
                            @foreach ($elixirs as $elixir)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="elixir[]" value="{{ $elixir->getName() }}" id="elixir_{{ $elixir->getName() }}">
                                    <label class="form-check-label fw-bold" for="elixir_{{ $elixir->getName() }}">{{ $elixir->getName() }}</label>
                                    <div class="form-text">{{ $elixir->getDescription() }}</div>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                    <div class="elixir-results mt-4">
                        @isset($result)
                            @if (!empty($result))
                                <h5>Results:</h5>
                                <ul class="list-group">
                                    @foreach ((array) $result as $message)
                                        <li class="list-group-item">{{ $message }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted">No results to display.</p>
                            @endif
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection