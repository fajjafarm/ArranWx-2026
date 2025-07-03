@extends('layouts.vertical', ['title' => 'Buttons'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Base UI', 'title' => 'Buttons'])

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Default Buttons</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted">Use the button classes on an <code>&lt;a&gt;</code>, <code>&lt;button&gt;</code>,
                        or <code>&lt;input&gt;</code> element.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-primary">Primary</button>
                        <button type="button" class="btn btn-secondary">Secondary</button>
                        <button type="button" class="btn btn-success">Success</button>
                        <button type="button" class="btn btn-danger">Danger</button>
                        <button type="button" class="btn btn-warning">Warning</button>
                        <button type="button" class="btn btn-info">Info</button>
                        <button type="button" class="btn btn-light">Light</button>
                        <button type="button" class="btn btn-dark">Dark</button>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Button Outline</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted">Use a classes <code>.btn-outline-**</code> to quickly create a bordered buttons.
                    </p>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-outline-primary">Primary</button>
                        <button type="button" class="btn btn-outline-secondary">Secondary</button>
                        <button type="button" class="btn btn-outline-success"> Success</button>
                        <button type="button" class="btn btn-outline-danger">Danger</button>
                        <button type="button" class="btn btn-outline-warning">Warning</button>
                        <button type="button" class="btn btn-outline-info">Info</button>
                        <button type="button" class="btn btn-outline-light">Light</button>
                        <button type="button" class="btn btn-outline-dark">Dark</button>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->


    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Button-Rounded</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted">Add <code>.rounded-pill</code> to default button to get rounded corners.</p>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-primary rounded-pill">Primary</button>
                        <button type="button" class="btn btn-secondary rounded-pill">Secondary</button>
                        <button type="button" class="btn btn-success rounded-pill">Success</button>
                        <button type="button" class="btn btn-danger rounded-pill">Danger</button>
                        <button type="button" class="btn btn-warning rounded-pill">Warning</button>
                        <button type="button" class="btn btn-info rounded-pill">Info</button>
                        <button type="button" class="btn btn-light rounded-pill">Light</button>
                        <button type="button" class="btn btn-dark rounded-pill">Dark</button>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Button Outline Rounded</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted">Use a classes <code>.btn-outline-**</code> to quickly create a bordered buttons.
                    </p>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-outline-primary rounded-pill">Primary</button>
                        <button type="button" class="btn btn-outline-secondary rounded-pill">Secondary</button>
                        <button type="button" class="btn btn-outline-success rounded-pill">Success</button>
                        <button type="button" class="btn btn-outline-danger rounded-pill">Danger</button>
                        <button type="button" class="btn btn-outline-warning rounded-pill">Warning</button>
                        <button type="button" class="btn btn-outline-info rounded-pill">Info</button>
                        <button type="button" class="btn btn-outline-dark rounded-pill">Dark</button>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Soft Buttons</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted">Use a classes <code>.btn-soft-**</code> to quickly create a soft background color
                        buttons.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-soft-primary">Primary</button>
                        <button type="button" class="btn btn-soft-secondary">Secondary</button>
                        <button type="button" class="btn btn-soft-success">Success</button>
                        <button type="button" class="btn btn-soft-danger">Danger</button>
                        <button type="button" class="btn btn-soft-warning">Warning</button>
                        <button type="button" class="btn btn-soft-info">Info</button>
                        <button type="button" class="btn btn-soft-dark">Dark</button>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Soft Rounded Buttons</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted">Use a classes <code>.btn-soft-**</code> <code>.rounded-pill</code> to quickly
                        create a soft background color buttons with rounded.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-soft-primary rounded-pill">Primary</button>
                        <button type="button" class="btn btn-soft-secondary rounded-pill">Secondary</button>
                        <button type="button" class="btn btn-soft-success rounded-pill">Success</button>
                        <button type="button" class="btn btn-soft-danger rounded-pill">Danger</button>
                        <button type="button" class="btn btn-soft-warning rounded-pill">Warning</button>
                        <button type="button" class="btn btn-soft-info rounded-pill">Info</button>
                        <button type="button" class="btn btn-soft-dark rounded-pill">Dark</button>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Gradient Buttons</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted">Use the button classes on an <code>&lt;a&gt;</code>, <code>&lt;button&gt;</code>,
                        or <code>&lt;input&gt;</code> element.</p>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-primary bg-gradient">Primary</button>
                        <button type="button" class="btn btn-secondary bg-gradient">Secondary</button>
                        <button type="button" class="btn btn-success bg-gradient">Success</button>
                        <button type="button" class="btn btn-danger bg-gradient">Danger</button>
                        <button type="button" class="btn btn-soft-warning bg-gradient">Warning</button>
                        <button type="button" class="btn btn-soft-info bg-gradient">Info</button>
                        <button type="button" class="btn btn-soft-dark bg-gradient">Dark</button>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Gradient Rounded Buttons</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted">Use a classes <code>.btn-outline-**</code> to quickly create a bordered buttons.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-primary bg-gradient rounded-pill">Primary</button>
                        <button type="button" class="btn btn-secondary bg-gradient rounded-pill">Secondary</button>
                        <button type="button" class="btn btn-soft-success bg-gradient rounded-pill">Success</button>
                        <button type="button" class="btn btn-soft-danger bg-gradient rounded-pill">Danger</button>
                        <button type="button" class="btn btn-soft-warning bg-gradient rounded-pill">Warning</button>
                        <button type="button" class="btn btn-info bg-gradient rounded-pill">Info</button>
                        <button type="button" class="btn btn-dark bg-gradient rounded-pill">Dark</button>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Ghost Buttons</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted">Use a classes <code>.btn-ghost-**</code> to quickly create a ghost background
                        color buttons.</p>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-ghost-primary">Primary</button>
                        <button type="button" class="btn btn-ghost-secondary">Secondary</button>
                        <button type="button" class="btn btn-ghost-success">Success</button>
                        <button type="button" class="btn btn-ghost-danger">Danger</button>
                        <button type="button" class="btn btn-ghost-warning">Warning</button>
                        <button type="button" class="btn btn-ghost-info">Info</button>
                        <button type="button" class="btn btn-ghost-dark">Dark</button>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Ghost Rounded Buttons</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted">Use a classes <code>.btn-ghost-**</code> <code>.rounded-pill</code> to quickly
                        create a ghost background color buttons with rounded.</p>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-ghost-primary rounded-pill">Primary</button>
                        <button type="button" class="btn btn-ghost-secondary rounded-pill">Secondary</button>
                        <button type="button" class="btn btn-ghost-success rounded-pill">Success</button>
                        <button type="button" class="btn btn-ghost-danger rounded-pill">Danger</button>
                        <button type="button" class="btn btn-ghost-warning rounded-pill">Warning</button>
                        <button type="button" class="btn btn-ghost-info rounded-pill">Info</button>
                        <button type="button" class="btn btn-ghost-dark rounded-pill">Dark</button>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->


    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Button-Sizes</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted">
                        Add <code>.btn-lg</code>, <code>.btn-sm</code> for additional sizes.
                    </p>

                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <button type="button" class="btn btn-primary btn-lg">Large</button>
                        <button type="button" class="btn btn-info">Normal</button>
                        <button type="button" class="btn btn-success btn-sm">Small</button>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Button-Disabled</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted">
                        Add the <code>disabled</code> attribute to <code>&lt;button&gt;</code> buttons.
                    </p>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="button" class="btn btn-info" disabled>Info</button>
                        <button type="button" class="btn btn-success" disabled>Success</button>
                        <button type="button" class="btn btn-danger" disabled>Danger</button>
                        <button type="button" class="btn btn-dark" disabled>Dark</button>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

