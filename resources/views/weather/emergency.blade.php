@extends('layouts.vertical')

@section('html-attribute', 'lang="en"')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Emergency Contacts</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Contact Details for Emergencies</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Service</th>
                                    <th>Contact Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($emergencyContacts as $contact)
                                    <tr>
                                        <td>{{ $contact['service'] }}</td>
                                        <td>{{ $contact['phone'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection