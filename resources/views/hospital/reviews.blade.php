@extends('layouts.vertical', ['title' => 'Reviews'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Hospital', 'title' => 'Reviews'])

    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <div class="card overflow-hidden">
                <div class="card-header d-flex align-items-center gap-2 border-bottom border-dashed bg-light-subtle">
                    <img src="/images/users/avatar-3.jpg" alt=""
                        class="avatar-xl rounded-circle border border-light border-2">
                    <div>
                        <p class="text-dark fw-medium fs-15 mb-1">Dr. James Roger</p>
                        <p class="mb-0 text-muted">Cardiology</p>
                    </div>
                    <div class="ms-auto text-lg-end text-md-end text-sm-end">
                        <div class="flex-grow-1 d-inline-flex align-items-center fs-5 mb-2">
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                        </div>
                        <p class="mb-0 fw-medium">Rating 4.9</p>
                    </div>
                </div>
                <div class="card-body">
                    <h4>2.3k Reviews and ratings</h4>
                    <div class="mt-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-0 fs-15 fw-medium">Oliver Baynton</p>
                                <div class="flex-grow-1 d-inline-flex align-items-center fs-14 mt-0">
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0 fs-13 fw-medium text-muted">11 Jun 2024</p>
                            </div>
                        </div>
                        <p class="my-2">Dr. James Roger is exceptional. A great listener and communicator. Makes our
                            family's health a top priority. Highly recommended</p>
                        <div>
                            <a href="#!" class="fs-13 me-2 link-reset"><i class="ti ti-thumb-up fs-16"></i> 632</a>
                            <a href="#!" class="fs-13 me-3 link-reset"><i class="ti ti-thumb-down fs-16"></i> 9</a>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-0 fs-15 fw-medium">Jonathan Hort</p>
                                <div class="flex-grow-1 d-inline-flex align-items-center fs-14 mt-0">
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0 fs-13 fw-medium text-muted">03 May 2024</p>
                            </div>
                        </div>
                        <p class="my-2">Our family doctor, provides outstanding care. Always prompt, understanding, and
                            offers excellent guidance. We couldn't ask for a better healthcare partner. Compassionate,
                            thorough, and always available when needed. Our family's health is in capable hands.</p>
                        <div>
                            <a href="#!" class="fs-13 me-2 link-reset"><i class="ti ti-thumb-up fs-16"></i> 212</a>
                            <a href="#!" class="fs-13 me-3 link-reset"><i class="ti ti-thumb-down fs-16"></i> 4</a>
                        </div>
                    </div>
                    <a href="#!" class="link-primary fw-medium">View More Review</a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6">
            <div class="card overflow-hidden">
                <div class="card-header d-flex align-items-center gap-2 border-bottom border-dashed bg-light-subtle">
                    <img src="/images/users/avatar-2.jpg" alt=""
                        class="avatar-xl rounded-circle border border-light border-2">
                    <div>
                        <p class="text-dark fw-medium fs-15 mb-1">Dr. Morgan Beck</p>
                        <p class="mb-0 text-muted">Dermatology</p>
                    </div>
                    <div class="ms-auto text-lg-end text-md-end text-sm-end">
                        <div class="flex-grow-1 d-inline-flex align-items-center fs-5 mb-2">
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-half-filled text-warning"></span>
                        </div>
                        <p class="mb-0 fw-medium">Rating 4.7</p>
                    </div>
                </div>
                <div class="card-body">
                    <h4>1.6k Reviews and ratings</h4>
                    <div class="mt-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-0 fs-15 fw-medium">Hugo Strele</p>
                                <div class="flex-grow-1 d-inline-flex align-items-center fs-14 mt-0">
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0 fs-13 fw-medium text-muted">15 March 2024</p>
                            </div>
                        </div>
                        <p class="my-2">He genuinely cares about our family's health and goes above and beyond to ensure
                            we receive the best care possible. </p>
                        <div>
                            <a href="#!" class="fs-13 me-2 link-reset"><i class="ti ti-thumb-up fs-16"></i> 322</a>
                            <a href="#!" class="fs-13 me-3 link-reset"><i class="ti ti-thumb-down fs-16"></i> 8</a>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-0 fs-15 fw-medium">Mackenzie McHale</p>
                                <div class="flex-grow-1 d-inline-flex align-items-center fs-14 mt-0">
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0 fs-13 fw-medium text-muted">12 Jan 2024</p>
                            </div>
                        </div>
                        <p class="my-2">Dr. Morgan Beck is a true gem. Always attentive, patient, and knowledgeable. Takes
                            time to explain things and makes us feel at ease during. provides outstanding care. Always
                            prompt, understanding, and offers excellent guidance. We couldn't ask for a better healthcare
                            partner.</p>
                        <div>
                            <a href="#!" class="fs-13 me-2 link-reset"><i class="ti ti-thumb-up fs-16"></i>532</a>
                            <a href="#!" class="fs-13 me-3 link-reset"><i class="ti ti-thumb-down fs-16"></i> 43</a>
                        </div>
                    </div>
                    <a href="#!" class="link-primary fw-medium">View More Review</a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6">
            <div class="card overflow-hidden">
                <div class="card-header d-flex align-items-center gap-2 border-bottom border-dashed bg-light-subtle">
                    <img src="/images/users/avatar-4.jpg" alt=""
                        class="avatar-xl rounded-circle border border-light border-2">
                    <div>
                        <p class="text-dark fw-medium fs-15 mb-1">Dr. Terry Bowers</p>
                        <p class="mb-0 text-muted">Pediatrics</p>
                    </div>
                    <div class="ms-auto text-lg-end text-md-end text-sm-end">
                        <div class="flex-grow-1 d-inline-flex align-items-center fs-5 mb-2">
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-half-filled text-warning"></span>
                        </div>
                        <p class="mb-0 fw-medium">Rating 4.5</p>
                    </div>
                </div>
                <div class="card-body">
                    <h4>2.5k Reviews and ratings</h4>
                    <div class="mt-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-0 fs-15 fw-medium">Lauren Oberg</p>
                                <div class="flex-grow-1 d-inline-flex align-items-center fs-14 mt-0">
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0 fs-13 fw-medium text-muted">20 Dec 2023</p>
                            </div>
                        </div>
                        <p class="my-2"> Dr. Roger consistently goes the extra mile, making him our trusted choice for
                            medical advice and treatment. </p>
                        <div>
                            <a href="#!" class="fs-13 me-2 link-reset"><i class="ti ti-thumb-up fs-16"></i> 452</a>
                            <a href="#!" class="fs-13 me-3 link-reset"><i class="ti ti-thumb-down fs-16"></i> 23</a>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-0 fs-15 fw-medium">Ralph Kappel</p>
                                <div class="flex-grow-1 d-inline-flex align-items-center fs-14 mt-0">
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-half-filled text-warning"></span>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0 fs-13 fw-medium text-muted">17 Nov 2023</p>
                            </div>
                        </div>
                        <p class="my-2">Dr. Terry Bowers was exceptional. They took the time to listen attentively to our
                            concerns and thoroughly explain everything in a way that was easy to understand. Their expertise
                            and compassionate approach reassured us throughout the appointment.</p>
                        <div>
                            <a href="#!" class="fs-13 me-2 link-reset"><i class="ti ti-thumb-up fs-16"></i>621</a>
                            <a href="#!" class="fs-13 me-3 link-reset"><i class="ti ti-thumb-down fs-16"></i> 60</a>
                        </div>
                    </div>
                    <a href="#!" class="link-primary fw-medium">View More Review</a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6">
            <div class="card overflow-hidden">
                <div class="card-header d-flex align-items-center gap-2 border-bottom border-dashed bg-light-subtle">
                    <img src="/images/users/avatar-5.jpg" alt=""
                        class="avatar-xl rounded-circle border border-light border-2">
                    <div>
                        <p class="text-dark fw-medium fs-15 mb-1">Dr. Carlos McCollum</p>
                        <p class="mb-0 text-muted">Orthopedics</p>
                    </div>
                    <div class="ms-auto text-lg-end text-md-end text-sm-end">
                        <div class="flex-grow-1 d-inline-flex align-items-center fs-5 mb-2">
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-half-filled text-warning"></span>
                        </div>
                        <p class="mb-0 fw-medium">Rating 4.1</p>
                    </div>
                </div>
                <div class="card-body">
                    <h4>4.2k Reviews and ratings</h4>
                    <div class="mt-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-0 fs-15 fw-medium">Anja Bachmeier</p>
                                <div class="flex-grow-1 d-inline-flex align-items-center fs-14 mt-0">
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star text-warning"></span>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0 fs-13 fw-medium text-muted">24 Nov 2023</p>
                            </div>
                        </div>
                        <p class="my-2"> I am incredibly grateful for the care I received at ortho care. Thanks to their
                            expertise and dedication, I am now on the road to recovery.</p>
                        <div>
                            <a href="#!" class="fs-13 me-2 link-reset"><i class="ti ti-thumb-up fs-16"></i> 841</a>
                            <a href="#!" class="fs-13 me-3 link-reset"><i class="ti ti-thumb-down fs-16"></i> 20</a>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-0 fs-15 fw-medium">Jan Fuhrmann</p>
                                <div class="flex-grow-1 d-inline-flex align-items-center fs-14 mt-0">
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-half-filled text-warning"></span>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0 fs-13 fw-medium text-muted">25 Oct 2023</p>
                            </div>
                        </div>
                        <p class="my-2">I am incredibly grateful for the care I received at [Orthopedics Practice Name].
                            Thanks to their expertise and dedication, I am now on the road to recovery. I highly recommend
                            ortho care to anyone in need of orthopedic care."</p>
                        <div>
                            <a href="#!" class="fs-13 me-2 link-reset"><i class="ti ti-thumb-up fs-16"></i> 732</a>
                            <a href="#!" class="fs-13 me-3 link-reset"><i class="ti ti-thumb-down fs-16"></i>
                                120</a>
                        </div>
                    </div>
                    <a href="#!" class="link-primary fw-medium">View More Review</a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6">
            <div class="card overflow-hidden">
                <div class="card-header d-flex align-items-center gap-2 border-bottom border-dashed bg-light-subtle">
                    <img src="/images/users/avatar-8.jpg" alt=""
                        class="avatar-xl rounded-circle border border-light border-2">
                    <div>
                        <p class="text-dark fw-medium fs-15 mb-1">Dr. Erma Coffman</p>
                        <p class="mb-0 text-muted">Gastroenterology</p>
                    </div>
                    <div class="ms-auto text-lg-end text-md-end text-sm-end">
                        <div class="flex-grow-1 d-inline-flex align-items-center fs-5 mb-2">
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-half-filled text-warning"></span>
                        </div>
                        <p class="mb-0 fw-medium">Rating 4.3</p>
                    </div>
                </div>
                <div class="card-body">
                    <h4>3.7k Reviews and ratings</h4>
                    <div class="mt-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-0 fs-15 fw-medium">Katja Theissen</p>
                                <div class="flex-grow-1 d-inline-flex align-items-center fs-14 mt-0">
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-half-filled text-warning"></span>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0 fs-13 fw-medium text-muted">14 July 2023</p>
                            </div>
                        </div>
                        <p class="my-2"> The nursing staff and medical assistants were also fantastic. They were
                            attentive, caring, and always willing to answer any questions I had.</p>
                        <div>
                            <a href="#!" class="fs-13 me-2 link-reset"><i class="ti ti-thumb-up fs-16"></i> 287</a>
                            <a href="#!" class="fs-13 me-3 link-reset"><i class="ti ti-thumb-down fs-16"></i> 0</a>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-0 fs-15 fw-medium">Torsten Fisher</p>
                                <div class="flex-grow-1 d-inline-flex align-items-center fs-14 mt-0">
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-half-filled text-warning"></span>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0 fs-13 fw-medium text-muted">21 May 2023</p>
                            </div>
                        </div>
                        <p class="my-2">Dr. Erma Coffman is a true professional. They took the time to listen attentively
                            to my symptoms, a comprehensive examination, and explained my diagnosis and treatment options
                            clearly. Their expertise and genuine concern for my well-being were evident throughout our
                            consultation.</p>
                        <div>
                            <a href="#!" class="fs-13 me-2 link-reset"><i class="ti ti-thumb-up fs-16"></i> 400</a>
                            <a href="#!" class="fs-13 me-3 link-reset"><i class="ti ti-thumb-down fs-16"></i> 80</a>
                        </div>
                    </div>
                    <a href="#!" class="link-primary fw-medium">View More Review</a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6">
            <div class="card overflow-hidden">
                <div class="card-header d-flex align-items-center gap-2 border-bottom border-dashed bg-light-subtle">
                    <img src="/images/users/avatar-10.jpg" alt=""
                        class="avatar-xl rounded-circle border border-light border-2">
                    <div>
                        <p class="text-dark fw-medium fs-15 mb-1">Dr. Kelli Bailey</p>
                        <p class="mb-0 text-muted">Psychiatry</p>
                    </div>
                    <div class="ms-auto text-lg-end text-md-end text-sm-end">
                        <div class="flex-grow-1 d-inline-flex align-items-center fs-5 mb-2">
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-filled text-warning"></span>
                            <span class="ti ti-star-half-filled text-warning"></span>
                            <span class="ti ti-star text-warning"></span>
                        </div>
                        <p class="mb-0 fw-medium">Rating 3.5</p>
                    </div>
                </div>
                <div class="card-body">
                    <h4>892 Reviews and ratings</h4>
                    <div class="mt-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-0 fs-15 fw-medium">Lukas Kastner</p>
                                <div class="flex-grow-1 d-inline-flex align-items-center fs-14 mt-0">
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star text-warning"></span>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0 fs-13 fw-medium text-muted">09 May 2023</p>
                            </div>
                        </div>
                        <p class="my-2">The entire atmosphere at Psycho is calming and conducive to healing. The support
                            staff were always helpful, ensuring my visits were stress-free.</p>
                        <div>
                            <a href="#!" class="fs-13 me-2 link-reset"><i class="ti ti-thumb-up fs-16"></i> 79</a>
                            <a href="#!" class="fs-13 me-3 link-reset"><i class="ti ti-thumb-down fs-16"></i> 2</a>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="mb-0 fs-15 fw-medium">Martina Hofmann</p>
                                <div class="flex-grow-1 d-inline-flex align-items-center fs-14 mt-0">
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-filled text-warning"></span>
                                    <span class="ti ti-star-half-filled text-warning"></span>
                                </div>
                            </div>
                            <div>
                                <p class="mb-0 fs-13 fw-medium text-muted">18 March 2023</p>
                            </div>
                        </div>
                        <p class="my-2">I have seen significant improvements in my mental health since starting treatment
                            with Dr. Kelli Bailey . I would highly recommend Psycho to anyone seeking compassionate and
                            effective psychiatry care. They were accommodating and made me feel comfortable right from the
                            start." </p>
                        <div>
                            <a href="#!" class="fs-13 me-2 link-reset"><i class="ti ti-thumb-up fs-16"></i> 128</a>
                            <a href="#!" class="fs-13 me-3 link-reset"><i class="ti ti-thumb-down fs-16"></i> 23</a>
                        </div>
                    </div>
                    <a href="#!" class="link-primary fw-medium">View More Review</a>
                </div>
            </div>
        </div>
    </div>
@endsection
