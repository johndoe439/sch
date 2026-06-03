<x-guest-layout>

    <main>
        <section class="tracking-section pull-down my-3 py-3">
            <div class="auto-container">
                <div class="outer-box">
                    <div class="arrow-box wow fadeInRight">
                        <img src="/fe/images/icons/arrow-2.png" alt="" class="icon" />
                        <span class="title">Results in <br />few seconds</span>
                    </div>
                    <div class="tracking-form">
                        <h4 class="title">Track your <br />Order</h4>

                        <form method="POST" action="{{ route('track.package') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                    <span class="icon lnr-icon-user"></span>
                                    <input type="text" name="track-id"
                                           placeholder="Your Tracking ID Now"
                                           value="{{ old('track-id') }}" required />
                                </div>

                                <div class="form-group col-lg-4 col-md-12 col-sm-12 text-end">
                                    <button type="submit" class="theme-btn btn-style-one">
                                        <span class="btn-title">Track Order</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

</x-guest-layout>
