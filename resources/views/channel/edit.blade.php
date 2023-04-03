@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @livewire('channel.edit-channel', ['channel' => $channel->name])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
