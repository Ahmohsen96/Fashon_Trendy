<x-app-layout>
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="/" rel="nofollow">Home</a>
                <span></span> Register
            </div>
        </div>
    </div>
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="m-auto col-lg-10">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                                <div class="bg-white padding_eight_all">
                                    <div class="heading_s1">
                                        <h3 class="mb-30">Create an Account</h3>
                                    </div>
                                    <form method="post" action="{{route('register')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" required="" name="name" placeholder="Name" :valus="old('name')" autofocus autocomplete="name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" required="" name="email" placeholder="Email" :valus="old('email')" required>
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="password" name="password" placeholder="Password" required autocomplete="new-password">
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="password" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                                        </div>
                                        <div class="login_footer form-group">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="">
                                                    <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
                                                </div>
                                            </div>
                                            <a href="privacy-policy.html"><i class="mr-5 fi-rs-book-alt text-muted"></i>Lean more</a>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Submit &amp; Register</button>
                                        </div>
                                    </form>
                                    <div class="text-center text-muted">Already have an account? <a href="{{route('login')}}">Sign in now</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                           <img src="{{asset('assets/imgs/login.pn') }}g">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</x-app-layout>
