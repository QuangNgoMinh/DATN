{{-- @extends('layout.std.login-app') --}}


{{-- @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('std-login') }}">
                        {!! csrf_field() !!}


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>


                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>


                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}









{{-- <div>
    <div class="flex justify-center items-center h-full">
        @if (session()->has('error'))
            <div class="bg-red-400 p-5 rounded my-4">
                <b>{{ session('error') }}</b>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="bg-green-400 p-5 rounded my-4">
                <b>{{ session('success') }}</b>
            </div>
        @endif
        <div class="my-6">
            <form action="" class="w-72" wire:submit.prevent="login">
                <input
                    class="w-72 py-3 px-2 my-4 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                    type="text" placeholder="Enter Username" wire:model='username' />
                @error('username')
                    <span class="text-red-600">{{ $message }}</span> <br>
                @enderror
                <br>
                <input
                    class="w-72 py-3 px-2 my-4 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                    type="password" placeholder="Enter the password" wire:model='password' />
                @error('password')
                    <span class="text-red-600">{{ $message }}</span> <br>
                @enderror
                <br>
                <button
                    class="px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    type="submit">
                    Login
                </button>
            </form>
        </div>
    </div>
</div> --}}


<div>
    <div class="flex justify-center items-center h-full">
        @if (session()->has('error'))
            <div class="bg-red-400 p-5 rounded my-4">
                <b>{{ session('error') }}</b>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="bg-green-400 p-5 rounded my-4">
                <b>{{ session('success') }}</b>
            </div>
        @endif
        <div class="my-6">
            <form action="" class="w-72" wire:submit.prevent="login">
                <input
                    class="w-72 py-3 px-2 my-4 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                    type="text" placeholder="Enter Username" wire:model='username' />
                @error('username')
                    <span class="text-red-600">{{ $message }}</span> <br>
                @enderror
                <br>
                <input
                    class="w-72 py-3 px-2 my-4 text-sm text-gray-700 placeholder-gray-900 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                    type="password" placeholder="Enter the password" wire:model='password' />
                @error('password')
                    <span class="text-red-600">{{ $message }}</span> <br>
                @enderror
                <br>
                <button
                    class="px-4 py-2 my-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    type="submit">
                    Login
                </button>
            </form>
        </div>
    </div>
</div>
