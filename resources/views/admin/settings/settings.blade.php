@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

    <div class="card">
        
        <div class="card-body">
            <h5 class="cart-title">Change Settings</h5>
            <form action="{{ route('settings.update') }}" method="POST">
                {{ csrf_field()}}
                <div class="form-group">
                    <label for="site_name">Site name</label>
                    <input type="text" name="site_name" class="form-control" value="{{$settings->site_name}}">
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact number</label>
                    <input type="text" name="contact_number" class="form-control" value="{{$settings->contact_number}}">
                </div>
                <div class="form-group">
                    <label for="contact_email">Contact email</label>
                    <input type="email" name="contact_email" class="form-control" value="{{$settings->contact_email}}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" value="{{$settings->address}}">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Save settings!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop